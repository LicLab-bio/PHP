<?php
$cel_type = $_REQUEST['cel_type'];
$tis_type = $_REQUEST['tis_type'];
$cel_name = $_REQUEST['cel_name'];
include '../public/conn_php.php';
$search="SELECT distinct GeneType
                from $main
                 where CellType like '%$cel_type%'
                 and TissueType like '%$tis_type%'
                 and CellName like '%$cel_name%'
                 order by GeneType";
$search_result=mysqli_query($conn,$search);
while($row = mysqli_fetch_assoc($search_result)){
    $data=empty($data)?'{"label": "'.$row["GeneType"].'"}':$data.',{"label": "'.$row['GeneType'].'"}';
}
//echo $search;
echo "[".$data."]";
?>