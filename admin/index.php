<?php
include("../connectivity/connect.php");
include("../connectivity/extract.php");
if(isset($_POST["submit"]))
{
    $store_id = $_POST['store'];
    if($_FILES['file']['name'])
    {
        $filename=explode('.',$_FILES['file']['name']);
        if($filename[1]=='csv')
        {
            $i = 0;
            $j = 0;
            $handle=fopen($_FILES['file']['tmp_name'],"r");
            while($data=fgetcsv($handle))
            {
                $title = mysqli_real_escape_string($connection,$data[0]);
                $off_rate = mysqli_real_escape_string($connection,$data[1]);
                $tag = mysqli_real_escape_string($connection,$data[2]);
                $cpn_offr_link = mysqli_real_escape_string($connection,$data[3]);
                $coupon = mysqli_real_escape_string($connection,$data[4]);
                $date = mysqli_real_escape_string($connection,$data[5]);
                $type = mysqli_real_escape_string($connection,$data[6]);
                $desc = mysqli_real_escape_string($connection,$data[7]);
                $today = date("Y-m-d");
                date_default_timezone_set('Asia/Kolkata');

                if( $title !="Title" && $title !=''){

                    $qur_chk = "select * from cpn_offr where title ='$title' and store_id = '$store_id' and type = '$type'";
                    $res_ck = mysqli_query($connection,$qur_chk);
                    $cnt = mysqli_num_rows($res_ck);
                    if ($cnt > 0){
                        $errorMessage = "Coupon/offer is Already added or Not Added";
                    }
                    else{

                        if ($date > $today){
                            $query = "insert into cpn_offr (title, off_rate, tags, coupon, cpn_offr_link, store_id, description, date, type) VALUES ('$title','$off_rate','$tag','$coupon','$cpn_offr_link','$store_id','$desc','$date','$type')";
                            $result = mysqli_query($connection,$query);

                            if ($result){

                                $msg1 = "Coupon is successfully Added.";

                            }else{
                                $errorMessage = "Coupon is not Added";
                            }
                        }else {
                            $errorMessage = $date." is Not Valid";
                        }
                    }



                }

            }
            fclose($handle);
        }

    }
}
if (isset($_POST['delBtn1'])){
    $del = $_POST['chk'];
    foreach ($del as $val){

        $query1 = "delete from cpn_offr where coupon_id = '$val'";
        $res2 = mysqli_query($connection,$query1);

    }
    if ($res2){
        $msg1 = "Deleted Succesfylly";
    }else{
        $errorMessage = "Cannot Delete";
    }
}
if (isset($_POST['subcat']) && isset($_POST['chk'])){
    $chk = $_POST['chk'];
    $subcat = $_POST['subcat'];
    $i = $j = $k = 0;
    foreach ($chk as $c){
        foreach ($subcat as $val){
            $qur_chk = "select * from cpn_category where coupon_id = '$c' and sub_cat_id = '$val'";
            $res_ck = mysqli_query($connection,$qur_chk);
            $cnt = mysqli_num_rows($res_ck);
            if ($cnt > 0){
                $i++;
                $info = $i." Coupon/offer is Already added to subcategory";
            }
            else{

                $query = "insert into cpn_category (sub_cat_id, coupon_id) VALUES ('$val','$c')";
                $result = mysqli_query($connection,$query);

                if ($result){
                    $j++;
                    $msg1 = $j." Coupon is successfully Added to the sub cateogry.";

                }else{
                    $k++;
                    $errorMessage = $k." Coupon is not Added to the sub cateogry";
                }
            }
        }

    }
}
if (isset($_POST['cat']) && isset($_POST['chk'])){
    $chk = $_POST['chk'];
    $cat = $_POST['cat'];
    $i = $j = $k = 0;
    foreach ($chk as $c){
        foreach ($cat as $val){
            $qur_chk = "select * from cpn_category where coupon_id = '$c' and sub_cat_id in (select sub_cat_id from sub_cat where cat_id = '$val') ";
            $res_ck = mysqli_query($connection,$qur_chk);
            $cnt = mysqli_num_rows($res_ck);
            if ($cnt > 0){
                $i++;
                $info = $i." Coupon/offer is Already added to subcategory";
            }
            else{
                $qur_chk1 = "select sub_cat_id from sub_cat where cat_id = '$val'";
                $res_ck1 = mysqli_query($connection,$qur_chk1);

                while ($subcat = mysqli_fetch_array($res_ck1)) {
                    $val2 = $subcat['sub_cat_id'];
                    $query = "insert into cpn_category (sub_cat_id, coupon_id) VALUES ('$val2','$c')";
                    $result = mysqli_query($connection, $query);

                    if ($result) {
                        $j++;
                        $msg1 = $j . " Coupon is successfully Added to the sub cateogry.";

                    } else {
                        $k++;
                        $errorMessage = $k . " Coupon is not Added to the sub cateogry";
                    }
                }
            }
        }

    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Choice Based Elective Management - Add and Manage Courses</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .btn-file {
            position: relative;
            overflow: hidden;
        }
        .btn-file input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            min-width: 100%;
            min-height: 100%;
            font-size: 100px;
            text-align: right;
            filter: alpha(opacity=0);
            opacity: 0;
            outline: none;
            background: white;
            cursor: inherit;
            display: block;
        }
        .file {
            visibility: hidden;
            position: absolute;
        }
    </style>
    <script>
        $(document).on('click', '.browse', function(){
            var file = $(this).parent().parent().parent().find('.file');
            file.trigger('click');
        });
        $(document).on('change', '.file', function(){
            $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
        });
        $(document).ready(function() {
            $('#myTable').DataTable();
        } ); //
    </script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        } );
    </script>
