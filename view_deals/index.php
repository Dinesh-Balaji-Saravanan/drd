<?php
include ("../connectivity/connect.php");
session_start();
if (isset($_SESSION["login_user"])){
    $var = $_SESSION["login_user"];
}

if (isset($_GET['coupon_id'])){
    $cpn_id = $_GET['coupon_id'];
    $query_cpn_id = "select * from cpn_offr where coupon_id = '$cpn_id'";
    $res_cpn_id = mysqli_query($connection,$query_cpn_id);
    $cpn = mysqli_fetch_array($res_cpn_id);
    $cpn_title = $cpn['title'];
    $desc = $cpn['description'];
    $date = $cpn['date'];
    $type = $cpn['type'];
    $store_id =  $cpn['store_id'];
    $cpn_offr = $cpn['cpn_offr_link'];
    $coupon = $cpn['coupon'];
    $cpn_id_in = $cpn['coupon_id'];

    $qur_usr = "select * from user_details where full_name = '$var'";
    $user_res = mysqli_query($connection,$qur_usr);
    $uid = mysqli_fetch_array($user_res);
    $user_id = $uid['user_id'];

    $qur_cpn = "select * from cpn_category where coupon_id = '$cpn_id'";
    $cpn_res = mysqli_query($connection,$qur_cpn);
    while ($cpn_cat = mysqli_fetch_array($cpn_res)) {

        $sub_cat_id = $cpn_cat['sub_cat_id'];
        $qur_cat = "select * from user_category where coupon_id = '$cpn_id' and user_id = '$user_id' and store_id = '$store_id' and sub_cat_id = '$sub_cat_id'";
        $res_cat = mysqli_query($connection,$qur_cat);
        $cat_cnt = mysqli_num_rows($res_cat);
        if ($cat_cnt > 0){

        }else {
            $qur_cat_up = "insert into user_category (coupon_id,user_id,store_id, sub_cat_id) VALUES ('$cpn_id','$user_id','$store_id','$sub_cat_id')";
            $res_cat_up = mysqli_query($connection,$qur_cat_up);
        }
    }


    $qur_use = "update cpn_offr set uses = uses + 1 where coupon_id = '$cpn_id'";
    $res_use = mysqli_query($connection,$qur_use);

    $query_store = "select * from store where store_id = '$store_id'";
    $res_store = mysqli_query($connection,$query_store);
    $store = mysqli_fetch_array($res_store);
    $store_name = $store['store_name'];
    $store_logo = $store['store_logo'];

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

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
</head>
<style>
    .navbar {
        box-shadow: 0 3px 9px 0 rgba(0, 0, 0, 0.1), 0 2px 4px 0 rgba(0, 0, 0, 0.10);
    }
</style>
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
                                    <a class=\"dropdown-item\" href=\"../profile/\"><i class=\"fa fa-user-circle-o\" aria-hidden=\"true\"></i> Profile</a>
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

<div class="container"><br><br>
    <h5 style="padding-left: 150px" ><i class="fa fa-long-arrow-left" aria-hidden="true"></i> <a href="" onclick="history.go(-1);">Go Back</a>  <a href="../" style="padding-left: 650px">Close </a><i class="fa fa-close" aria-hidden="true"></i></h5><br>
<div class="row justify-content-center"><?php

    ?>
    <div class="col-sm-9" >
        <div class="card text-dark bg-light border border-secondary mb-3">
            <div  align="center" style="padding-top: 20px"><b><?php if($type == "Offer"){
                echo "No Coupon Code Required";
                }else{
                echo "Your Coupon";
                } ?><br><br></b>

                <div class="border border-dark" style="width: 220px;height: 50px;padding-top: 10px;background-color: #C6E746"><h4>DEAL ACTIVATED</h4></div><br><p class="card-text">To Avail this offer visit
                    <a class="link" href="<?php echo $cpn_offr;?>"><?php echo $store_name;?> <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></p><hr>
            </div>
            <div class="card-body" >
                <div class="row">
                    <div class="col-3"><img class="border border-dark" src="<?php echo $store_logo;?>" width="170" style="padding-top: 10px;padding-bottom: 10px" alt=""></div>
                    <div class="col-8"><h4 class="card-title"><?php echo $cpn_title;?></h4><hr>
                        <p class="card-text text-muted">Desc: <?php echo $desc;?></p></div>
                </div><?php if($type != "Offer"){
                    echo "<h1 class=\"display-4 text-dark\" align=\"center\">".$coupon."</h1>";
                } ?>

            </div>
            <div class="card-footer text-center"><p class=" text-success"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $date;?>
            </div>
        </div>
    </div>
</div></div><br>

<footer class="footer" style="background-color: #6c757d; height: 200px;color: #FFFFFF">
    <div class="container" align="center"><br>
        <span class="text-white" >Copyright @ DealRajaDeal | 2017</span><br><br>Home | Categories | Stores<br><br>
        <i class="fa fa-facebook-official fa-2x"  aria-hidden="true"></i> <i class="fa fa-instagram fa-2x"  aria-hidden="true"></i> <i class="fa fa-twitter-square fa-2x"  aria-hidden="true"></i> <br>Follow Us on social Medias <br>
    </div>
</footer>
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
