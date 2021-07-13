<?php 
include 'config.php';

$website_name = $_POST['website_name'];
$footer = $_POST['footer'];

if(empty($_FILES['new-logo']['name'])){
 $filename = $_POST['old_logo'];
}
else
{
  //Upload Image Code Here
if(isset($_FILES['new-logo']['name'])){
    $filename = $_FILES['new-logo']['name'];
    $file_size = $_FILES['new-logo']['size'];
    $file_tmp = $_FILES['new-logo']['tmp_name'];
    $img_type = $_FILES['new-logo']['type'];
    $file_ext = strtolower(end(explode('.',$filename)));

    $valid_ext = array("jpeg","jpg","png");

    if(in_array($file_ext, $valid_ext) == false ){
        echo "<p>This File Format is Not Allowed, Please Choose a JPG or PNG FILE FORMAT</p>";
    }

    if($file_size > 2097152){
        echo "<p> File Size is Less Than or Equal to 2MB</p>";
    }
    move_uploaded_file($file_tmp,"images/".$filename);
     }   
    }
    
        
        $sql = "UPDATE settings SET website_name = '$website_name', website_logo = '$filename', footer = '$footer'";
       
    
            if(mysqli_multi_query($conn, $sql)){
                header("Location: {$hostname}/admin/setting.php");
            }
            else{
                echo "Query Failed";
            }

       
       

?>