</head>
<body>

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="">DealRajaDeal</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li ><a href=""><span class="glyphicon glyphicon-home"></span> Home</a></li>
                <li><a href="../"><span class="glyphicon glyphicon-edit"></span> Goto Web</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-gift"></span>
                        Goto
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="add_cat.php"><span class="glyphicon glyphicon-new-window"></span> Add Category</a></li>
                        <li><a href="add_store.php"><span class="glyphicon glyphicon-star"></span> Add Store</a></li>
                        <li><a href="report.php"><span class="glyphicon glyphicon-flag"></span> Report</a></li>
                    </ul>
                </li>
                
            </ul>

        </div>
    </div>
</nav>
<div class="container"><br><br><br>
<div class="col-md-8 col-md-offset-2">
    <?php if(isset($msg1)){if($msg1 != ""){?><div class="alert alert-success" role="alert">
        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>  <?php echo $msg1; ?> </div><?php }} ?>

    <?php if(isset($errorMessage)){if($errorMessage != ""){?><div class="alert alert-danger" role="alert">
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><?php echo $errorMessage; ?></div><?php }} ?>

    <?php if(isset($info)){if($info != ""){?><div class="alert alert-info" role="alert">
        <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><?php echo $info; ?></div><?php }} ?>
</div>
<form method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1 class="page-header text-center">Upload Coupons/Offers Details</h1>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-8"><br>
            <select type="list" name="store" class ="form-control" required autofocus>
                <option value="">Select Store</option>
                <?php
                require("../connectivity/connect.php");
                $query = "Select * from store";
                $res = mysqli_query($connection,$query);
                foreach($res as $course){
                    ?>
                    <option value="<?php echo $course["store_id"];?>"><?php echo $course["store_name"]; ?></option>
                    <?php
                }
                ?>
            </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-8"><br>
                <input type="file" name="file" class="file" required/>
                <div class="input-group col-xs-12">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-file"></i></span>
                    <input type="text" class="form-control input-lg" disabled placeholder="Upload Document">
                    <span class="input-group-btn">
                <button class="browse btn btn-primary input-lg" type="button"><i class="glyphicon glyphicon-search"></i> Browse</button>
              </span>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-2 col-sm-offset-5"><br>
                <div align="center"><button class="btn btn-primary btn-block" name="submit" type="submit" value="submit" >Upload</button></div>
            </div>
        </div>
    </div>
</form>

<br>

<br>
<div class="col-md-10 col-md-offset-1">
    <h2 class="page-header text-center">Added Coupons/Offers</h2>
