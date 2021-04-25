<?php
session_start();
include "db.php";
if (!isset($_SESSION['name'])) {
    header("Location:login.php");

}

//select and echo previous value query
if(isset($_GET['course_id'])) {
    $id = $_GET['course_id'];
    $psql = "SELECT * FROM courses WHERE course_id={$id}";
    $result_psql = mysqli_query($conn, $psql);
    if ($result_psql->num_rows > 0) {
        while ($rows = mysqli_fetch_assoc($result_psql)) {
            $course_id = $rows['course_id'];
            $user_id = $rows['user_id'];
            $course = $rows['course'];

        }
    }
}

//update query
if (isset($_POST['update'])) {
    $update_id = $id;
    $user_id = $_POST['user_id'];
    $course = $_POST['course'];

    $usql = "UPDATE courses SET course='{$course}'WHERE course_id={$update_id} AND user_id={$user_id}";
    $result_usql = mysqli_query($conn, $usql);
    if ($result_usql) {
       header('Location:index.php?message=success');

    } else {
        header('Location:index.php?message=Error');

    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<div>
    <hr>
    <h1>Edit course</h1>
    <form action="" method="post">
        <input name="user_id" type="text" hidden value="<?php echo $_SESSION['user_id'] ?>">
<!--        <input name="update_id" type="text" hidden value="--><?php //echo $course_id ?><!--">-->
        <br>
        <label>Course</label>
        <input type="text" name="course" placeholder="Enter Course name" value="<?php echo $course ?>">
        <br>
        <hr>
        <input name="update" value="Edit course" type="submit">
        <br>

    </form>
    <br>
</div>



</body>
</html>