<?php 
include "header.php";
include 'config.php';

//fetch the maximum value of category ID 
$maxid = "SELECT MAX(category_id) AS id FROM category";
$result2 = mysqli_query($conn, $maxid);
if(mysqli_num_rows($result2)>0){
    $row = mysqli_fetch_assoc($result2);
    $c_id = ++$row['id'];
}
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Add New Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form Start -->
                  <form action="" method="POST" autocomplete="off">
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="cat" class="form-control" placeholder="Category Name" required>
                      </div>
                      <input type="submit" name="save" class="btn btn-primary" value="Save" required />
                  </form>
                  <!-- /Form End -->

                  <?php 
                  

                   if(isset($_POST['save'])){
                    $categoryname = $_POST['cat'];

                    $sql = "INSERT INTO category(category_id, category_name) VALUES($c_id,'$categoryname')";
                    if(mysqli_query($conn, $sql)){
                        header("Location: {$hostname}/admin/category.php");
                    }
                   }
                  ?>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
