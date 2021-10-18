<?php
$cel_type = $_REQUEST['cel_type'];
$Gen_type = $_REQUEST['Gen_type'];
$cel_name = $_REQUEST['cel_name'];
include '../public/conn_php.php';
$search="SELECT distinct TissueType
                from $main
                 where CellType like '%$cel_type%' 
                 and  CellName like '%$cel_name%' 
                 and GeneType  like '%$Gen_type%'
                 order by TissueType";
$search_result=mysqli_query($conn,$search);
while($row = mysqli_fetch_assoc($search_result)){
    $data=empty($data)?'{"label": "'.$row["TissueType"].'"}':$data.',{"label": "'.$row['TissueType'].'"}';
}
//echo $search;
echo "[".$data."]";
?>