<?php include (__DIR__."/../public/public.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $web_title ?></title>
</head>
<body data-spy="scroll" data-target="#myScrollspy">
<?php include (__DIR__."/../public/header.php") ?>
<style>

    .panel-heading > h3 > i {
        position: relative;
        top: 3px;
    }

    .panel-heading > h3 {
        font-weight: bold;
        margin: 12px;
    }


    .panel-default > .panel-heading {
        color: #ffffff;
        background-color: #380c77;
    }
    .table {
        width:100%;
        max-width:100%;
        margin-bottom:0;
    }
    tr > td:first-child{
        font-weight: bold;
    }

    tr > td:last-child{
        white-space: normal;
    }
</style>
<?php
$Marker = $GET['Marker'];
ini_set("error_reporting", "E_ALL & ~E_NOTICE");
include (__DIR__."/../public/conn_php.php");
$query = mysqli_query($conn, "SELECT * from Main $select Marker='$Marker'");
while ($row = mysqli_fetch_assoc($query)){
    $data[] = $row;
}
?>
<div class="container">
    <div class="col-xs-12 col-lg-12">
        <div class="pull-right"><i class="ri-map-pin-line"></i> Analysis / <b class="navigator">Result of analysis</b></div>
    </div>
    <br>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 id="SNP_Overview">
                <i class="ri-folder-info-line"></i> Overview
            </h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-6">
                    <div class="box box-color-1">
                        <table class="table table-bordered table-striped table-hover">
                            <tbody
                            <tr><td>Marker</td><td><?php echo $Marker ?></td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-6">

                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 id="SNP_Overview">
                <i class="ri-folder-info-line"></i> Overview
            </h3>
        </div>
        <div class="panel-body">

        </div>
    </div>
</div>
</body>
</html>