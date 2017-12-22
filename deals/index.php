<?php
include ("../connectivity/connect.php");
session_start();
if (isset($_SESSION["login_user"])){
    $var = $_SESSION["login_user"];
}
if (isset($_GET['store_id'])){
    $store_id1 = $_GET['store_id'];
    $query_store = "select * from store where store_id = '$store_id1'";
    $res_store = mysqli_query($connection,$query_store);
    $store = mysqli_fetch_array($res_store);
    $store_name = $store['store_name'];;
    $store_logo = $store['store_logo'];
    $query_cnt = "select * from cpn_offr where store_id = '$store_id1' and title != 'Title' ORDER BY uses DESC ";
    $res_cnt = mysqli_query($connection,$query_cnt);
    $deal_cnt = mysqli_num_rows($res_cnt);
}else{
    header('Location: ../');
}
if (isset($_POST['subs'])){
    $sub_store = $_POST['subs'];
    if(isset($var)){

        $qur_sub1 = "Select * from user_details WHERE full_name = '$var'";
        $res_sub1 = mysqli_query($connection,$qur_sub1);
        $fetc = mysqli_fetch_array($res_sub1);
        $email = $fetc['email'];

        $qur_sub = "Select * from subscribe WHERE email = '$email' and store_id = '$store_id1'";
        $res_sub = mysqli_query($connection,$qur_sub);
        $cnt = mysqli_num_rows($res_sub);
        if ($cnt > 0){
            $qur_del = "delete from subscribe where store_id = '$store_id1' and email = '$email'";
            $res_del = mysqli_query($connection,$qur_del);
            if ($res_del){
                $msg1 = "Successfully your subscription has been removed.";
            }

        }else{
            $qur_del = "insert into subscribe (email, store_id) VALUES ('$email','$store_id1')";
            $res_del = mysqli_query($connection,$qur_del);
            if ($res_del){
                $msg1 = "Successfully your subscription has been Added.";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

    <title>Deal Raja Deal</title>
    <style>

        div.scroll {

            width: 215px;
            height: 300px;
            overflow-y: scroll;
        }
        .scroll::-webkit-scrollbar {
            width: 5px;
        }

        .scroll::-webkit-scrollbar-track {
            background-color: #f7f7f7;
            border-radius: 10px;
        }

        .scroll::-webkit-scrollbar-thumb {
            border-radius: 10px;
            background-color: #adadad;
        }
        #card {
             box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1), 0 6px 20px 0 rgba(0, 0, 0, 0.10);
         }
        .navbar {
            box-shadow: 0 3px 9px 0 rgba(0, 0, 0, 0.1), 0 2px 4px 0 rgba(0, 0, 0, 0.10);
        }
        #scroll {
            position:fixed;
            right:10px;
            bottom:10px;
            cursor:pointer;
            width:50px;
            height:50px;
            background-color:#3498db;
            text-indent:-9999px;
            display:none;
            -webkit-border-radius:60px;
            -moz-border-radius:60px;
            border-radius:60px
        }
        #scroll span {
            position:absolute;
            top:50%;
            left:50%;
            margin-left:-8px;
            margin-top:-12px;
            height:0;
            width:0;
            border:8px solid transparent;
            border-bottom-color:#ffffff;
        }
        #scroll:hover {
            background-color:#e74c3c;
            opacity:1;filter:"alpha(opacity=100)";
            -ms-filter:"alpha(opacity=100)";
        }
    </style>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="css/font-awesome.min.css">
</head>

<body>

