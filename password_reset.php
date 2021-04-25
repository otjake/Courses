<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<div>
    <?php

    if(isset($_GET['pres'])){
        if($_GET['pres']==1){
            echo "<h1 style='color: green'><strong>Successful Reset <a href='login.php'>Kindly login</a></strong></h1>";
        }
        else if($_GET['pres']=='2'){
            echo "<h1 style='color: red'><strong>Try again,Hope the email is registered with us.</strong></h1>";
        }
    }
    ?>

    <hr>
    <h1>Reset Password</h1>
    <form action="controls.php" method="post">
        <label>Email</label>
        <input type="email" name="email" placeholder="Enter your registered email">
        <br>
        <label>Enter new password</label>
        <input type="text" name="password" placeholder="Enter Password">
        <br>
        <hr>
        <input name="passReset" value="Reset Password" type="submit">
        <br>
    </form>
    <br>
</div>
</body>
</html>