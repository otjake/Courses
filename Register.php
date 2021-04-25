<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
if(isset($_GET['res'])){
    $response=$_GET['res'];
    if($response==1){
        echo "<strong style='color: green;margin-bottom: 20px'>Registration Successful,Kindly <a href='login.php'>Login</a></strong>";
    }else if($response==2){
        echo "<strong style='color: red;margin-bottom: 20px'>Error occured,try again</strong>";
    }else if($response==3){
        echo "<strong style='color: red;margin-bottom: 20px'>This email already exists.</strong>";
    }
}
?>
<form action="controls.php" method="post">
    <label>Name:</label>
    <input name="name" placeholder="Enter your name" type="text">
    <br>
    <hr>
    <label>email:</label>
    <input name="email" placeholder="Enter your email" type="text">
    <br>
    <hr>
    <label>password:</label>
    <input name="password" placeholder="Enter your password" type="text">
    <br>
    <hr>
    <input name="register" value="Register" type="submit">
    <br>
    <hr>
</form>
<a href="login.php">Have an account? Login</a>
</body>
</html>