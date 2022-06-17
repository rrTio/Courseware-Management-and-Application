<?php

include_once('connection.php');


// REGISTRATION
if(isset($_POST['btnRegisterAccount'])){
    $adminID = $_POST['adminId'];
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $lastName = $_POST['lastName'];
    $nickName = $_POST['nickName'];
    $birthMonth = $_POST['bMonth'];
    $birthDay = $_POST['bDay'];
    $birthYear = $_POST['bYear'];
    $gender = $_POST['gender'];
    $civilStatus = $_POST['cStatus'];
    $cityAddress = $_POST['cityAdd'];
    $mobileNumber = $_POST['mobileNumber'];
    $homeNumber = $_POST['homeNumber'];
    $username = $_POST['uName'];
    $email = $_POST['email'];
    $password = $_POST['psswrd'];
    $confirmPassword = $_POST['cPsswrd'];

    $file = $_FILES['official'];
    $fileName = $_FILES['official']['name'];
    $fileTmpName = $_FILES['official']['tmp_name'];
    $fileError = $_FILES['official']['error'];
    $fileType = $_FILES['official']['type'];

    $fileExt = explode('.', $fileName);
    $fileExtension = strtolower(end($fileExt));
    $allow = array('jpg', 'jpeg', 'png');

    if(in_array($fileExtension, $allow)){
        $fileNameNew = strtolower($idNumber.$lastName) . '.' . $fileExtension;
        $filePath = './images/officials/'.$fileNameNew;
        $sendToDirectory = '../images/officials/'.$fileNameNew;
        move_uploaded_file($fileTmpName, $sendToDirectory);
    }

    $insertData = "INSERT INTO adminTable (adminID, firstName, middleName, lastName, nickName, birthMonth, birthDay, birthYear, gender, civilStatus, cityAddress, mobileNumber, homeNumber, username, email, userPassword, confirmPassword, imageLocation)
                    VALUES ('$adminID', '$firstName', '$middleName', '$lastName', '$nickName', '$birthMonth', '$birthDay', '$birthYear', '$gender', '$civilStatus', '$cityAddress', '$mobileNumber', '$homeNumber', '$username', '$email', '$password', '$confirmPassword', '$filePath');";
    mysqli_query($conn, $insertData);
    header("Location: ../index.php");
}
?>