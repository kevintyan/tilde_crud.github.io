<?php
session_start();
require 'connect.php';

if(isset($_POST['delete_student'])) {
    $student_id = mysqli_real_escape_string($conn, $_POST['delete_student']);

    $query = "DELETE FROM students WHERE id='$student_id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run) {
        $_SESSION['message'] = "Student deleted succesfuly";
        header("Location: index.php");
        exit(0);
    }
    else {
        $_SESSION['message'] = "Student Failed to delete";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['update_student'])) {
    $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $nim = mysqli_real_escape_string($conn, $_POST['nim']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);

    $query = "UPDATE students SET name='$name', nim='$nim', email='$email', phone='$phone' WHERE id='$student_id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run) {
        $_SESSION['message'] = "Student updated succesfuly";
        header("Location: index.php");
        exit(0);
    }
    else {
        $_SESSION['message'] = "Student Failed to update";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['add_student'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $nim = mysqli_real_escape_string($conn, $_POST['nim']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);

    $query = "INSERT INTO students (name, nim, email, phone) VALUES
        ('$name', '$nim', '$email', '$phone')";
    
    $query_run = mysqli_query($conn, $query);

    if($query_run) {
        $_SESSION['message'] = "Student has been successfuly Added";
        header("Location: create.php");
        exit(0);
    }
    else {
        $_SESSION['message'] = "Student Failed to add";
        header("Location: create.php");
        exit(0);
    }
}
?>