</div>
    <div class="row">
    <form method="post" name="filter">
	 <br>


        <div class="form-group">
            <div class=" col-sm-6 col-lg-offset-3">
                <label for="sel1">Select the Store:</label><br>
                <select type="list" name="store" class ="form-control" required autofocus>
                    <option value="">Select Store</option>
                    <?php
                    $query = "Select * from store";
                    $res = mysqli_query($connection,$query);
                    foreach($res as $course){
                        ?>
                        <option value="<?php echo $course["store_id"];?>"><?php echo $course["store_name"]; ?></option>
                        <?php
                    }
                    ?>
                </select><br>
            </div>
        </div>
        <script>
            $(document).ready(function(){
                $('.action').change(function(){
                    if($(this).val() != '')
                    {
                        var action = $(this).attr("id");
                        var query = $(this).val();
                        var result = '';
                        if(action == "category2")
                        {
                            result = 'sub2';
                        }
                        $.ajax({
                            url:"fetch.php",
                            method:"POST",
                            data:{action:action, query:query},
                            success:function(data){
                                $('#'+result).html(data);
                            }
                        })
                    }
                });
            });
        </script>
        <div class="form-group" >
            <div class="col-md-2 col-lg-offset-4" >
                <button name="delBtn" class="btn btn-primary btn-block" type="submit">Filter</button>
            </div>
            <div class="col-md-2" >
                <button name="del" class="btn btn-danger btn-block" type="submit">Delete All</button>
            </div>
        </div>
    </form>
</div><?php
if (isset($_POST['store'])){
    $store_id = $_POST['store'];
    ?>
    <div class="container" >
        <form name="add_name" method="post">
            <div id="table" class="table-responsive">
                <table id="myTable" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <td></td>
                        <td>Title</td>
                        <td>Store Name</td>
                        <td>Offer Rate</td>
                        <td>Coupon</td>
                        <td>Offer Link</td>
                        <td>Description</td>
                        <td>Date</td>
                        <td>Uses</td>
                    </tr>
                    </thead>
                    <?php
                    $query ="select * from cpn_offr as co, store as s where s.store_id = co.store_id and co.store_id = '$store_id'";
                    $result = mysqli_query($connection, $query);

                    while($row = mysqli_fetch_array($result))
                    {
                        echo '  
                           <tr>  
                                <td align="center"><input type="checkbox" name="chk[]" value="'.$row["coupon_id"].'" /></td>
                                <td>'.$row["title"].'</td>  
                                <td>'.$row["store_name"].'</td>  
                                <td>'.$row["off_rate"].$row["tags"].'</td>  
                                <td>'.$row["coupon"].'</td>  
                                <td >'.$row["cpn_offr_link"].'</td> 
                                <td >'.$row["description"].'</td>  
                                <td >'.$row["date"].'</td> 
                                <td >'.$row["uses"].'</td>
                           </tr>  
                           ';
                    }

                    ?>
                </table>
            </div> <br/>

            <div class="form-group" >
                <div class="col-md-2" >
                    <button name="delBtn1" value="del"  class="btn btn-danger btn-block" type="submit">Delete</button>
                </div>
            </div>
        <div class="form-group">
            <div class=" col-sm-5">
                <label for="sel1">Select the Sub-Category:</label><br>
                <select type="list" name="subcat[]" multiple style="height: 150px;font-size: 16px" class ="form-control" >
                    <option value="">Select Sub-Category</option>
                    <?php
                    $query = "Select * from sub_cat";
                    $res = mysqli_query($connection,$query);
                    foreach($res as $course){
                        ?>
                        <option value="<?php echo $course["sub_cat_id"];?>"><?php echo $course["sub_cat_name"]; ?></option>
                        <?php
                    }
                    ?>
                </select><br>
            </div>
        </div>
            <div class="form-group">
                <div class=" col-sm-5">
                    <label for="sel1">Select the Category:</label><br>
                    <select type="list" name="cat[]" multiple style="height: 150px;font-size: 16px" class ="form-control" >
                        <option value="">Select Category</option>
                        <?php
                        $query = "Select * from category";
                        $res = mysqli_query($connection,$query);
                        foreach($res as $course){
                            ?>
                            <option value="<?php echo $course["cat_id"];?>"><?php echo $course["main_cat"]; ?></option>
                            <?php
                        }
                        ?>
                    </select><br>
                </div>
            </div>
            <div class="form-group" >
                <div class="col-md-2 col-lg-offset-4" ><br><br><br>
                    <button name="add" value="add" class="btn btn-primary btn-block" type="submit">Add</button>
                </div>
            </div>
        </form>

    </div><br><?php
}
?>
</div>
<br><br><br><br>
<div class="col-md-12"><br><br><br><br>
<footer class="footer text-center">
    <p>KONGU ENGINEERING COLLEGE, PERUNDURAI.</p>
</footer>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
</body>
</html>