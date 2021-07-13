<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Setting</title>
            <!-- Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="../css/font-awesome.css">
        <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div id="admin-content">
  <div class="container">
  <div class="row">
    <div class="col-md-12">
        <h1 class="admin-heading">Website Settings</h1>
    </div>
    <div class="col-md-offset-3 col-md-6">
        <!-- Form for show edit-->

        <?php 
        include 'config.php';

        $sql = "SELECT * FROM settings";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){ 
        ?>

        <form action="save-settings.php" method="POST" enctype="multipart/form-data" autocomplete="off">
    
            <div class="form-group">
                <label for="exampleInputTile">Website Name</label>
                <input type="text" name="website_name"  class="form-control" id="exampleInputUsername" value="<?php echo $row['website_name']; ?>">
            </div>

            <div class="form-group">
                <label for="">Website Logo</label>
                <input type="file" name="new-logo">
                <img  src="images/<?php echo $row['website_logo']; ?>" height="80px" width="303px">
                <input type="hidden" name = "old_logo" value = "<?php echo $row['website_logo']; ?>">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Footer Description</label>
                <textarea name="footer" class="form-control"  required rows="5"><?php echo $row['footer']; ?>
                </textarea>
            </div>

          
            <input type="submit" name="submit" class="btn btn-primary" value="Update" />
        </form>
        <!-- Form End -->

        <?php 
            }
          }
        ?>
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>    
</body>
</html>