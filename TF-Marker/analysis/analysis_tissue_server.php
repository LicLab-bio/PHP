<?php
include '../public/public.php';
include '../public/conn_php.php';
$cel_type = $_REQUEST['cel_type_two'];
$tf_name = $_REQUEST['tf_name'];
$search="SELECT distinct $main.TissueType
FROM $main
join $tf_information
on CellType like '%$cel_type%'
and GeneName like  '%$tf_name%'
and GeneName = tf_information_gene_symbol";
$search_result=mysqli_query($conn,$search);
while($row = mysqli_fetch_assoc($search_result)){
    $data=empty($data)?'{"label": "'.$row["TissueType"].'"}':$data.',{"label": "'.$row['TissueType'].'"}';
}
//echo $search;
echo "[".$data."]";
?>