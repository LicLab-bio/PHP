<?php
$tis_type = $_REQUEST['$tis_type'];
$Gen_type = $_REQUEST['Gen_type'];
$cel_name = $_REQUEST['cel_name'];
include '../public/conn_php.php';
$search="SELECT distinct CellType
                from $main
                 where TissueType like '%$tis_type%'
                 and CellName like '%$cel_name%'
                 and GeneType like '%$Gen_type%'
                 order by CellType";
$search_result=mysqli_query($conn,$search);
while($row = mysqli_fetch_assoc($search_result)){
    $data=empty($data)?'{"label": "'.$row["CellType"].'"}':$data.',{"label": "'.$row['CellType'].'"}';
}
//echo $search;
echo "[".$data."]";
?>