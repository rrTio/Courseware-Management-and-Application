<?php
include_once("connection.php");

if(isset($_POST['btnChangePassAdmin'])){
    $adminUsername = $_POST['adminUsername'];
    $adminNewPassword = $_POST['adminNewPassword'];
    $adminConfirmPassword = $_POST['confirmAdminPassword'];

    $changeAdminPassword = "UPDATE adminTable SET (username = '$username' OR email = '$username') AND userPassword = '$adminNewPassword';";
    mysqli_query($conn, $changeAdminPassword);
    header("Location: ../loginAdmin.php");
}



if(isset($_POST['btnChangePassAdmin'])){
    $adminUsername = $_POST['facultyUsername'];
    $adminNewPassword = $_POST['facultytNewPassword'];
    $adminConfirmPassword = $_POST['confirmFacultyPassword'];

    $changeFacultyPassword = "UPDATE facultyTable SET (username = '$username' OR email = '$username') AND userPassword = '$adminNewPassword';";
    mysqli_query($conn, $changeFacultyPassword);
    header("Location: ../loginFaculty.php");
}



if(isset($_POST['btnChangePassFaculty'])){
    $adminUsername = $_POST['studentUsername'];
    $adminNewPassword = $_POST['studentNewPassword'];
    $adminConfirmPassword = $_POST['confirmStudentPassword'];

    $changeStudentPassword = "UPDATE studentTable SET (username = '$username' OR email = '$username') AND userPassword = '$adminNewPassword';";
    mysqli_query($conn, $changeStudentPassword);
    header("Location: ../loginStudent.php");
}

?>