<?php
ob_start();
session_start();
include "db.php";

#############################REGISTER USER########################
if (isset($_POST["register"])) {

    $error = [];

    //check if any input field is empty
    if (empty($_POST['name'])) {
        array_push($error, "Name can't be empty");
    }
    $name = $_POST['name'];

    if (empty($_POST['email'])) {
        array_push($error, "Email can't be empty");
    }
    $email = $_POST['email'];
    if (empty($_POST['password'])) {
        array_push($error, "How do you login without a password for Christ sake");
    }
    $password = $_POST['password'];


    //check if errors exist
    if (count($error) === 0) {

        //check if email exists
        $checkEmail="SELECT email FROM users WHERE email='$email'";
        $run_checkEmail=mysqli_query($conn,$checkEmail);
        $row=mysqli_fetch_assoc($run_checkEmail);
        $rowCount=count($row);
        if(count($row)>0){
            header('Location:Register.php?res=3');
            exit();
        }
        else{

                //if it dosent go ahead with registration
                     $RegisterQuery="INSERT into users (name,email,password) 
                                    VALUES ('$name','$email','$password')";
                     $run_RegisterQuery=mysqli_query($conn,$RegisterQuery);
                     if($run_RegisterQuery){
                //         echo "Registration successfull <a href='login.php'>Login</a>";
                         header('Location:Register.php?res=1');
                     }
                     else{
                         header('Location:Register.php?res=2');

                     }

        }
//    header("Location:register.php?marker=2");
    } else {

        foreach ($error as $err) {
            echo "<p> $err </p>";
        }
        echo
        "Go back and try again  <br>
           <a href='register.php'>Register</a>";
    }


}



##################LOGIN#################

if (isset($_POST["login"])) {

    $error = [];
    if (empty($_POST['email'])) {
        array_push($error, "Email can't be empty");
    }
    $email = $_POST['email'];
    if (empty($_POST['password'])) {
        array_push($error, "How do you login without a password for Christ sake");
    }
    $password = $_POST['password'];

    if (count($error) === 0) {

        $loginQuery="SELECT * FROM users WHERE email='$email' AND password='$password'";
        $result=mysqli_query($conn,$loginQuery);
        if ($result->num_rows > 0) {
            $found_user = mysqli_fetch_array($result);
            $_SESSION['user_id'] = $found_user['user_id'];
            $_SESSION['name'] = $found_user['name'];
            $_SESSION['email'] = $found_user['email'];

            header('Location:index.php');

        }
        else{
            header('Location:login.php?res=2');
        }

    } else {
        foreach ($error as $err) {
            echo "<p> $err </p>";
        }
        echo
        "Correct errors above  <br>
           <a href='login.php'>Login again</a>";
    }

}

###### UPDATE PASSWORD WHEN LOGGED IN ##############################################

if (isset($_POST['update'])) {
    $error = [];

    if (empty($_POST['password'])) {
        array_push($error, "Input a password");
    }

    $id = $_POST['user_id'];
    $password = $_POST['password'];

//check if errors exist
    if (count($error) === 0) {
$updateSql="Update users SET password='$password' WHERE user_id=$id";
        $result_usql = mysqli_query($conn, $updateSql);
        if ($result_usql) {
            header('Location:index.php?Ures=1');

        } else {
            header('Location:index.php?Ures=2');
        }
    }else{
        echo "Why do you want to use empty for password,Explain?
            <a href='index.php'>Go back joor</a>";
    }

}





###### RESET PASSWORD WHEN NOT LOGGED IN ##############################################

if (isset($_POST['passReset'])) {
    $error = [];

    if (empty($_POST['email'])) {
        array_push($error, "Kindly enter your email for verification");
    }

    if (empty($_POST['password'])) {
        array_push($error, "Input a password");
    }

    $email = $_POST['email'];
    $password = $_POST['password'];

//check if errors exist
    if (count($error) === 0) {
$updateSql="UPDATE users SET password='$password' WHERE email='{$email}'";
        $result_usql = mysqli_query($conn, $updateSql);
        if ($result_usql) {
            header('Location:password_reset.php?pres=1');

        } else {
            echo($updateSql);

            header('Location:password_reset.php?pres=2');
        }
    }else{

        foreach ($error as $err) {
            echo "<p> $err </p>";
        }
        echo "Correct the following errors
            <a href='password_reset.php'>Go back</a>";
    }

}



?>
