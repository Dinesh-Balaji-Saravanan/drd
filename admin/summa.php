<?php

include ("../connectivity/connect.php");
session_start();
$query = "select * from user_category GROUP BY sub_cat_id";
$result_qr = mysqli_query($connection,$query);

$i = 0;
while($rows = mysqli_fetch_array($result_qr)){

    $belian =  $rows['sub_cat_id'];
    $query1 = "select count(*) as cnt from user_category WHERE sub_cat_id = '$belian'";
    $result_qr2 = mysqli_query($connection,$query1);
    while($row = mysqli_fetch_array($result_qr2)){
        $total_per_item[$belian] = $row['cnt'];
    }
}
arsort($total_per_item);
/*
$query1 = "select * from sub_cat";
$result_qr2 = mysqli_query($connection,$query1);

$i = 0;
while($rows = mysqli_fetch_array($result_qr2)){
    $item[$i] =  $rows['sub_cat_id'];
    $i++;
}
if (isset($item) && isset($belian)){

    $item_array = array();

    foreach ($item as $value) {
        $total_per_item[$value] = 0;
        foreach($belian as $item_belian) {

                $total_per_item[$value]++;
        }
    }


}*/
print_r($total_per_item);
?>