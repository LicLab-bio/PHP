<?php
ini_set("error_reporting","E_ALL & ~E_NOTICE");
include 'public/conn_php.php';
header("Content-type: text/html;charset=utf-8");//防止乱码
mysqli_query($conn,'SET NAMES UTF8');

$sample_tissue_type=$_GET["sample_tissue_type"];
//$sample_source=$_GET["sample_source"];
//$sample_biosample_type=$_GET["sample_biosample_type"];
$sample_biosample_name=$_GET["sample_biosample_name"];

//if($sample_source!="All")
	//$s_1 = "and sample_source='".$sample_source."'";
//else
	//$s_1 = "";
if($sample_tissue_type!="All")
	$s_2 = "and TissueType='".$sample_tissue_type."'";
else
	$s_2 = "";
//if($sample_biosample_type!="All")
	//$s_3 = "and sample_biosample_type='".$sample_biosample_type."'";
//else
	//$s_3 = "";
if($sample_biosample_name!="All")
	$s_4 = "and CellType='".$sample_biosample_name."'";
else
	$s_4 = "";
$search = $s_2.$s_4;
if($search!="")
	$search = "where ".substr($search, 3);
$search = $search."order by CellType";

$search_sql="SELECT distinct CellType from $main $search";

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
	echo "<option value='{$row['CellType']}'>{$row['CellType']}</option>\n";
}

?>