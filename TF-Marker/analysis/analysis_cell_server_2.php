<?php
$tf_name = $_REQUEST['tf_name_three'];
$tis_type = $_REQUEST['tis_type_three'];
ini_set("error_reporting","E_ALL & ~E_NOTICE");
include '../public/conn_php.php';
$search="SELECT distinct $main.CellType
FROM $main
join $tf_information
on TissueType like '%$tis_type%'
and GeneName like  '%$tf_name%'
and GeneName = tf_information_gene_symbol";
$search_result=mysqli_query($conn,$search);
while($row = mysqli_fetch_assoc($search_result)){
    $data=empty($data)?'{"label": "'.$row["CellType"].'"}':$data.',{"label": "'.$row['CellType'].'"}';
}
//echo $search;
echo "[".$data."]";
?>