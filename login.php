<?php
ob_start();
?>
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
if($response==2){
    echo "<strong style='color: red;margin-bottom: 20px'>Invalid details,try again</strong>";
}
}
?>
<form action="controls.php" method="post">
    <label>email:</label>
    <input name="email" placeholder="Enter your email" type="text">
    <br>
    <hr>
    <label>password:</label>
    <input name="password" placeholder="Enter your password" type="text">
    <br>
    <hr>
    <input name="login" value="Login" type="submit">
    <br>
    <hr>

</form>
<a href="register.php">No account? Register here</a>
</body>
</html>