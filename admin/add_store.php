<?php
include("../connectivity/connect.php");
if (isset($_POST["submit"])){
        $name = $_POST["name"];
        $s_logo = $_POST["s_logo"];
        $query1 = "select * from store where store_name = '$name'";
        $res2 = mysqli_query($connection,$query1);
        $count = mysqli_num_rows($res2);
        if ($count==0){
            $query = "insert into store ( `store_name`, `store_logo`) VALUES ('$name','$s_logo')";
            $result = mysqli_query($connection,$query);
            if ($result){
                $msg1 = $name." Store is successfully Added";
            }else{
                $errorMessage = "Store is not Added";
            }
        }else{
            $errorMessage = "Store is already added";
        }
    }

if (isset($_POST["chk"])){
    $del = $_POST['chk'];
    foreach ($del as $val){

        $query1 = "delete from store where store_id = '$val'";
        $res2 = mysqli_query($connection,$query1);

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

    <title>Coupon or Offer - DealrajaDeal</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

</head>
<body >

<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="../">DealRajaDeal</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Goto
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="add_offr.php">Add Offer</a>
                        <a class="dropdown-item" href="add_cat.php">Add category</a>
                        <a class="dropdown-item" href="report.php">Report</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link " href="../" >Go to Web</a>
                </li>
            </ul>
        </form>
    </div>
</nav>
<br/>
<div class="jumbotron" >

    <div class="row justify-content-md-center">
        <div class="col-md-8">
            <?php if(isset($msg1)){if($msg1 != ""){?><div class="alert alert-success" role="alert">
                <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>  <?php echo $msg1; ?> </div><?php }} ?>

            <?php if(isset($errorMessage)){if($errorMessage != ""){?><div class="alert alert-danger" role="alert">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><?php echo $errorMessage; ?></div><?php }} ?>

            <?php if(isset($info)){if($info != ""){?><div class="alert alert-info" role="alert">
                <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><?php echo $info; ?></div><?php }} ?>
            <h1 class="page-header" align="center">Add New Store</h1>
            <hr>
            <br><br>
        </div>
    </div>
    <div class="row justify-content-md-center">
        <div class="col-lg-6 ">
            <form method="post" >

                <div class="form-group">
                    <label for="exampleFormControlInput1">Store Name</label>
                    <input type="text" class="form-control" name="name"  placeholder="Title">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Store Logo</label>
                    <input type="text" class="form-control" name="s_logo" placeholder="Link"/>
                </div>

                <div class="form-group" align="center">
                    <button class="btn btn-success" name="submit" type="submit">Add store</button>
                </div>

            </form>
        </div>
    </div>
</div>
<div class="container"><h1 align="center">Stores</h1>
    <form method="post">
        <div class="row justify-content-center">
            <br><?php
            $query = "select * from store";
            $res = mysqli_query($connection,$query);
            while($row = mysqli_fetch_array($res)){
                ?>
                <div class="col-sm-2"><br>
                <div class="card" >
                    <img class="card-img-top" height="65" src="<?php echo $row['store_logo'];?>">
                    <div class="card-body" align="center">

                        <div class="form-check">
                            <label class="form-check-label">
                                <input value="<?php echo $row['store_id'];?>" name="chk[]" type="checkbox" class="form-check-input">
                                <?php echo $row['store_name'];?>
                            </label>
                        </div>
                    </div>
                </div>
                </div><?php
            }?>
        </div>

        <div class="row justify-content-center">
            <div class="col-sm-2"><br>
                <div class="form-group" align="center">
                    <button class="btn btn-danger" name="check" type="submit">Delete</button>
                </div>
            </div>
        </div>
    </form>
</div>
<br>
<footer class="text-muted">
    <div class="container">
        <p class="float-right">
            <a href="#">Back to top</a>
        </p>
        <p>&copy; Department of MCA</p>
    </div>
    <br>
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
