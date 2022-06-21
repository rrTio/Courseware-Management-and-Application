<?php
include_once('connection.php');

if(isset($_POST['btnLoginAdmin'])){
    $adminUsername = $_POST['usernameAdmin'];
    $adminPassword = $_POST['passwordAdmin'];

    $loginAdmin = "SELECT * FROM adminTable WHERE (email = '$adminUsername' or username = '$adminUsername') AND userPassword = '$adminPassword';";
    $login = mysqli_query($conn, $loginAdmin);

    if(mysqli_num_rows($login) == 1){
        while($dashboard = mysqli_fetch_assoc($login)){
            $firstName = $dashboard['firstName'];
            $middleName = $dashboard['middleName'];
            $lastName = $dashboard['lastName'];
            $adminID = $dashboard['adminID'];
            $image = $dashboard['imageLocation'];

            $fullName = $lastName . ", " . $firstName . " " . $middleName;
        }
        session_start();
        $_SESSION['firstName'] = $firstName;
        $_SESSION['fullname'] = $fullName;
        $_SESSION['adminID'] = $adminID;
        $_SESSION['profile'] = $image;
        header("Location: ../dashboardAdmin.php");
    }

    else{
        echo '<script> alert("Error credentials"); </script>';
        header("Location: ../loginAdmin.php");
    }

}

if(isset($_POST['btnLoginFaculty'])){
    $facultyUsername = $_POST['usernameFaculty'];
    $facultyPassword = $_POST['passwordFaculty'];

    $loginFaculty = "SELECT * FROM facultyTable WHERE (email = '$facultyUsername' or username = '$facultyUsername') AND userPassword = '$facultyPassword';";
    $login = mysqli_query($conn, $loginFaculty);

    if(mysqli_num_rows($login) == 1){
        while($dashboard = mysqli_fetch_assoc($login)){
            $firstName = $dashboard['firstName'];
            $middleName = $dashboard['middleName'];
            $lastName = $dashboard['lastName'];
            $facultyID = $dashboard['facultyID'];
            $image = $dashboard['imageLocation'];

            $fullName = $lastName . ", " . $firstName . " " . $middleName;
        }
        
        session_start();
        $_SESSION['firstName'] = $firstName;
        $_SESSION['fullname'] = $fullName;
        $_SESSION['facultyID'] = $facultyID;
        $_SESSION['profile'] = $image;
        header("Location: ../dashboardFaculty.php");
    }

    else{
        echo '<script> alert("Error credentials"); </script>';
        header("Location: ../loginFaculty.php");
    }

}

if(isset($_POST['btnLoginStudent'])){
    $studentUsername = $_POST['usernameStudent'];
    $studentPassword = $_POST['passwordStudent'];

    $loginFaculty = "SELECT * FROM studentTable WHERE (email = '$studentUsername' or username = '$studentUsername') AND userPassword = '$studentPassword';";
    $login = mysqli_query($conn, $loginFaculty);

    if(mysqli_num_rows($login) == 1){
        while($dashboard = mysqli_fetch_assoc($login)){
            $firstName = $dashboard['firstName'];
            $middleName = $dashboard['middleName'];
            $lastName = $dashboard['lastName'];
            $studentID = $dashboard['studentID'];
            $program = $dashboard['program'];
            $image = $dashboard['imageLocation'];

            $fullName = $lastName . " " . $firstName . " " . $middleName;
        }
        session_start();
        $_SESSION['firstName'] = $firstName;
        $_SESSION['fullname'] = $fullName;
        $_SESSION['studentID'] = $studentID;
        $_SESSION['program'] = $program;
        $_SESSION['profile'] = $image;
        header("Location: ../dashboardStudent.php");
    }

    else{
        echo '<script> alert("Error credentials"); </script>';
        header("Location: ../loginStudent.php");
    }

}