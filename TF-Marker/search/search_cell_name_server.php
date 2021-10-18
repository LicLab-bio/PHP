<?php
$cel_type = $_REQUEST['cel_type'];
$tis_type = $_REQUEST['tis_type'];
$Gen_type = $_REQUEST['Gen_type'];
include '../public/conn_php.php';
$search="SELECT distinct CellName
                from $main
                 where CellType like '%$cel_type%'
                 and TissueType like '%$tis_type%'
                 and GeneType like '%$Gen_type%'
                 order by CellName";
$search_result=mysqli_query($conn,$search);
while($row = mysqli_fetch_assoc($search_result)){
    $data=empty($data)?'{"label": "'.$row["CellName"].'"}':$data.',{"label": "'.$row['CellName'].'"}';
}
//echo $search;
echo "[".$data."]";
?>
