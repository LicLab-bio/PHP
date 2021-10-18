<?php
include '../public/public.php';
include '../public/conn_php.php';

$id = $_REQUEST["sample_id"];
$marker_match = $_REQUEST["marker_match"];
$strategy = $_REQUEST["strategy"];

//样本相关信息的查询 start
$sample_id_sql = "SELECT *
        from $sample_id
        where sample_id='$id'";
$sample_id_res = mysqli_query($conn, $sample_id_sql);
$row = mysqli_fetch_assoc($sample_id_res);
$sample_id = $row["sample_id"];
$sample_biosample_type = $row["sample_biosample_type"];
$sample_tissue_type = $row["sample_tissue_type"];
$sample_biosample_id = $row["sample_biosample_id"];
$sample_data_source = $row["sample_data_source"];
$sample_gse = $row["sample_gse"];
$sample_health_state = $row["sample_health_state"];
$sample_coltron_crc_num = $row["sample_coltron_crc_num"];
$sample_crc_mapper_crc_num = $row["sample_crc_mapper_crc_num"];
$sample_coltron_tf_num = $row["sample_coltron_tf_num"];
$sample_crc_mapper_tf_num = $row["sample_crc_mapper_tf_num"];
//样本相关信息的查询 end
if ($strategy == 'coltron') {
    $sample_crc_num = $sample_coltron_crc_num;
    $sample_crc_tf_num = $sample_coltron_tf_num;
}

if ($strategy == 'crc_mapper') {
    $sample_crc_num = $sample_crc_mapper_crc_num;
    $sample_crc_tf_num = $sample_crc_mapper_tf_num;
}

//TF频率和TF list的查询 start
$crc_tf_num_bar_sql = "SELECT *
        from " . sprintf($data__tf_num, $strategy) . "
        where tf_num_sample_id='$sample_id' 
        order by tf_num_tf_num desc
          ";

$crc_tf_num_bar_res = mysqli_query($conn, $crc_tf_num_bar_sql);
while ($row = mysqli_fetch_assoc($crc_tf_num_bar_res)) {
    $tf_num_tf_name = $row["tf_num_tf_name"];
    $tf_num_tf_num = $row["tf_num_tf_num"];
    $tf_num_bar_tf_name_data .= "'" . $tf_num_tf_name . "',";
    $tf_num_bar_tf_num_data .= $tf_num_tf_num . ",";
    $crc_all_tf_list[] = $tf_num_tf_name;
}
function modify_($gene){
    global $marker_match;
    return (preg_match("/$marker_match/i",$gene)!=false?"<font color='red'>$gene</font>":$gene);
}
$crc_all_tf_list = array_map("modify_",$crc_all_tf_list);
$crc_all_tf_list = join(", ",$crc_all_tf_list);
//TF频率和TF list的查询 end
$crc_all_tf_select = $tf_num_bar_tf_name_data;  //给查询语句赋值
$crc_all_tf_select = substr($crc_all_tf_select, 0, strlen($crc_all_tf_select) - 1);
?>
<div class="row">
    <div class="col-lg-12">
        <table class="table table-hover">
            <tr>
                <td><strong>Biosample type:</strong></td>
                <td><?php echo $sample_biosample_type; ?></td>
            </tr>
            <tr>
                <td><strong>Tissue type:</strong></td>
                <td><?php echo $sample_tissue_type; ?></td>
            </tr>
            <tr style="color: red;font-weight:bold;">
                <td><strong>Biosample name:</strong></td>
                <td><?php echo $sample_biosample_id; ?></td>
            </tr>
            <tr>
                <td><strong>Data source:</strong></td>
                <td><?php echo $sample_data_source; ?></td>
            </tr>
            <tr>
                <td><strong>GSE ID:</strong></td>
                <td><?php echo $sample_gse; ?></td>
            </tr>
            <tr>
                <td><strong>Health state:</strong></td>
                <td><?php echo $sample_health_state; ?></td>
            </tr>
            <tr>
                <td><strong>CRC number:</strong></td>
                <td><?php echo $sample_crc_num; ?></td>
            </tr>
            <tr>
                <td><strong>TF number of all CRCs:</strong></td>
                <td><?php echo $sample_crc_tf_num; ?></td>
            </tr>
            <tr>
                <td><strong>TF list of all CRCs:</strong></td>
                <td style="text-align: justify;"><?php echo $crc_all_tf_list; ?></td>
            </tr>
        </table>
    </div>
    <div class="col-lg-12">
        <?php
        $family_count_pie_sql = "
                      SELECT
                        tf_information_family,COUNT(tf_information_family) as family_count
                      FROM
                        $tf_information
                      WHERE
                        tf_information_gene_symbol IN 
                        (
                          SELECT
                            tf_num_tf_name
                          FROM
                            " . sprintf($data__tf_num, $strategy) . "
                          WHERE
                            tf_num_sample_id = '$sample_id'
                        )
                      group by tf_information_family
                      order by family_count desc
                  ";
        $family_count_pie_res = mysqli_query($conn, $family_count_pie_sql);
        while ($row = mysqli_fetch_assoc($family_count_pie_res)) {
            $tf_family = $row["tf_information_family"];
            $tf_family_count = $row["family_count"];
            $tf_family_pie_count_tmp .= "{value:" . $tf_family_count . ", name:'" . $tf_family . "'},";

        }
        $tf_family_pie_count = substr($tf_family_pie_count_tmp, 0, strlen($tf_family_pie_count_tmp) - 1);
        ?>
        <div id="tf_family_count_pie" style="height: 300px"></div>
    </div>
</div>
<!---------TF family start----------->
<script type="text/javascript">
    var dom = document.getElementById("tf_family_count_pie");
    var myChart = echarts.init(dom);
    var app = {};
    option = null;
    option = {
        title: {
            text: 'TF families of TFs (all CRCs)',
            x: 'center'
        },
        tooltip: {
            trigger: 'item',
            formatter: "{a} <br/>{b} : {c} ({d}%)"
        },

        series: [
            {
                name: 'Number',
                type: 'pie',
                radius: '70%',
                center: ['50%', '60%'],
                data: [
                    <?php echo $tf_family_pie_count; ?>
                ],
                itemStyle: {
                    emphasis: {
                        shadowBlur: 10,
                        shadowOffsetX: 0,
                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                    }
                }
            }
        ],
        color: [
            '#C1232B', '#B5C334', '#FCCE10', '#E87C25', '#27727B',
            '#FE8463', '#9BCA63', '#FAD860', '#F3A43B', '#60C0DD',
            '#D7504B', '#C6E579', '#F4E001', '#F0805A', '#26C0C0'
        ]
    };

    if (option && typeof option === "object") {
        myChart.setOption(option, true);
    }
</script>
<!---------TF family end----------->