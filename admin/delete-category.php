<?php 
include 'config.php';
$c_id = $_GET['c_id'];

$sql = "DELETE FROM category WHERE category_id = $c_id";
if(mysqli_query($conn, $sql)){
    header("Location: {$hostname}/admin/category.php");
}
else{
    echo "<p style = 'color:red' margin: 10px 0px;'>Category Can't be Deleted.</p>";
}
mysqli_close($conn);

?>