<?php

include_once('connection.php');


// REGISTRATION
if(isset($_POST['btnRegisterAdmin'])){
    $adminID = $_POST['adminId'];
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $lastName = $_POST['lastName'];
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
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    $file = $_FILES['official'];
    $fileName = $_FILES['official']['name'];
    $fileTmpName = $_FILES['official']['tmp_name'];
    $fileError = $_FILES['official']['error'];
    $fileType = $_FILES['official']['type'];

    $fileExt = explode('.', $fileName);
    $fileExtension = strtolower(end($fileExt));
    $allow = array('jpg', 'jpeg', 'png');

    if(in_array($fileExtension, $allow)){
        $fileNameNew = strtolower($adminID.$lastName) . '.' . $fileExtension;
        $filePath = './images/officials/'.$fileNameNew;
        $sendToDirectory = '../images/officials/'.$fileNameNew;
        move_uploaded_file($fileTmpName, $sendToDirectory);
    }

    $insertData = "INSERT INTO adminTable (adminID, firstName, middleName, lastName, birthMonth, birthDay, birthYear, gender, civilStatus, cityAddress, mobileNumber, homeNumber, username, email, userPassword, confirmPassword, imageLocation)
                    VALUES ('$adminID', '$firstName', '$middleName', '$lastName', '$birthMonth', '$birthDay', '$birthYear', '$gender', '$civilStatus', '$cityAddress', '$mobileNumber', '$homeNumber', '$username', '$email', '$password', '$confirmPassword', '$filePath');";
    mysqli_query($conn, $insertData);
    header("Location: ../loginAdmin.php");
}

if(isset($_POST['btnRegisterFaculty'])){
    $facultyID = $_POST['adminId'];
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $lastName = $_POST['lastName'];
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
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    $file = $_FILES['official'];
    $fileName = $_FILES['official']['name'];
    $fileTmpName = $_FILES['official']['tmp_name'];
    $fileError = $_FILES['official']['error'];
    $fileType = $_FILES['official']['type'];

    $fileExt = explode('.', $fileName);
    $fileExtension = strtolower(end($fileExt));
    $allow = array('jpg', 'jpeg', 'png');

    if(in_array($fileExtension, $allow)){
        $fileNameNew = strtolower($facultyID.$lastName) . '.' . $fileExtension;
        $filePath = './images/officials/'.$fileNameNew;
        $sendToDirectory = '../images/officials/'.$fileNameNew;
        move_uploaded_file($fileTmpName, $sendToDirectory);
    }

    $insertData = "INSERT INTO facultyTable (facultyID, firstName, middleName, lastName, birthMonth, birthDay, birthYear, gender, civilStatus, cityAddress, mobileNumber, homeNumber, username, email, userPassword, confirmPassword, imageLocation)
                    VALUES ('$facultyID', '$firstName', '$middleName', '$lastName', '$birthMonth', '$birthDay', '$birthYear', '$gender', '$civilStatus', '$cityAddress', '$mobileNumber', '$homeNumber', '$username', '$email', '$password', '$confirmPassword', '$filePath');";
    mysqli_query($conn, $insertData);
    header("Location: ../loginFaculty.php");
}

