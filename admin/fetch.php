<?php
//fetch.php

require("../connectivity/connect.php");
session_start();
$var=$_SESSION["login_user"];

$output = '';
if(isset($_POST["action"]))
{
    if ($_POST['action'] == 'category') {
        $cat_id = $_POST["query"];
        $query = "Select * from sub_cat WHERE cat_id = '$cat_id'";
        $res = mysqli_query($connection, $query);
        $output .= '<option value="">Select Sub-Category</option> ';

        while ($row = mysqli_fetch_array($res)) {
            $output .= '<option value="' . $row["sub_cat_id"] . '">' . $row["sub_cat_name"] . '</option>';
        }
    }
    if ($_POST['action'] == 'category2') {
        $cat_id = $_POST["query"];
        $query = "Select * from sub_cat WHERE cat_id = '$cat_id'";
        $res = mysqli_query($connection, $query);
        $output .= '<option value="">Select Sub-Category</option> ';

        while ($row = mysqli_fetch_array($res)) {
            $output .= '<option value="' . $row["sub_cat_id"] . '">' . $row["sub_cat_name"] . '</option>';
        }
    }
    echo $output;
    echo "HI";
}
?>