<?php
if(isset($_GET['Ures']) AND !isset($_GET['message']) AND !isset($_GET['course_res']) AND !isset($_GET['delete_res'])){
    if($_GET['Ures']==1){
        echo "<h1 style='color: green'><strong>Password Update success</strong></h1>";
    }
    else if($_GET['Ures']==2){
        echo "<h1 style='color: red'><strong>Try updating Password again</strong></h1>";
    }
}

if(isset($_GET['message']) AND !isset($_GET['Ures']) AND !isset($_GET['course_res']) AND !isset($_GET['delete_res'])){
    if($_GET['message']=='success'){
        echo "<h1 style='color: green'><strong>Course Update  success</strong></h1>";
    }
    else if($_GET['message']=='error'){
        echo "<h1 style='color: red'><strong>Try updating Course again</strong></h1>";
    }
}

if(isset($_GET['course_res']) AND !isset($_GET['Ures']) AND !isset($_GET['message']) AND !isset($_GET['delete_res'])){
    if($_GET['course_res']==1){
        echo "<h1 style='color: green'><strong>Course Registered</strong></h1>";
    }
    else if($_GET['course_res']=='2'){
        echo "<h1 style='color: red'><strong>Try Adding again</strong></h1>";
    }
}

if(isset($_GET['delete_res']) AND !isset($_GET['Ures']) AND !isset($_GET['message']) AND !isset($_GET['course_res'])){
    if($_GET['delete_res']==1){
        echo "<h1 style='color: green'><strong>Course Delete</strong></h1>";
    }
    else if($_GET['delete_res']=='2'){
        echo "<h1 style='color: red'><strong>Try Deleting again</strong></h1>";
    }
}