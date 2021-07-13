<?php 
include "header.php";
include 'config.php';

$c_id = $_GET['c_id'];

$sql = "SELECT * FROM category WHERE category_id = $c_id";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0){
    $row = mysqli_fetch_assoc($result);
    $category_id = $row['category_id'];
    $category_name = $row['category_name'];
}
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="adin-heading"> Update Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <form action="" method ="POST">
                      <div class="form-group">
                          <input type="hidden" name="cat_id"  class="form-control" value="<?php echo $category_id; ?>" placeholder="">
                      </div>
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="cat_name" class="form-control" value="<?php echo $category_name; ?>"  placeholder="" required>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                  </form>

                  <?php 
                  if(isset($_POST['submit'])){
                      $cat_id = $_POST['cat_id'];
                      $cat_name = $_POST['cat_name'];

                     echo  $sql1 = "UPDATE category SET category_name = '$cat_name' WHERE category_id = $cat_id";
                      if(mysqli_query($conn, $sql1)){
                        header("Location: {$hostname}/admin/category.php");
                      }
                      else{
                        echo "<p style ='color:red; text-align:center;'>Category Not Updated</p>";
                      }
                  }
                  
                  ?>
                </div>
              </div>
            </div>
          </div>
<?php include "footer.php"; ?>