if(isset($_POST['btnRegisterStudent'])){
    $studentID = $_POST['studentId'];
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $program = $_POST['program'];
    $lastName = $_POST['lastName'];
    $birthMonth = $_POST['bMonth'];
    $birthDay = $_POST['bDay'];
    $birthYear = $_POST['bYear'];
    $gender = $_POST['gender'];
    $cityAddress = $_POST['cityAdd'];
    $civilStatus = $_POST['cStatus'];
    $mobileNumber = $_POST['mobileNumber'];
    $homeNumber = $_POST['homeNumber'];
    $username = $_POST['uName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    $file = $_FILES['official'];
    $fileName = $_FILES['official']['name'];
    $fileTmpName = $_FILES['official']['tmp_name'];
    $fileError = $_FILES['official']['error'];
    $fileType = $_FILES['official']['type'];

    $fileExt = explode('.', $fileName);
    $fileExtension = strtolower(end($fileExt));
    $allow = array('jpg', 'jpeg', 'png');

    if(in_array($fileExtension, $allow)){
        $fileNameNew = strtolower($studentID.$lastName) . '.' . $fileExtension;
        $filePath = './images/officials/'.$fileNameNew;
        $sendToDirectory = '../images/officials/'.$fileNameNew;
        move_uploaded_file($fileTmpName, $sendToDirectory);
    }

    $insertData = "INSERT INTO studentTable (studentID, firstName, middleName, lastName, program, birthMonth, birthDay, birthYear, gender, civilStatus, cityAddress, mobileNumber, homeNumber, username, email, userPassword, confirmPassword, imageLocation)
                    VALUES ('$studentID', '$firstName', '$middleName', '$lastName', '$program', '$birthMonth', '$birthDay', '$birthYear', '$gender', '$civilStatus', '$cityAddress', '$mobileNumber', '$homeNumber', '$username', '$email', '$password', '$confirmPassword', '$filePath');";
    mysqli_query($conn, $insertData);
    header("Location: ../loginStudent.php");
}

if(isset($_POST['btnEncodeSubject'])){
    $programName = $_POST['program'];
    $subjectCode = $_POST['subjectCode'];
    $subject = $_POST['subjectName'];
    $facultyName = $_POST['facultyName'];
    $section = $_POST['section'];

    $insertData = "INSERT INTO courselist (programName, subject, subjectCode, facultyName, section)
                    VALUES('$programName', '$subject', '$subjectCode', '$facultyName', '$section');";
    mysqli_query($conn, $insertData);
    header("Location: ../adminSubjects.php");
}

if(isset($_POST['btnEncodeStudent'])){
    $getSubjectCode = $_POST['btnEncodeStudent'];

    $studentID = $_POST['studentID'];
    $studentName = $_POST['studentName'];
    $program = $_POST['program'];

    $getSubject = "SELECT * FROM courselist WHERE subjectCode = '$getSubjectCode';";
    $query = mysqli_query($conn, $getSubject);
    if(mysqli_num_rows($query) == 1){
        while($subjectData = mysqli_fetch_assoc($query)){
            $programName = $subjectData['programName'];
            $subjectName = $subjectData['subject'];
            $subjectCode = $subjectData['subjectCode'];
            $facultyName = $subjectData['facultyName'];
            $section = $subjectData['section'];
        }
    }

    $courseListInsertion = "INSERT INTO enrolleeTable (programName, studentID, studentName, subjectCode, subjectName, facultyName, section)
                                VALUES('$program', '$studentID', '$studentName', '$subjectCode', '$subjectName', '$facultyName', '$section');";
    mysqli_query($conn, $courseListInsertion);
    header("Location: ../studentEnrollment.php");
}

if(isset($_POST['btnCancelEnrollment'])){
    $getStudentID = $_POST['btnCancelEnrollment'];
    $removeSubject = "DELETE FROM enrolleeTable WHERE studentID = '$getStudentID';";
    mysqli_query($conn, $removeSubject);
    header("Location: ../studentPending.php");
}

if(isset($_POST['btnVerifyStudent'])){
    $studentID = $_POST['btnVerifyStudent'];

    $getStudent = "SELECT * FROM enrolleetable WHERE studentID = '$studentID';";
    $get = mysqli_query($conn, $getStudent);

    if(mysqli_num_rows($get) == 1){
        while($studentInfo = mysqli_fetch_assoc($get)){
            $programName = $studentInfo['programName'];
            $studentID = $studentInfo['studentID'];
            $studentName = $studentInfo['studentName'];
            $subjectCode = $studentInfo['subjectCode'];
            $subjectName = $studentInfo['subjectName'];
            $facultyName = $studentInfo['facultyName'];
            $section = $studentInfo['section'];
        }
    }
    $enrolled = "INSERT INTO enrolled (programName, studentID, studentName, subjectCode, subjectName, facultyName, section) 
                    VALUES('$programName', '$studentID', '$studentName', '$subjectCode', '$subjectName', '$facultyName', '$section');";
    mysqli_query($conn, $enrolled);

    $remove = "DELETE FROM enrolleeTable WHERE studentID = '$studentID';";
    mysqli_query($conn, $remove);
    header("Location: ../adminEnrollees.php");
}

if(isset($_POST['btnDenyStudent'])){
    $studentID = $_POST['btnDenyStudent'];
    $remove = "DELETE FROM enrolleeTable WHERE studentID = '$studentID';";
    mysqli_query($conn, $remove);
    header("Location: ../adminEnrollees.php");
}

?>