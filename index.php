<?php
include ("connectivity/connect.php");
session_start();
$var = "";
if (isset($_SESSION["login_user"])){
    $var = $_SESSION["login_user"];
}

$query_usr = "select * from user_details where full_name = '$var'";
$result_usr = mysqli_query($connection,$query_usr);
$res = mysqli_fetch_array($result_usr);
$user_id = $res['user_id'];
$query = "select * from user_category where user_id = (select user_id from user_details where full_name = '$var') GROUP BY sub_cat_id";
$result_qr = mysqli_query($connection,$query);

$i = 0;
while($rows = mysqli_fetch_array($result_qr)){

    $belian =  $rows['sub_cat_id'];
    $query1 = "select count(*) as cnt from user_category WHERE user_id = (select user_id from user_details where full_name = '$var') and sub_cat_id = '$belian'";
    $result_qr2 = mysqli_query($connection,$query1);
    while($row = mysqli_fetch_array($result_qr2)){
        $total_per_item[$belian] = $row['cnt'];
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
    <link rel="stylesheet" href="asset/css/font-awesome.min.css">

    <title>Deal Raja Deal</title>
    <style>
        div.card:hover {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            transition: .2s;
        }

        .navbar {
            box-shadow: 0 3px 9px 0 rgba(0, 0, 0, 0.1), 0 2px 4px 0 rgba(0, 0, 0, 0.10);
        }
    </style>
    <script>
        $('#serviceList').on('shown.bs.collapse'), function() {
            $(".servicedrop").addClass('fa-chevron-up').removeClass('fa-chevron-down');
        }

        $('#serviceList').on('hidden.bs.collapse'), function() {
            $(".servicedrop").addClass('fa-chevron-down').removeClass('fa-chevron-up');
        }
    </script>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

</head>

<body>

<nav class="navbar navbar-expand-md navbar-light bg-warning fixed-top">

    <div class="container">

            <a class="navbar-brand" href="../drd/">DealRajaDeal</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01" style="width: 630px">
                        <div class="row" style="padding-left: 20px">
                            <div style="width: 200px;background-color: white;"><?php
                                $query = "select * from category WHERE cat_id != '22' and main_cat != 'Travel' limit 3";
                                $res = mysqli_query($connection,$query);
                                while($row = mysqli_fetch_array($res)){
                                    echo"<a href='categories/?cat_id=".$row['cat_id']."'><h4 style='font-size: 15px' class=\"dropdown-header text-primary\">".$row['main_cat']."</h4></a>";
                                    $cat_id = $row['cat_id'];
                                    $query1 = "select * from sub_cat WHERE cat_id = '$cat_id' LIMIT 3";
                                    $res1 = mysqli_query($connection,$query1);
                                    while($row1 = mysqli_fetch_array($res1)){
                                        echo "<a class=\"dropdown-item\" style = 'padding-left: 40px' href=\"categories/?sub_cat_id=".$row1['sub_cat_id']."\">".$row1['sub_cat_name']."</a>";
                                    }
                                    echo '<div class=\"dropdown-divider\"></div>';
                                }
                                ?>
                            </div>
                            <div style="width: 150px;background-color: white;"><?php
                                $query = "select * from category where main_cat = 'Travel'";
                                $res = mysqli_query($connection,$query);
                                while($row = mysqli_fetch_array($res)){
                                    echo"<a href='categories/?cat_id=".$row['cat_id']."'><h4 style='font-size: 15px' class=\"dropdown-header text-primary\">".$row['main_cat']."</h4></a>";
                                    $cat_id = $row['cat_id'];
                                    $query1 = "select * from sub_cat WHERE cat_id = '$cat_id' LIMIT 4";
                                    $res1 = mysqli_query($connection,$query1);
                                    while($row1 = mysqli_fetch_array($res1)){
                                        echo "<a class=\"dropdown-item \" style = 'padding-left: 40px' href='categories/?sub_cat_id=".$row1['sub_cat_id']."'>".$row1['sub_cat_name']."</a>";
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
                                    echo "<a class=\"dropdown-item \" style = 'padding-left: 40px' href='categories/?cat_id=".$row['cat_id']."'>".$row['main_cat']."</a>";
                                }
                                echo"<a class=\"dropdown-item text-primary\" style = 'padding-left: 40px' href=\"all-categories\">See all Categories</a>";
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
                                    <a style = 'height: 75px;width:200px;padding-left:-20px' class=\"dropdown-item bg-light border border-left-0 border-right-0\" href='deals/?store_id=".$row1['store_id']."'>
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
                                    <a style = 'height: 75px;width:200px;' class=\"dropdown-item bg-light border border-right-0\"href='deals/?store_id=".$row1['store_id']."'>
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
                                    <a style = 'height: 75px;width:200px;' class=\"dropdown-item bg-light border border-right-0\" href='deals/?store_id=".$row1['store_id']."'>
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
                                    <a style = 'height: 75px;width:200px;' class=\"dropdown-item bg-light border border-right-0\" href='all-stores'>
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
                                    <a class=\"dropdown-item\" href=\"profile/\"><i class=\"fa fa-user-circle-o\" aria-hidden=\"true\"></i> Profile</a>
                                    <div class=\"dropdown-divider\"></div>
                                    <a class=\"dropdown-item\" href=\"connectivity/logout.php\"><i class=\"fa fa-sign-out\" aria-hidden=\"true\"></i> logout</a>
                                </div>
                            </li>
                          </ul>";
                } else{
                    echo"
                  <div class=\"col-lg-4\">
                      <a href='login/' role='button' class=\"btn btn-outline-success\" >Login</a>
                  </div>
                  <div class=\"col-lg-4\">
                      <a href='register/' class=\"btn btn-outline-primary\"  role=\"button\">Signup</a>
                  </div>";
                }?><div class="col-md-6"></div>
            </div>
        </div>
    </div>
</nav>
<br/><br/><br/>

<div class="container"><?php if(!isset($_SESSION['login_user'])){ ?>
    <p style="font-size: 18px" align="center">
        <span class="badge badge-dark"> Welcome </span> New to DealRajaDeal? Earn Cashbacks over and above the amazing Discounts! Sign up & Earn</p><?php }else { ?>
        <p style="font-size: 18px" align="center">
            <span class="badge badge-dark"> Welcome </span> Checkout all the amazing offers at DealRajaDeal</p><?php

    }?>
<div class="row justify-content-center">
    <div class="col-sm-10">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

            <ol class="carousel-indicators">
                <li  data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="img/1.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="img/2.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="img/3.jpg" alt="Third slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="img/4.jpg" alt="Fourth slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>
</div>
<br>
<div class="jumbotron">
    <div class="container">
        <h3>TOP STORES</h3><br>
        <div class="row justify-content-center"><?php
            $query = "select * from store limit 12";
            $res = mysqli_query($connection,$query);
            $i = 0;
            while($row = mysqli_fetch_array($res)){
                $i++;
                ?>

                <div class="col-sm-2"><br>
                <div class="card border-secondary mb-3" align="center">
<br>
                    <img class="rounded" height="50" width="125" src="<?php echo $row['store_logo'];?>">
                    <div class="card-body" align="center">
                        <div class="form-check" align="center"><?php
                            $store_id = $row['store_id'];
                            $query1 = "select count(*) as total from cpn_offr where store_id = '$store_id' and title != 'Title'";
                            $res2 = mysqli_query($connection,$query1);
                            $row1 = mysqli_fetch_array($res2);
                            $total = $row1['total'];
                            if ($total){
                                echo "<a href='deals/?store_id=".$row['store_id']."' role='button'  name='store_id' class=\"btn btn-sm btn-outline-primary btn-block\">".$total." Offers"."</a>";
                            }else{
                                echo "<p style='padding-top: 1px'>No Offers</p>";
                            }

                            ?>
                        </div>
                    </div>
                </div>
                </div><?php
            }?>
        </div>
    </div></div>
<br>


<div class="container"><?php
    if (isset($total_per_item)){
    if (isset($_SESSION["login_user"])){
        ?>
        <div class="row">
            <div class="col-11"><h3 >Recommended to you </h3></div>
            <div class="1">
                <div class="press-title pull-right">
                    <p class="text" data-toggle="collapse" data-target="#serviceList">
                        <a  href="" id="servicesButton" data-toggle="tooltip " data-original-title="Click Me!"><i class="servicedrop fa fa-chevron-down" aria-hidden="true"></i></a>
                    </p>
                </div>
            </div>
        </div>

        <hr>
        <div id="serviceList" class="collapse show">
        <div class="row justify-content-center featurette"><?php
    $items =  array_slice($total_per_item, 0, 6, true);
    $arr = array();
    foreach ($items as $sub_cat_id=>$val){

        $query_deal = "select * from cpn_offr WHERE coupon_id in (select coupon_id from cpn_category where sub_cat_id = '$sub_cat_id' and coupon_id not in (select coupon_id from user_category where user_id = '$user_id') )GROUP BY coupon_id limit 6";
        $res_deal = mysqli_query($connection,$query_deal);
        $i = 0;
        while($row_deal = mysqli_fetch_array($res_deal)) {
            $cpn_ids = $row_deal['coupon_id'];
            if (!in_array($cpn_ids,$arr)){

                $store_id = $row_deal['store_id'];
                $_SESSION['store_id']  = $store_id;
                $query_logo = "select * from store where store_id = '$store_id'";
                $logo_res = mysqli_query($connection,$query_logo);
                $logo = mysqli_fetch_array($logo_res);
                $quer_deals = "select * from cpn_offr where store_id = '$store_id'";
                $deals_res = mysqli_query($connection,$quer_deals);
                $deals = mysqli_num_rows($deals_res);

                ?>
                <div class="col-sm-4" style="padding-top: 20px">
                <div class="card bg-light border-secondary mb-3">
                    <div class="card-body" >

                        <div class="row" style="padding-left: 15px">
                            <a href="deals/?store_id=<?php echo $store_id;?>"><img class="border border-secondary"  src="<?php echo $logo['store_logo'];?>" height="50" width="150" alt="Card image cap"></a>
                            <p class="text-muted" style="padding-left: 50px; font-size: small;"><?php echo $row_deal['uses'];?> People have used</p>
                        </div>
                        <br>
                        <b>
                            <p class="card-title" style="height: 75px"><?php echo substr($row_deal['title'], 0, 100);?></p>
                        </b>

                        <p class="card-text text-success" style="font-size: small; height: 50px">
                            <?php echo substr($row_deal['description'], 0, 100);?>...</p>

                        <form action="view_deals/" method="get">
                            <div class="col-md-12">
                                <a href="view_deals?coupon_id=<?php echo $row_deal['coupon_id'];?>" role="button" name="view"  class="btn btn-<?php if ($row_deal['type']=="Coupon"){
                                    echo "danger";
                                }else{
                                    echo "primary";
                                }
                                ?> btn-block">
                                    <?php if ($row_deal['type']=="Coupon"){
                                        echo "View Coupon";
                                    }else{
                                        echo "Activate Deal";
                                    }
                                    ?></a>
                            </div>
                        </form>
                    </div>

                    <div class="card-footer text-muted text-sm-center" style="font-size: small;"><a href="deals/?store_id=<?php echo $store_id;?>"><?php echo "see all ".$deals." ".$logo['store_name']." offers" ;?></a>
                    </div>
                </div>
                </div><?php
            }

            array_push($arr,$cpn_ids);
        }
    }
            ?>
            </div></div>
    <br>
</div>
<div class="jumbotron"><?php
        }else{
        ?>

    <br>
</div>
<div><?php
    }
    }
    ?>

<div class="container">
    <h3 align="center">TODAY’S BEST OFFERS & COUPONS</h3><br>
<div class="row justify-content-center"><?php

    $query_deal = "select * from cpn_offr WHERE title !='Title' and coupon_id not in (select coupon_id from user_category where user_id = '$user_id') ORDER BY uses DESC limit 12";
    $res_deal = mysqli_query($connection,$query_deal);
    $i = 0;
    while($row_deal = mysqli_fetch_array($res_deal)) {
        $store_id = $row_deal['store_id'];
        $_SESSION['store_id']  = $store_id;
        $query_logo = "select * from store where store_id = '$store_id'";
        $logo_res = mysqli_query($connection,$query_logo);
        $logo = mysqli_fetch_array($logo_res);
        $quer_deals = "select * from cpn_offr where store_id = '$store_id'";
        $deals_res = mysqli_query($connection,$quer_deals);
        $deals = mysqli_num_rows($deals_res);

        ?>
        <div class="col-sm-4" style="padding-top: 20px">
            <div class="card bg-light border-secondary mb-3">
                <div class="card-body" >

                    <div class="row" style="padding-left: 15px">
                        <a href="deals/?store_id=<?php echo $store_id;?>"><img class="border border-secondary"  src="<?php echo $logo['store_logo'];?>" height="50" width="150" alt="Card image cap"></a>
                        <p class="text-muted" style="padding-left: 50px; font-size: small;"><?php echo $row_deal['uses'];?> People have used</p>
                    </div>
                    <br>
                    <b>
                        <p class="card-title" style="height: 75px"><?php echo substr($row_deal['title'], 0, 100);?></p>
                    </b>

                    <p class="card-text text-success" style="font-size: small; height: 50px">
                        <?php echo substr($row_deal['description'], 0, 100);?>...</p>

                    <form action="view_deals/" method="get">
                        <div class="col-md-12">
                            <a href="view_deals?coupon_id=<?php echo $row_deal['coupon_id'];?>" role="button" name="view"  class="btn btn-<?php if ($row_deal['type']=="Coupon"){
                                echo "danger";
                            }else{
                                echo "primary";
                            }
                            ?> btn-block">
                                <?php if ($row_deal['type']=="Coupon"){
                                    echo "View Coupon";
                                }else{
                                    echo "Activate Deal";
                                }
                                ?></a>
                        </div>
                    </form>
                </div>

                <div class="card-footer text-muted text-sm-center" style="font-size: small;"><a href="deals/?store_id=<?php echo $store_id;?>"><?php echo "see all ".$deals." ".$logo['store_name']." offers" ;?></a>
                </div>
            </div>
        </div><?php
    }
    ?>
</div>
</div>
</div>


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
</body>
</html>
