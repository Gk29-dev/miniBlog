<?php 
//make Title Dynamic
include 'config.php';
$pagename = basename($_SERVER['PHP_SELF']);

switch($pagename){
    case "single.php":
        if(isset($_GET['p_id'])){
          $post_id = $_GET['p_id'];

          $sql = "SELECT * FROM post WHERE post_id = $post_id";
          $result = mysqli_query($conn, $sql);
          if(mysqli_num_rows($result)>0){
              $row = mysqli_fetch_assoc($result);
              $page_title = $row['title'];
          }
        }else{
             $page_title = "No Post Found";
        }
        break;

        case "category.php":
            if(isset($_GET['c_id'])){
                $cate_id = $_GET['c_id'];
      
                $sql = "SELECT * FROM category WHERE category_id = $cate_id";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result)>0){
                    $row = mysqli_fetch_assoc($result);
                    $page_title = $row['category_name'] . " News ";
                }
              }else{
                   $page_title = "No Post Found";
              }
            break;

        case "author.php":
            if(isset($_GET['a_id'])){
                $user_id = $_GET['a_id'];
      
                $sql = "SELECT * FROM user WHERE user_id = $user_id";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result)>0){
                    $row = mysqli_fetch_assoc($result);
                    $page_title = "News By ".$row['first_name'] ." ". $row['last_name'];
                }
              }else{
                   $page_title = "No Post Found";
              }
             break;

        case "search.php":
            if(isset($_GET['search'])){
                $page_title = $_GET['search'];
              }else{
                   $page_title = "No Search Result Found";
              }
            break;

        default:
        $page_title ="News Site";
        break;    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $page_title; ?></title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<!-- HEADER -->
<div id="header">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- LOGO -->
            <div class=" col-md-offset-4 col-md-4">
            <?php 
                include 'config.php';

                $sql1 = "SELECT * FROM settings";
                $result1 = mysqli_query($conn, $sql1);
                if(mysqli_num_rows($result1)>0){
                    while($row1 = mysqli_fetch_assoc($result1)){ 
            ?>
                <a href="index.php" id="logo"><img src="admin/images/<?php echo $row1['website_logo']; ?>" height="80px" width="303px"></a>
            <?php 
              }
            } 
            ?>    
            </div>
            <!-- /LOGO -->
        </div>
    </div>
</div>
<!-- /HEADER -->
<!-- Menu Bar -->
<div id="menu-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <?php 
            include 'config.php';

            $cat_id = "";
            if(isset($_GET['c_id'])){
                $cat_id = $_GET['c_id'];
            }
            $sql = "SELECT * FROM category WHERE post > 0";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0){
             ?>   
                 <ul class="menu">
                <li><a href="<?php echo $hostname; ?>">Home</a></li>
            <?php    
                while($row = mysqli_fetch_assoc($result)){
                    if($row['category_id'] == $cat_id){
                        $act = "active";
                    }
                    else{
                        $act = "";
                    }
            ?>
                  <li><a class="<?php echo $act; ?>" href='category.php?c_id=<?php echo $row['category_id']; ?>'><?php echo $row['category_name']; ?></a></li>
            <?php
                }
               echo  '</ul>';
            }
            ?>
                
            </div>
        </div>
    </div>
</div>
<!-- /Menu Bar -->
