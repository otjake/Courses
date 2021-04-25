<?php
include "db.php";
function ShowCourses($user_id)
{
    global $conn;
    $Getcourses = "SELECT * FROM courses WHERE user_id={$user_id}";
    return mysqli_query($conn,$Getcourses);
}

if(isset($_POST['add_course'])) {
    $error = [];

    //check if any input field is empty
    if (empty($_POST['course'])) {
        array_push($error, "course can't be empty");
    }

    $course = $_POST['course'];
    $user_id = $_POST['user_id'];


    //check if errors exist
    if (count($error) === 0) {


        //if it dosent go ahead with registration
        $InsertQuery = "INSERT into courses (user_id,course) 
                                    VALUES ({$user_id},'$course')";
        $run_InsertQuery = mysqli_query($conn, $InsertQuery);
        if ($run_InsertQuery) {
            //         echo "Registration successfull <a href='login.php'>Login</a>";
            header('Location:index.php?course_res=1');
        } else {
            header('Location:index.php?course_res=2');

        }

//    header("Location:register.php?marker=2");
    } else {

        foreach ($error as $err) {
            echo "<p> $err </p>";
        }
        echo
        "Go back and try again  <br>
           <a href='index.php'>Home</a>";
    }
}

    if(isset($_POST['delete'])){
      $course_id=$_POST['course_id'] ;

        $delete_sql = "DELETE FROM courses WHERE course_id={$course_id}";
        $result_delete = mysqli_query($conn, $delete_sql);
        if ($result_delete) {
            header('Location:index.php?delete_res=1');

        } else {
            header('Location:index.php?delete_res=2');

        }
}
?>
