<?php 
include 'config.php';

$post_id = $_POST['post_id'];
$old_cate = $_POST['cat_id'];
$title = $_POST['post_title'];
$desc = $_POST['postdesc'];
$new_cate = $_POST['category'];


if(empty($_FILES['new-image']['name'])){
 $filename = $_POST['old-image'];
}
else
{
  //Upload Image Code Here
if(isset($_FILES['new-image']['name'])){
    $filename = $_FILES['new-image']['name'];
    $file_size = $_FILES['new-image']['size'];
    $file_tmp = $_FILES['new-image']['tmp_name'];
    $img_type = $_FILES['new-image']['type'];
    $file_ext = strtolower(pathinfo($filename,PATHINFO_EXTENSION));
   
    $valid_ext = array("jpeg","jpg","png");

    if(in_array($file_ext, $valid_ext) == false ){
        echo "<p>This File Format is Not Allowed, Please Choose a JPG or PNG FILE FORMAT</p>";
    }

    if($file_size > 2097152){
        echo "<p> File Size is Less Than or Equal to 2MB</p>";
    }
    move_uploaded_file($file_tmp,"upload/".$filename);
     }   
    }
    
        
        $sql = "UPDATE post SET title='$title', description='$desc',category=$new_cate, post_img='$filename' WHERE post_id = $post_id";
        if($new_cate == $old_cate){
        }
        else{
            $sql.= "UPDATE category SET post = post-1 WHERE category_id = $old_cate;";
            $sql.= "UPDATE category SET post = post+1  WHERE category_id = $new_cate";
            
            if(mysqli_multi_query($conn, $sql)){
                header("Location: {$hostname}/admin/post.php");
            }
            else{
                echo "Category Query Failed";
            }
        }

       
       

?>