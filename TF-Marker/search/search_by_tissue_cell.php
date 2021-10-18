<?php include "../public/public.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $web_title ?></title>
</head>
<body>
<?php include "../public/header.php" ?>
<?php
$Marker=$_POST["Marker"];
$Gene_Type=$_POST["Gene_Type"];
?>
<div class="container" id="body">
    <div class="row">
        <div class="col-xs-12 col-lg-12">
            <div class="pull-right"><i class="ri-map-pin-line"></i> <b class="navigator">Search</b></div>
        </div>
    </div>
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 id="SNP_Overview">
                    <i class="ri-folder-info-line"></i>Search  Result
                </h3>
            </div>
            <div class="panel-body">
                <table id="table">
                    <thead>
                    <tr>
                        <th>PMID</th>
                        <th>Gene Name</th>
                        <th>Gene Type</th>
                        <th>Control Marker</th>
                        <th>Cell Name</th>
                        <th>Cell Type</th>
                        <th>Tissue Type</th>
                        <th>Details</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    ini_set("error_reporting", "E_ALL & ~E_NOTICE");
                    include '../public/conn_php.php';
                    $sql="select * from $main where ControlMarker='$Marker' and GeneType='$Gene_Type'";
                    $result = mysqli_query($conn, $sql);
                    while ($rows = mysqli_fetch_assoc($result)){
                        echo "<tr>";
                        echo "<td>{$rows["PMID"]}</td>";
                        echo "<td>{$rows["GeneName"]}</td>";
                        echo "<td>{$rows["GeneType"]}</td>";
                        echo "<td>{$rows["ControlMarker"]}</td>";
                        echo "<td>{$rows["CellName"]}</td>";
                        echo "<td>{$rows["CellType"]}</td>";
                        echo "<td>{$rows["TissueType"]}</td>";
                        echo "<td><a href='detail_all.php?id_tis_cel={$rows["id"]}'>more detail</a></td>";
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include "../public/footer.php"; ?>
<script>
    $('#table').DataTable({
        dom: '<"row"<"col-sm-6"iB><"col-sm-6"f>>rt<"row"<"col-sm-5"<"dataTables_info"l>><"col-sm-7"<"dataTables_paginate paging_full_numbers"p>>>',
        buttons: [{
            extend: 'csvHtml5',
            text: '<i class="ri-folder-download-line"></i>'
        }],
        createdRow: function (row, data, dataIndex) {
            $(row).children('td').each((i, e) => {
                switch (i) {
                    case 3:
                        return
                    default:
                        break
                }
                if (e.innerText === '')
                    $(e).html('\\');
                $(e).attr('title', e.innerText);
            });
        }
    });
</script>
</body>
</html>

