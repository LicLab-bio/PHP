<?php include "../public/public.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $web_title ?></title>
</head><style>
.p1 {font-size: 16px; }
.p4 { font-size: 16px; word-break:break-all; display: none; width:100%}
</style>
<body>
<div class="container-fluid" id="body">
    <?php
    include '../public/conn_php.php';

    $arr = explode("\r\n",$_GET["input"]);
    $arr_data = array();

    for ($x=0; $x<=count($arr) ; $x++) {
    $tmp= get_symbol($arr[$x]);

        if (empty($tmp)){
            $Gene_name[$x] = $arr[$x];

        } else{
            $Gene_convert[$x] = $arr[$x];
            $Gene_end[$x] = $tmp[0][0];

            $arr_data=array_merge($arr_data,$tmp);
            $Gene_name[$x] = $tmp[0][0];
            $Gene_convert_af[$x] = $tmp[0][0];


        }
    }

    $Gene_convert=array_merge($Gene_convert);
    $Gene_convert=array_filter($Gene_convert);
    $Gene_convert_af=array_merge($Gene_convert_af);
    $Gene_convert_af=array_filter($Gene_convert_af);

    if (empty($arr_data)){
        $Gene_name = $arr;
    } else {

        echo "
        <script>
            alert(`The following ID or alias will be converted to gene symbol:\r\n";
        for ($x=0; $x<count($Gene_convert) ; $x++) {
echo $Gene_convert[$x].'-->'.$Gene_convert_af[$x]."\n";

           
        }
        echo "`); </script>";

    }

    $Gene_Type = $_GET["gene_type"];
    function rm_null($item)
    {
        return (!empty($item));
    }

    $Gene_name = array_filter($Gene_name);


    if (!empty($Gene_Type)&&!empty($Gene_name))
        {$select_type = "where GeneName='" . implode("' and GeneType='".$Gene_Type."' or GeneName='",$Gene_name);
    $sql_tmp=$select_type."' and GeneType='".$Gene_Type."'";}
    else if(empty($Gene_Type)&&!empty($Gene_name))
    { $select_type = "where GeneName='" . implode("'  or GeneName='",$Gene_name);
        $sql_tmp=$select_type."'";
    } else if(empty($Gene_Type)&&empty($Gene_name))
    {
        $sql_tmp="";
    } else if(!empty($Gene_Type)&&empty($Gene_name))
    {
        $sql_tmp="where GeneType='".$Gene_Type."'";
    }
    $info_sql = "
    select DISTINCTROW a.TissueType, a.CellType ,IFNULL(b.number,0) num from  (select TissueType, CellType, count(*) number from (select distinctRow TissueType, CellType,GeneName from $main $sql_tmp) as tmp group by TissueType,CellType) as b right	JOIN (select  tissue_cell.TissueType, tissue_cell.CellType from `TF-Marker`.tissue_cell,(select distinctRow TissueType, CellType,GeneName from $main $sql_tmp) as tmp where tmp.TissueType=`TF-Marker`.tissue_cell.TissueType)
   as a 
   on a.TissueType = b.TissueType and a.CellType = b.CellType order by TissueType,CellType";


    $query = mysqli_query($conn, $info_sql);
    while ($rows = mysqli_fetch_assoc($query)) {
        $data[$rows["CellType"]][] = array(
            "y" => intval($rows["num"]),
            "className" => $rows["CellType"]
        );
        $categories[$rows["TissueType"]] = 1;
    }
    foreach ($data as $k => $v) {
        $series[] = array(
            "name" => $k,
            "data" => $v
        );
    }
    $categories = array_keys($categories);
    ?>

    <div class="row">
        <div class="col-lg-12">
            <h4>Currently,
                the gene type selected by the user is <b><font
                            color="red"><?php echo empty($Gene_Type) ? "all" : $Gene_Type ?></font></b>,
                and the gene name is <b><font
                            color="red"><?php echo empty($Gene_name) ? "all" : $Gene_name ?></font></b>.
            </h4>
        </div>

    </div>
        <?php
        $gene_num_sql = "select count(distinct GeneName) as gene_num from $main $sql_tmp";
        $gene_num_result = mysqli_query($conn, $gene_num_sql);
        while ($gene_rows = mysqli_fetch_assoc($gene_num_result)) {
            $number = $gene_rows["gene_num"];
        }
        $gene_sql = "select distinct GeneName from $main $sql_tmp";

        $gene_result = mysqli_query($conn, $gene_sql);
        while ($gene_rows = mysqli_fetch_assoc($gene_result)) {
            $interGene[] = $gene_rows["GeneName"];
        }

        if ($number==1) { ?>
            <div class="row">
                <div class="col-lg-12">
                    <h4>
                        Distribution of the inter gene set in tissues and cells.
                        <br>
                        <br>
                        <div style="width:100%"> <p class='p1' style='word-break:break-all;' ><b><?php echo empty($interGene) ? "gene" : implode(';',$interGene) ?></b></p><script type="text/javascript">
                                $(function () {
                                    text_foled('.p1',145);
                                });

                                /**
                                 * jQuery 文本折叠展开特效
                                 * @param clas：存放文本的容器
                                 * @param num：要显示的字数
                                 */
                                function text_foled(clas, num) {
                                    var num = num;
                                    var a = $("<a></a>").on('click', showText).addClass('a-text').text("+");
                                    var b = $("<a></a>").on('click', hideText).addClass('a-text').text("-");
                                    var p = $("<p></p>").addClass('p4');
                                    var str = $(clas).text();
                                    console.log(str);
                                    $(clas).after(p);

                                    if (str.length > num) {
                                        var text = str.substring(0, num) + "...";
                                        console.log(text);
                                        $(clas).html(text).append(a);
                                    }

                                    $('.p4').html(str).append(b);
                                    function showText() {

                                        $(this).parent().hide();
                                        $(".p4").show();
                                    }
                                    function hideText() {

                                        $(this).parent().hide();
                                        $(".p1").show();
                                    }
                                }
                            </script></div>
                    </h4>
                </div>

                <div class="col-lg-6">
                    <div class="box box-color-1">
                        <br>
                        <table id="table">
                            <thead>
                            <tr>
                                <th>PMID</th>
                                <th>Gene Name</th>
                                <th>Gene Type</th>
                                <th>Cell Name</th>
                                <th>Cell Type</th>
                                <th>Tissue Type</th>
                                <th>Detail</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $sql = "select  GeneName,GeneType,CellName,CellType,TissueType,id,PMID from $main $sql_tmp";

                            $result = mysqli_query($conn, $sql);
                            while ($rows = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td><a href=\"https://pubmed.ncbi.nlm.nih.gov/{$rows["PMID"]}\">{$rows["PMID"]}</a></td>";
                                echo "<td>{$rows["GeneName"]}</td>";
                                echo "<td>{$rows["GeneType"]}</td>";
                                echo "<td>{$rows["CellName"]}</td>";
                                echo "<td>{$rows["CellType"]}</td>";
                                echo "<td>{$rows["TissueType"]}</td>";
                                echo "<td><a target='_blank' href='/$web_title/search/detail_all.php?id={$rows["id"]}'>more detail</a></td>";
                                echo "</tr>";
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>


            <div class="col-lg-6">
                <div class="box box-color-2">
                    <div id="gene_distribution"
                         style="width: 100%;height:600px;display: flex;justify-content: center;align-items:center;"><i
                                style="width: 26px;height: 38px;"
                                class="ri-refresh-fill animate__animated animate__rotateOut"></i></div>
                </div>
            </div>

            <div class="col-lg-12">

                <div class="box box-color-2">
                    <div style="text-align:center;width:100%;margin:0 auto;">

                        <?php echo '<a style="margin-right:30px;" href="/' . $web_title . '/search/search_sample_result_rect/rect_4.php?sample_tf_name=' . $Gene_name[0] . '" type="button" class="btn btn-info" target="sample_result_rect_modal">'; ?>
                        <font size="3"><?php echo $Gene_name ?> Expression in Human Normal Tissues (GTEx)</font></a>

                        <?php echo '<a style="margin-right:30px;" href="/' . $web_title . '/search/search_sample_result_rect/rect_2.php?sample_tf_name=' . $Gene_name[0] . '" type="button" class="btn btn-info" target="sample_result_rect_modal">'; ?>
                        <font size="3"><?php echo $Gene_name ?> Expression in Cancer Cell Lines (CCLE)</font></a></br>
                        <div style="height: 10px;"></div>

                        <?php echo '<a style="margin-right:30px;" href="/' . $web_title . '/search/search_sample_result_rect/rect_1.php?sample_tf_name=' . $Gene_name[0] . '" type="button" class="btn btn-info" target="sample_result_rect_modal">'; ?>
                        <font size="3"><?php echo $Gene_name ?> Expression in Human Cancers (TCGA)</font></a>

                        <?php echo '<a style="" href="/' . $web_title . '/search/search_sample_result_rect/rect_3.php?sample_tf_name=' . $Gene_name[0] . '" type="button" class="btn btn-info" target="sample_result_rect_modal">'; ?>
                        <font size="3"><?php echo $Gene_name ?> Expression in Encode Cell Lines</font></a>

                    </div>
                    <div class="embed-responsive" style="height: 600px;">
                        <?php echo '<iframe src="/' . $web_title . '/search/search_sample_result_rect/rect_1.php?sample_tf_name=' . $Gene_name[0] . '" name="sample_result_rect_modal"
                    onload="changeFrameHeight(this);"
                    scrolling="no"
                    height="100%" width="100%" allowfullscreen="true" allowtransparency="true" frameborder="no"
                    border="0" marginwidth="0" marginheight="0"></iframe>' ?>
                    </div>
                </div>
            </div>
        <?php } else {?>
                <div class="row">
                    <div class="col-lg-12">
                        <h4>
                            Distribution of the inter gene set in tissues and cells.
                            <br>
                            <br>
                            <div style="width:100%"> <p class='p1' style='word-break:break-all;' ><b><?php echo empty($interGene) ? "gene" : implode(';',$interGene) ?></b></p><script type="text/javascript">
                                    $(function () {
                                        text_foled('.p1',145);
                                    });

                                    /**
                                     * jQuery 文本折叠展开特效
                                     * @param clas：存放文本的容器
                                     * @param num：要显示的字数
                                     */
                                    function text_foled(clas, num) {
                                        var num = num;
                                        var a = $("<a></a>").on('click', showText).addClass('a-text').text("+");
                                        var b = $("<a></a>").on('click', hideText).addClass('a-text').text("-");
                                        var p = $("<p></p>").addClass('p4');
                                        var str = $(clas).text();
                                        console.log(str);
                                        $(clas).after(p);

                                        if (str.length > num) {
                                            var text = str.substring(0, num) + "...";
                                            console.log(text);
                                            $(clas).html(text).append(a);
                                        }

                                        $('.p4').html(str).append(b);
                                        function showText() {

                                            $(this).parent().hide();
                                            $(".p4").show();
                                        }
                                        function hideText() {

                                            $(this).parent().hide();
                                            $(".p1").show();
                                        }
                                    }
                                </script></div>
                        </h4>
                    </div>
                    <div class="col-lg-12">
                        <div class="box box-color-2">
                            <div id="gene_distribution"
                                 style="width: 100%;height:400px;display: flex;justify-content: center;align-items:center;"><i
                                        style="width: 26px;height: 38px;"
                                        class="ri-refresh-fill animate__animated animate__rotateOut"></i></div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="box box-color-1">
                            <br>
                            <table id="table">
                                <thead>
                                <tr>
                                    <th>PMID</th>
                                    <th>Gene Name</th>
                                    <th>Gene Type</th>
                                    <th>Interacting Gene</th>
                                    <th>Cell Name</th>
                                    <th>Cell Type</th>
                                    <th>Tissue Type</th>
                                    <th>Detail</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $sql = "select  GeneName,GeneType,CellName,CellType,TissueType,id,PMID,Interacting_Gene_Symbol from $main $sql_tmp";

                                $result = mysqli_query($conn, $sql);
                                while ($rows = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td><a href=\"https://pubmed.ncbi.nlm.nih.gov/{$rows["PMID"]}\">{$rows["PMID"]}</a></td>";
                                    echo "<td>{$rows["GeneName"]}</td>";
                                    echo "<td>{$rows["GeneType"]}</td>";
                                    echo "<td>{$rows["Interacting_Gene_Symbol"]}</td>";
                                    echo "<td>{$rows["CellName"]}</td>";
                                    echo "<td>{$rows["CellType"]}</td>";
                                    echo "<td>{$rows["TissueType"]}</td>";
                                    echo "<td><a target='_blank' href='/$web_title/search/detail_all.php?id={$rows["id"]}'>more detail</a></td>";
                                    echo "</tr>";
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>





        <?php }?>
    </div>
</div>


<script>
    Highcharts.chart('gene_distribution', {
        chart: {
            type: '<?php if($number==1){echo 'bar';}else{echo 'column';}?>'
        },
        credits: {
            enabled: false
        },
        title: {
            text: 'Frequency of <?php echo $GeneName?> about <?php echo $web_title?>'
        },
        xAxis: {
            categories: <?php echo json_encode($categories) ?>,

        },
        yAxis: {
            min: 0,
            allowDecimals: false,
            title: {
                text: 'the number of gene'
            }
        },
        legend: {
            reversed: true
        },
        plotOptions: {
            series: {
                stacking: 'normal'
            }
        },
        series: <?php echo json_encode($series) ?>
    });
</script>
<script>
    $('#table').DataTable({
        dom: '<"row"<"col-sm-6"iB><"col-sm-6"f>>rt<"row"<"col-sm-5"<"dataTables_info"l>><"col-sm-7"<"dataTables_paginate paging_full_numbers"p>>>',
        buttons: [{
            extend: 'csvHtml5',
            text: '<i class="ri-folder-download-line"></i>'
        }],
        columnDefs: [{
            "targets": 3,
            "data": null,
            "render": function (data, type, row) {
                var t = row.Interacting_Gene_Symbol?row.Interacting_Gene_Symbol:"";
                t = t.split(';').join(', ');
                var html = "<div class='info-more'>"+ t +"<i onclick='infoMore(this)' class=\"ri-add-circle-line\"></i></div>";
                return html;
            }
        }],
        createdRow: function (row, data, dataIndex) {
            $(row).children('td').each((i, e) => {
                switch (i) {
                    case 3:
                        return;
                    default:
                        break
                }
                if (e.innerText === '')
                    $(e).html('\\');
                $(e).attr('title', e.innerText);
            });
        }
    });
    $(`<i style="font-size: 20px" class="ri-question-line" title="TF-Marker display all the entries about the input based on the filter."></i>`).insertBefore('#table_filter > label')

</script>
</body>
</html>

