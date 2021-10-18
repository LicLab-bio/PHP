<?php
$cel_type = $_REQUEST['cel_type_three'];
$tis_type = $_REQUEST['tis_type_three'];
ini_set("error_reporting","E_ALL & ~E_NOTICE");
include '../public/conn_php.php';
$search="SELECT distinct $main.GeneName
FROM $main
join $tf_information
on CellType like '%$cel_type%'
    and TissueType like '%$tis_type%'
    and GeneName = tf_information_gene_symbol";
$search_result=mysqli_query($conn,$search);
while($row = mysqli_fetch_assoc($search_result)){
    $data=empty($data)?'{"label": "'.$row["GeneName"].'"}':$data.',{"label": "'.$row['GeneName'].'"}';
}
//echo $search;
echo "[".$data."]";
?>
