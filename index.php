<?php
session_start();
if (!isset($_SESSION['name'])) {
    header("Location:login.php");

}
include 'CourseControl.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
//operation responses
include "alerts.php";

echo "<div><h2><strong>Hi, ".$_SESSION['name']." Here are all your courses
        <a href=\"logout.php\" style='float: right;color: red'>Logout</a>
        </strong></h2>
        </div>
";

####COURSES#######
$ShowCourses=ShowCourses($_SESSION['user_id']);
if ($ShowCourses->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($ShowCourses)) {
        $course_id = $row['course_id'];
        $course = $row['course'];

        echo "<div style='background-color: antiquewhite;font-size: 18px'>
                <strong>$course</strong><br>
                <a href='edit.php?course_id=$course_id'>Edit</a>
                
                <form action='CourseControl.php' method='post'>
                <input name='course_id' type='text' hidden value='$course_id'>
                <p><input name='delete' value='Delete' type='submit'></p>
                </form>
                </div><br>";
    }
}
else{
    echo "You have no registered course";
}
####COURSES#######

?>


<div>
    <hr>
    <h1>Add a new course</h1>
    <form action="CourseControl.php" method="post">
        <input name="user_id" type="text" hidden value="<?php echo $_SESSION['user_id'] ?>">
       <br>
        <label>New Course:</label>
        <input type="text" name="course" placeholder="Enter Course name" type="text">
        <br>
        <hr>
        <input name="add_course" value="Add New Course" type="submit">
        <br>

    </form>
    <br>
</div>

<hr>
<h1>Update your password</h1>
<form action="controls.php" method="post">
    <input name="user_id" type="text" hidden value="<?php echo $_SESSION['user_id'] ?>">
<!--    <input name="name" type="text" hidden value="--><?php //echo $_SESSION['name'] ?><!--">-->
<!--    <input name="email" type="text" hidden value="--><?php //echo $_SESSION['email'] ?><!--">-->
    <br>
    <hr>
    <label>New Password:</label>
    <input name="password" placeholder="Enter your new password" type="text">
    <br>
    <hr>
    <input name="update" value="Update" type="submit">
    <br>
    <hr>

</form>
<br>
</body>
</html>