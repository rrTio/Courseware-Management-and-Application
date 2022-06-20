<?php
include_once('connection.php');


if(isset($_POST['btnOpenSubject'])){
    session_start();
    $openSubjectCode = $_POST['btnOpenSubject'];

    $subjectDetails = "SELECT * FROM studentsubjects WHERE subjectCode = '$openSubjectCode';";
    $execute = mysqli_query($conn, $subjectDetails);
    if(mysqli_num_rows($execute) > 0){
        while($details = mysqli_fetch_assoc($execute)){
            $subjectName = $details['subject'];
            $subjectCode = $details['subjectCode'];
            $professor = $details['facultyName'];
            $section = $details['section'];
        }
    }

    $getProfessor = "SELECT * FROM facultyTable WHERE facultyID = '$professor';";
    $profName = mysqli_query($conn, $getProfessor);
    if(mysqli_num_rows($profName) > 0){
        while($facultyName = mysqli_fetch_assoc($profName)){
            $pMiddleName = $facultyName['middleName'];
            $pFirstName = $facultyName['firstName'];
            $pLastName = $facultyName['lastName'];
        }
        $_SESSION['pfirstName'] = $pFirstName;
        $_SESSION['pmiddleName'] = $pMiddleName;
        $_SESSION['plastName'] = $pLastName;
    }
    
    $_SESSION['subjectCode'] = $subjectCode;
    $_SESSION['subjectName'] = $subjectName;
    $_SESSION['section'] = $section;
    header("Location: ../studentOpenSubject.php");
}

if(isset($_POST['btnOpenSubjectFaculty'])){
    $getSubjectCode = $_POST['btnOpenSubjectFaculty'];

    header("Location: ../facultyOpenSubject.php");
}

?>