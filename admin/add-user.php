<?php include "header.php"; 
 include 'config.php';
//fetch the maximum value of user ID 
$maxid = "SELECT MAX(user_id) AS id FROM user";
$result2 = mysqli_query($conn, $maxid);
if(mysqli_num_rows($result2)>0){
    $row = mysqli_fetch_assoc($result2);
    $u_id = ++$row['id'];
}
if(isset($_POST['save'])){
   
    $user_id = mysqli_real_escape_string($conn, $u_id);
    $fname = mysqli_real_escape_string($conn,$_POST['fname']);
    $lname = mysqli_real_escape_string($conn,$_POST['lname']);
    $username = mysqli_real_escape_string($conn,$_POST['user']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));
    $role = mysqli_real_escape_string($conn,$_POST['role']);


    

    //check that username already Exist or not
    $sql = "SELECT username FROM user WHERE username = '{$username}'";
    $result = mysqli_query($conn, $sql) or die("Query Failed");

    if(mysqli_num_rows($result)>0){
      echo "<p style = 'color:red; text-align:center; margin:10px 0px;'> Username Already Exist</p>";
    }
    else{
      $sql1 = "INSERT INTO user(user_id, first_name, last_name, username, password, role) VALUES($user_id, '$fname', '$lname', '$username', '$password', $role)";
      if(mysqli_query($conn, $sql1))
       header("Location: {$hostname}/admin/users.php");
    }
}
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Add User</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form Start -->
                  <form  action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST" autocomplete="OFF">
                      <div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="fname" class="form-control" placeholder="First Name" required>
                      </div>
                          <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
                      </div>
                      <div class="form-group">
                          <label>User Name</label>
                          <input type="text" name="user" class="form-control" placeholder="Username" required>
                      </div>

                      <div class="form-group">
                          <label>Password</label>
                          <input type="password" name="password" class="form-control" placeholder="Password" required>
                      </div>
                      <div class="form-group">
                          <label>User Role</label>
                          <select class="form-control" name="role" >
                              <option value="0">Normal User</option>
                              <option value="1">Admin</option>
                          </select>
                      </div>
                      <input type="submit"  name="save" class="btn btn-primary" value="Save" required />
                  </form>
                   <!-- Form End-->
               </div>
           </div>
       </div>
   </div>
<?php include "footer.php"; ?>