<nav class="navbar navbar-expand-md navbar-light bg-warning fixed-top">

    <div class="container">

        <a class="navbar-brand" href="../">DealRajaDeal</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01" style="width: 630px">
                        <div class="row" style="padding-left: 20px">
                            <div style="width: 200px;background-color: white;"><?php
                                $query = "select * from category WHERE cat_id != '22' and main_cat != 'Travel' limit 3";
                                $res = mysqli_query($connection,$query);
                                while($row = mysqli_fetch_array($res)){
                                    echo"<a href='../categories/?cat_id=".$row['cat_id']."'><h4 style='font-size: 15px' class=\"dropdown-header text-primary\">".$row['main_cat']."</h4></a>";
                                    $cat_id = $row['cat_id'];
                                    $query1 = "select * from sub_cat WHERE cat_id = '$cat_id' LIMIT 3";
                                    $res1 = mysqli_query($connection,$query1);
                                    while($row1 = mysqli_fetch_array($res1)){
                                        echo "<a class=\"dropdown-item\" style = 'padding-left: 40px' href=\"../categories/?sub_cat_id=".$row1['sub_cat_id']."\">".$row1['sub_cat_name']."</a>";
                                    }
                                    echo '<div class=\"dropdown-divider\"></div>';
                                }
                                ?>
                            </div>
                            <div style="width: 150px;background-color: white;"><?php
                                $query = "select * from category where main_cat = 'Travel'";
                                $res = mysqli_query($connection,$query);
                                while($row = mysqli_fetch_array($res)){
                                    echo"<a href='../categories/?cat_id=".$row['cat_id']."'><h4 style='font-size: 15px' class=\"dropdown-header text-primary\">".$row['main_cat']."</h4></a>";
                                    $cat_id = $row['cat_id'];
                                    $query1 = "select * from sub_cat WHERE cat_id = '$cat_id' LIMIT 4";
                                    $res1 = mysqli_query($connection,$query1);
                                    while($row1 = mysqli_fetch_array($res1)){
                                        echo "<a class=\"dropdown-item \" style = 'padding-left: 40px' href='../categories/?sub_cat_id=".$row1['sub_cat_id']."'>".$row1['sub_cat_name']."</a>";
                                    }
                                    echo '<div class=\"dropdown-divider\"></div>';
                                }
                                ?>
                            </div>
                            <div style="width: 270px;background-color: white;"><?php

                                echo"<h4 style='font-size: 15px' class=\"dropdown-header text-primary\">More Categories</h4>";
                                $query = "select * from category LIMIT 5,11";
                                $res = mysqli_query($connection,$query);
                                while($row = mysqli_fetch_array($res)){
                                    echo "<a class=\"dropdown-item \" style = 'padding-left: 40px' href='../categories/?cat_id=".$row['cat_id']."'>".$row['main_cat']."</a>";
                                }
                                echo"<a class=\"dropdown-item text-primary\" style = 'padding-left: 40px' href=\"../all-categories/\">See all Categories</a>";
                                ?>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Top Stores</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01" style="width: 602px;">
                        <div class="row" style="padding-left: 15px">
                            <div  style="width: 200px;background-color: white;"><?php
                                $query2 = "select * from store limit 5";
                                $res1 = mysqli_query($connection,$query2);
                                while($row1 = mysqli_fetch_array($res1)){
                                    echo"
                                    <a style = 'height: 75px;width:200px;padding-left:-20px' class=\"dropdown-item bg-light border border-left-0 border-right-0\" href='../deals/?store_id=".$row1['store_id']."'>
                                    <div class = 'row'>
                                    <div class='col-md-4 pull-left' style='padding-top: 20px;' >
                                    <img class=\"rounded\" height=\"20\" width=\"50\" src=\"".$row1['store_logo']."\">
                                    </div>
                                    <div class='col-md-6' style='padding-top: 10px;'>".$row1['store_name']."<br>";

                                    $store_id = $row1['store_id'];
                                    $query3 = "select * from cpn_offr WHERE store_id = '$store_id'";
                                    $res2 = mysqli_query($connection,$query3);
                                    $fet = mysqli_num_rows($res2);
                                    echo $fet." offers
                                       </div>
                                    </div>
                                    </a>";
                                }
                                ?>
                            </div>
                            <div  style="width: 200px;background-color: white; padding-left: 0px"><?php
                                $query2 = "select * from store limit 5,5";
                                $res1 = mysqli_query($connection,$query2);
                                while($row1 = mysqli_fetch_array($res1)){
                                    echo"
                                    <a style = 'height: 75px;width:200px;' class=\"dropdown-item bg-light border border-right-0\"href='../deals/?store_id=".$row1['store_id']."'>
                                    <div class = 'row'>
                                    <div class='col-md-4 pull-left' style='padding-top: 20px;' >
                                    <img class=\"rounded\" height=\"20\" width=\"50\" src=\"".$row1['store_logo']."\">
                                    </div>
                                    <div class='col-md-6' style='padding-top: 10px;'>".$row1['store_name']."<br>";

                                    $store_id = $row1['store_id'];
                                    $query3 = "select * from cpn_offr WHERE store_id = '$store_id'";
                                    $res2 = mysqli_query($connection,$query3);
                                    $fet = mysqli_num_rows($res2);
                                    echo $fet." offers
                                       </div>
                                    </div>
                                    </a>";
                                }
                                ?>
                            </div>
                            <div  style="width: 150px;background-color: white; padding-left: 0px"><?php
                                $query2 = "select * from store limit 10,4";
                                $res1 = mysqli_query($connection,$query2);
                                while($row1 = mysqli_fetch_array($res1)){
                                    echo"
                                    <a style = 'height: 75px;width:200px;' class=\"dropdown-item bg-light border border-right-0\" href='../deals/?store_id=".$row1['store_id']."'>
                                    <div class = 'row'>
                                    <div class='col-md-4 pull-left' style='padding-top: 20px;' >
                                    <img class=\"rounded\" height=\"20\" width=\"50\" src=\"".$row1['store_logo']."\">
                                    </div>
                                    <div class='col-md-6' style='padding-top: 10px;'>".$row1['store_name']."<br>";

                                    $store_id = $row1['store_id'];
                                    $query3 = "select * from cpn_offr WHERE store_id = '$store_id'";
                                    $res2 = mysqli_query($connection,$query3);
                                    $fet = mysqli_num_rows($res2);
                                    echo $fet." offers
                                       </div>
                                    </div>
                                    </a>";
                                }
                                echo"
                                    <a style = 'height: 75px;width:200px;' class=\"dropdown-item bg-light border border-right-0\" href='../all-stores'>
                                    <p style='padding-top: 20px;padding-left: 10px'>View all stores <i class=\"fa fa-angle-right\" aria-hidden=\"true\"></i></p>
                                    </a>";
                                ?>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="row">
                <?php if (isset($_SESSION['login_user'])){
                    $var = $_SESSION['login_user'];
                    echo"<ul class=\"navbar-nav mr-auto\">
                            <li class=\"nav-item dropdown\">
                                <a href='' class=\"nav-link dropdown-toggle\"  id=\"dropdown01\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\"><i class=\"fa fa-user-circle-o\" aria-hidden=\"true\"></i> ".$var."</a>
                                <div class=\"dropdown-menu\" aria-labelledby=\"dropdown01\">
                                    <a class=\"dropdown-item\" href=\"../profile\"><i class=\"fa fa-user-circle-o\" aria-hidden=\"true\"></i> Profile</a>
                                    <div class=\"dropdown-divider\"></div>
                                    <a class=\"dropdown-item\" href=\"../connectivity/logout.php\"><i class=\"fa fa-sign-out\" aria-hidden=\"true\"></i> logout</a>
                                </div>
                            </li>
                          </ul>";
                } else{
                    echo"
                  <div class=\"col-lg-4\">
                      <a href='../login/' role='button' class=\"btn btn-outline-success\" >Login</a>
                  </div>
                  <div class=\"col-lg-4\">
                      <a href='../register/' class=\"btn btn-outline-primary\"  role=\"button\">Signup</a>
                  </div>";
                }?><div class="col-md-6"></div>
            </div>
        </div>
    </div>
