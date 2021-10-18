<?php
ini_set("error_reporting","E_ALL & ~E_NOTICE");
include '../../../sqlconfig/tfkk/conn_php.php';

$sample_tissue_type=$_GET["sample_tissue_type"];
$sample_source=$_GET["sample_source"];
$sample_biosample_type=$_GET["sample_biosample_type"];
$sample_biosample_name=$_GET["sample_biosample_name"];

if($sample_source!="All")
	$s_1 = "and sample_source='".$sample_source."'";
else
	$s_1 = "";
if($sample_tissue_type!="All")
	$s_2 = "and sample_tissue_type='".$sample_tissue_type."'";
else
	$s_2 = "";
if($sample_biosample_type!="All")
	$s_3 = "and sample_biosample_type='".$sample_biosample_type."'";
else
	$s_3 = "";
if($sample_biosample_name!="All")
	$s_4 = "and sample_biosample_name='".$sample_biosample_name."'";
else
	$s_4 = "";
$search = $s_1.$s_2.$s_3.$s_4;
if($search!="")
	$search = "where ".substr($search, 3);
$search = $search."order by sample_biosample_type";

$search_sql="SELECT distinct sample_biosample_type from sample_dataset $search";

$search_result=mysql_query($search_sql,$conn);

$search_all=mysql_query($search_sql,$conn);
$all = 0;
while($row = mysql_fetch_assoc($search_all)){
    $all ++;
}
if($all > 1){
    echo "<option value='All'>All</option>";
}

while($row = mysql_fetch_assoc($search_result)){
	echo "<option value='{$row['sample_biosample_type']}'>{$row['sample_biosample_type']}</option>\n";
}
?>