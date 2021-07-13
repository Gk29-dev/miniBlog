<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
   <label for="">Name</label>
   <input type="text" name = "name"><br><br>

   <label for="">Age</label>
   <input type="text" name = "age"><br><br>

   <label for="">Email</label>
   <input type="text" name = "email"><br><br>

   <label for="">Website</label>
   <input type="text" name = "web"><br><br>

   <input type="submit" name = "submit" value="Save">

  </form>
   <?php 

   if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $web = $_POST['web'];

    if(filter_var($age, FILTER_VALIDATE_INT)){
        echo "age is Correct";
    }
    else{
        echo "wrong Data Type";
    }
   }
    
   ?> 
 
</body>
</html>