<?php
include("../connectivity/connect.php");
if (isset($_POST["submit"])){
    $cat = $_POST["cat"];
    $query1 = "select * from category where main_cat = '$cat'";
    $res2 = mysqli_query($connection,$query1);
    $count = mysqli_num_rows($res2);
    if ($count==0){
        $query = "insert into category ( `main_cat`) VALUES ('$cat')";
        $result = mysqli_query($connection,$query);
        if ($result){
            $msg1 = $cat." Category is successfully Added";
        }else{
            $errorMessage = "Category is not Added";
        }
    }else{
        $errorMessage = "Category is already added";
    }
}

if (isset($_POST["chk"])){
    $del = $_POST['chk'];
    foreach ($del as $val){

        $query1 = "delete from category where cat_id = '$val'";
        $res2 = mysqli_query($connection,$query1);

    }
    if ($res2){
        $msg1 = "Deleted Succesfylly";
    }else{
        $errorMessage = "Cannot Delete";
    }
}
if (isset($_POST["chk2"])){
    $del = $_POST['chk2'];
    foreach ($del as $val){

        $query1 = "delete from sub_cat where sub_cat_id = '$val'";
        $res2 = mysqli_query($connection,$query1);

    }
    if ($res2){
        $msg1 = "Deleted Succesfylly";
    }else{
        $errorMessage = "Cannot Delete";
    }
}
if(isset($_POST["ups"]))
{
    $cat_id = $_POST['cat1'];

    if($_FILES['file']['name'])
    {
        $filename=explode('.',$_FILES['file']['name']);
        if($filename[1]=='csv')
        {
            $i = 0;
            $j = 0;
            $k = 0;
            $handle=fopen($_FILES['file']['tmp_name'],"r");
            while($data=fgetcsv($handle))
            {
                $sub_cat = mysqli_real_escape_string($connection,$data[0]);

                if($sub_cat!=""){

                    $qur_chk = "select * from sub_cat where sub_cat_name = '$sub_cat' and cat_id = '$cat_id'";
                    $res_ck = mysqli_query($connection,$qur_chk);
                    $cnt = mysqli_num_rows($res_ck);
                    if ($cnt > 0){
                        $k++;
                        $errorMessage = $k." Sub Categories are Already Added";
                    }
                    else{
                        $query = "insert into sub_cat (cat_id,sub_cat_name) VALUES ('$cat_id','$sub_cat')";
                        $result = mysqli_query($connection,$query);
                        if ($result){
                            $j++;
                            $msg1 = $j." Sub Categories are successfully Added";
                        }else{
                            $i++;
                            $errorMessage = $i." Sub Categories are not Added";
                        }
                    }
                }else{
                    $errorMessage = "Fill all the values in the .csv file";
                }
            }
            fclose($handle);
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
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />

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
                        <a class="dropdown-item" href="add_store.php">Add Store</a>
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

        </div>
    </div>
    <div class="row justify-content-md-center">
        <div class="col-lg-4 "><br><h3 class="page-header" align="center">Add New Category</h3>
            <hr>
            <form method="post" >

                <div class="form-group">
                    <input type="text" class="form-control" name="cat"  placeholder="Main Category Name" required autofocus>
                </div>
                <div class="form-group" align="center">
                    <button class="btn btn-success" name="submit" type="submit">Add Category</button>
                </div>

            </form>
        </div>
        <div class="col-lg-6">
            <form action="" method="post">
            <h3 class="page-header" align="center"><?php
                $query ="select * from category";
                $result = mysqli_query($connection, $query);
                $cng = mysqli_num_rows($result); echo $cng." "; ?>Categories</h3><br>
            <div style="position:relative; height: 200px">
                <div style="overflow-y: scroll;position: absolute;  top: 0; right:0; bottom: 0; left: 0;" >
            <table id="myTable" class="table table-sm  table-hover table-bordered table-light table-responsive-sm">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category Name</th>
                </tr>
                </thead>
                <tbody >
                <?php
                $query ="select * from category";
                $result = mysqli_query($connection, $query);

                while($row = mysqli_fetch_array($result))
                {
                    echo '  
					   <tr>  
                            <td align="center"><input type="checkbox" name="chk[]" value="'.$row["cat_id"].'" /></td>
							<td>'.$row["main_cat"].'</td>  
					   </tr>  
					   ';
                }

                ?>
                </tbody>
            </table></div>
        </div><br>
            <button name="delete" type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div><br>

    <br><br><hr><br><br>
    <div class="row justify-content-md-center">
        <div class="col-lg-4 "><br><h3 class="page-header" align="center">Add New Sub Category</h3>
            <hr>
            <form method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <select class="form-control" id="category" name="cat1">
                        <option value="">Choose Category</option><?php
                        $query = "select * from category";
                        $res = mysqli_query($connection,$query);
                        while($row = mysqli_fetch_array($res)){
                            echo"<option value='".$row['cat_id']."'>".$row['main_cat']."</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <input  type="file" name="file" class="form-control" required/>
                </div>
                <div class="form-group" align="center">
                    <button class="btn btn-success" name="ups" value="sub" type="submit">Add Sub Category</button>
                </div>

            </form>
        </div>
        <div class="col-lg-6">
            <h3 class="page-header" align="center"><?php
                $query ="select * from sub_cat";
                $result = mysqli_query($connection, $query);
                $cng = mysqli_num_rows($result); echo $cng." "; ?>Sub - Categories</h3><br>
            <form method="post">
            <div style="position:relative; height: 200px">
                <div style="overflow-y: scroll;position: absolute;  top: 0; right:0; bottom: 0; left: 0;" >
                    <table id="myTable" class="table table-sm  table-hover table-bordered table-light table-responsive-sm">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Sub-Category Name</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $query ="select * from sub_cat as sc, category as c where c.cat_id = sc.cat_id";
                        $result = mysqli_query($connection, $query);

                        while($row = mysqli_fetch_array($result))
                        {
                            echo '  
					   <tr>  
                            <td align="center"><input type="checkbox" name="chk2[]" value="'.$row["sub_cat_id"].'" /></td>
							<td>'.$row["main_cat"].'</td>  
							<td>'.$row["sub_cat_name"].'</td>  
					   </tr>  
					   ';
                        }

                        ?>
                        </tbody>
                    </table>
                </div></div><br>
            <button name="delete" type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>

</div>
<br>
<footer class="text-muted">
    <div class="container">
        <p class="float-right">
            <a href="#">Back to top</a>
        </p>
        <p>&copy Department of MCA</p>
    </div>
    <br>
</footer>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
</body>
</html>
