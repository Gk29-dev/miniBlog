<?php 
include 'config.php';
$userid = $_GET['id'];

$sql = "DELETE FROM user WHERE user_id = $userid";
if(mysqli_query($conn, $sql)){
    header("Location: {$hostname}/admin/users.php");
}
else{
    echo "<p style = 'color:red' margin: 10px 0px;'>User's Record Can't be Deleted.</p>";
}
mysqli_close($conn);

?>