</nav>
<br/>
<script>
    $(document).ready(function(){
        $('.action').change(function(){

            var action = $(this).attr("id");
            if ($(this).is(':checked')) {
                $('.' + action).attr('checked', true);
            } else {
                $('.' + action).attr('checked', false);
            }
        });
    });
</script>
<div class="col-md-12">
<div class="row">
    <div class="col-3 " style="padding-left: 50px"><br><br>
        <img id="card" style="height: 150px;width: 250px; padding-top: 30px;padding-bottom: 30px" src="<?php echo $store_logo;?>" width="150" align="center" class="rounded border border-secondary">
        <div style="width: 250px;padding-top: 20px">
        <div class="card border border-primary" style="height: 420px" >
            <div class="card-body">
            <form method="post">
            <h6 class="card-title">Categories <button type="reset" class="btn btn-sm btn-default pull-right"> Clear</button></h6><br>
            <div class="scroll">
            <p class="card-text">
            <div id="exampleAccordion" data-children=".item"><?php
            $qr = "select category.cat_id,category.main_cat from sub_cat,cpn_category,cpn_offr,category where cpn_offr.store_id = '$store_id1' and cpn_category.coupon_id = cpn_offr.coupon_id and sub_cat.sub_cat_id = cpn_category.sub_cat_id and category.cat_id = sub_cat.cat_id GROUP BY category.cat_id";
            $rest = mysqli_query($connection,$qr);
            $i = 0;
            while ($r = mysqli_fetch_array($rest)){
                $i++;
                $c_id = $r['cat_id'];
                echo '<div class="form-check">
                       <label class="form-check-label">
                        <input class="form-check-input action" id="sel'.$i.'" name="cat_id[]" value="'.$r['cat_id'].'" type="checkbox"> <a data-toggle="collapse" data-parent="#exampleAccordion" href="#exampleAccordion'.$i.'" aria-expanded="true" aria-controls="exampleAccordion1">'.$r['main_cat'].'
                        <div class="item">
            </a><div id="exampleAccordion'.$i.'" class="collapse" role="tabpanel">
                      <p class="mb-3">';
                $qer = "select * from sub_cat where cat_id = '$c_id' and sub_cat_id in (select sub_cat_id from cpn_category, cpn_offr where cpn_category.coupon_id = cpn_offr.coupon_id and cpn_offr.store_id = '$store_id1') GROUP BY sub_cat_id";
                $resq = mysqli_query($connection,$qer);

                while ($rs = mysqli_fetch_array($resq)){
                    $sc = $rs['sub_cat_id'];
                    $query_deal = "select * from cpn_category as c, cpn_offr as co where c.sub_cat_id = '$sc' and co.coupon_id = c.coupon_id GROUP BY co.coupon_id ORDER BY uses DESC ";
                    $res_deal = mysqli_query($connection,$query_deal);
                    $cnt = mysqli_num_rows($res_deal);
                   echo '
                      <div class="form-check">
                       <label class="form-check-label">
                        <input class="form-check-input sel'.$i.'" name="sub_cat_id[]" value="'.$rs['sub_cat_id'].'" type="checkbox">
                        '.$rs['sub_cat_name'].' ('.$cnt.')</label>
                      </div>';
                }
                echo '
                      </p>
                    </div></div>
                      </label>
                      </div>';
            }

            ?>
            </div>
            </p>
            </div> <center style="padding-top: 5px"><button type="submit" class="btn btn-primary btn-sm" name="apply">Apply</button></center>
            </form>
            </div>
        </div></div>
    </div>
    <div class="col-8" style="">
    <br><br>
        <?php if(isset($msg1)){if($msg1 != ""){?><div class="alert alert-success" role="alert">
            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>  <?php echo $msg1; ?> </div><?php }} ?>

        <?php if(isset($errorMessage)){if($errorMessage != ""){?><div class="alert alert-danger" role="alert">
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><?php echo $errorMessage; ?></div><?php }} ?>

        <?php if(isset($info)){if($info != ""){?><div class="alert alert-info" role="alert">
            <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><?php echo $info; ?></div><?php }} ?>

            <form method="post" >
                <div class="row">
                    <div class="col-md-10" style="padding-left: 15px">
                        <h2 ><br><?php echo $store_name;?> Coupons & Offers</h2>
                        <p>In <?php echo $store_name." there are ".$deal_cnt." deals. Find out more exiting offers and deals";?></p>
                    </div>
                </div>
            </form>

        <br><?php
        if (isset($_POST['sub_cat_id'])){
            $cat_id = array_unique($_POST['sub_cat_id']);
            foreach ($cat_id as $c_id){
                $query_deal = "select * from cpn_category as c, cpn_offr as co where c.sub_cat_id = '$c_id' and store_id = '$store_id1' and co.coupon_id = c.coupon_id and now() < co.date GROUP BY co.coupon_id ORDER BY uses DESC ";
                $res_deal = mysqli_query($connection,$query_deal);
                $cnt = mysqli_num_rows($res_deal);
                if ($cnt > 0){
                $i = 0;
                    $arr = array();
                while($row_deal = mysqli_fetch_array($res_deal)){
                    $i++;
                    $coupn_id = $row_deal['coupon_id'];
                    if (!in_array($coupn_id, $arr)) {

                    ?><div  style="width: 840px" >
                        <div class="card bg-light border-secondary mb-3">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-2">
                                        <div class="rounded border border-danger text-danger" align="center">
                                            <h3 style="padding-top: 10px"><?php echo $row_deal['off_rate'];?></h3>
                                            <h6 style="padding-bottom: 5px"><?php echo $row_deal['tags'];?></h6>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <p class=" text-success"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $row_deal['date'];?> <i class="fa fa-users" aria-hidden="true" style="padding-left: 60px"></i> <?php echo $row_deal['uses'];?> People have used</p>
                                        <h4  class="card-title text-dark"><?php echo $row_deal['title'];?></h4><hr>
                                        <p class="card-text text-muted"><?php echo $row_deal['description'];?></p>
                                    </div>
                                    <form method="GET">
                                        <div class="float-right"><BR><BR>
                                            <a href="../view_deals/?coupon_id=<?php echo $row_deal['coupon_id'];?>" role="button" name="view"  class="btn btn-danger btn-block">
                                                <?php if ($row_deal['type']=="Coupon"){
                                                    echo "View Coupon";
                                                }else{
                                                    echo "Activate Deal";
                                                }
                                                ?></a></div></form>
                                </div>
                            </div>
                        </div><br>
                    </div><?php
                    }

                    array_push($arr,$coupn_id);
                }
                }else{
                    $query_deal = "select * from cpn_offr where store_id = '$store_id1' and title != 'Title' and now() < date ORDER BY uses DESC ";
                    $res_deal = mysqli_query($connection,$query_deal);
                    $i = 0;
                    while($row_deal = mysqli_fetch_array($res_deal)){
                        $i++;

                        ?>
                        <div  style="width: 840px" >
                            <div class="card bg-light border-secondary mb-3">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-2">
                                            <div class="rounded border border-danger text-danger" align="center">
                                                <h3 style="padding-top: 10px"><?php echo $row_deal['off_rate'];?></h3>
                                                <h6 style="padding-bottom: 5px"><?php echo $row_deal['tags'];?></h6>
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <p class=" text-success"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $row_deal['date'];?> <i class="fa fa-users" aria-hidden="true" style="padding-left: 60px"></i> <?php echo $row_deal['uses'];?> People have used</p>
                                            <h4  class="card-title text-dark"><?php echo $row_deal['title'];?></h4><hr>
                                            <p class="card-text text-muted"><?php echo $row_deal['description'];?></p>
                                        </div>
                                        <form action="../view_deals/" method="GET">
                                            <div class="float-right"><BR><BR>
                                                <a href="../view_deals/?coupon_id=<?php echo $row_deal['coupon_id'];?>" role="button" name="view"  class="btn btn-danger btn-block">
                                                    <?php if ($row_deal['type']=="Coupon"){
                                                        echo "View Coupon";
                                                    }else{
                                                        echo "Activate Deal";
                                                    }
                                                    ?></a></div></form>
                                    </div>
                                </div>
                            </div><br>
                        </div><?php
                    } }
            }

        }

        else{
        $query_deal = "select * from cpn_offr where store_id = '$store_id1' and title != 'Title'  ORDER BY uses DESC ";
        $res_deal = mysqli_query($connection,$query_deal);
        $i = 0;
        while($row_deal = mysqli_fetch_array($res_deal)){
            $i++;

    ?>
    <div  style="width: 840px" >
        <div class="card bg-light border-secondary mb-3">
            <div class="card-body ">
                <div class="row">
                    <div class="col-2">
                        <div class="rounded border border-danger text-danger" align="center">
                            <h3 style="padding-top: 10px"><?php echo $row_deal['off_rate'];?></h3>
                            <h6 style="padding-bottom: 5px"><?php echo $row_deal['tags'];?></h6>
                        </div>
                    </div>
                    <div class="col-8">
                        <p class=" text-success"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo "Expires on: ".$row_deal['date'];?> <i class="fa fa-users" aria-hidden="true" style="padding-left: 60px"></i> <?php echo $row_deal['uses'];?> People have used</p>
                        <h4  class="card-title text-dark"><?php echo $row_deal['title'];?></h4><hr>
                        <p class="card-text text-muted"><?php echo $row_deal['description'];?></p>
                    </div>
                <form action="../view_deals/" method="GET">
                    <div class="float-right"><BR><BR>
                        <a href="../view_deals/?coupon_id=<?php echo $row_deal['coupon_id'];?>" role="button" name="view"  class="btn btn-danger btn-block">
                    <?php if ($row_deal['type']=="Coupon"){
                        echo "View Coupon";
                    }else{
                        echo "Activate Deal";
                    }
                    ?></a></div></form>
                </div>
            </div>
        </div><br>
    </div>
    <?php
        } }?></div>
</div></div>
<br>

    <footer class="footer" style="background-color: #6c757d; height: 200px;color: #FFFFFF">
        <div class="container" align="center"><br>
            <span class="text-white" >Copyright @ DealRajaDeal | 2017</span><br><br>Home | Categories | Stores<br><br>
            <i class="fa fa-facebook-official fa-2x"  aria-hidden="true"></i> <i class="fa fa-instagram fa-2x"  aria-hidden="true"></i> <i class="fa fa-twitter-square fa-2x"  aria-hidden="true"></i> <br>Follow Us on social Medias <br>
        </div>
    </footer>

    <script>
        $(document).ready(function(){
            $(window).scroll(function(){
                if ($(this).scrollTop() > 100) {
                    $('#scroll').fadeIn();
                } else {
                    $('#scroll').fadeOut();
                }
            });
            $('#scroll').click(function(){
                $("html, body").animate({ scrollTop: 0 }, 600);
                return false;
            });
        });
    </script>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="../../../../assets/js/vendor/popper.min.js"></script>
<script src="../../../../dist/js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
