<?php 
include 'config.php';
session_start();

//fetch the highest post ID number
$maxid = "SELECT MAX(post_id) AS id FROM post";
$result2 = mysqli_query($conn, $maxid);
if(mysqli_num_rows($result2)>0){
    $row = mysqli_fetch_assoc($result2);
    $post_id = ++$row['id'];
}

$title = mysqli_real_escape_string($conn,$_POST['post_title']);
$des = mysqli_real_escape_string($conn,$_POST['postdesc']);
$cate = mysqli_real_escape_string($conn, $_POST['category']);
$date = date("d M, Y");
$author = $_SESSION['user_id'];



//Upload Image Code Here
if(isset($_FILES['fileToUpload'])){
    $filename = $_FILES['fileToUpload']['name'];
    $file_size = $_FILES['fileToUpload']['size'];
    $file_tmp = $_FILES['fileToUpload']['tmp_name'];
    $img_type = $_FILES['fileToUpload']['type'];
    $file_ext = strtolower(end(explode('.',$filename)));

    $valid_ext = array("jpeg","jpg","png");

    if(in_array($file_ext, $valid_ext) == false ){
        echo "<p>This File Format is Not Allowed, Please Choose a JPG or PNG FILE FORMAT</p>";
    }

    if($file_size > 2097152){
        echo "<p> File Size is Less Than or Equal to 2MB</p>";
    }

    if(move_uploaded_file($file_tmp,"upload/".$filename)){
        
        $sql = "INSERT INTO post(post_id, title, description, category, post_date, author, post_img)
                VALUES($post_id, '$title', '$des', $cate, '$date', $author, '$filename')";
        
        if(mysqli_query($conn, $sql)){

            $sql1 = "UPDATE category SET post = post + 1 WHERE category_id = $cate";
            if(mysqli_query($conn, $sql1)){
                header("Location: {$hostname}/admin/post.php");
            }
            
        }
        else{
            echo "<div class ='alert alert-danger'>Post Not Upload</div>";
        }
    }

}


?>