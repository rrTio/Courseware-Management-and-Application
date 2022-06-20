<?php
include_once('connection.php');

if(isset($_POST['btnAddTask'])){
    $facultyID = $_POST['facultyID'];
    $taskTitle = $_POST['task'];
    $subjectCode = $_POST['subject'];
    $subjectNote = $_POST['subNote'];

    $taskID = $facultyID.date("Ymhis").'task-file';

    $file = $_FILES['taskFile'];
    $fileName = $_FILES['taskFile']['name'];
    $fileTmpName = $_FILES['taskFile']['tmp_name'];
    $fileError = $_FILES['taskFile']['error'];
    $fileType = $_FILES['taskFile']['type'];

    $fileExt = explode('.', $fileName);
    $fileExtension = strtolower(end($fileExt));
    $allow = array('pdf', 'docx', 'doc', 'txt');

    if(in_array($fileExtension, $allow)){
        $fileNameNew = strtolower($subjectCode."-".$taskTitle) . '.' . $fileExtension;
        $filePath = './schoolworks/'.$fileNameNew;
        $sendToDirectory = '../schoolworks/'.$fileNameNew;
        move_uploaded_file($fileTmpName, $sendToDirectory);
    }

    $insertTask = "INSERT INTO studenttasks (taskId, taskName, subjectCode, subjectNote, facultyID, fileName, fileType, fileLocation)
                    VALUES ('$taskID', '$taskTitle', '$subjectCode', '$subjectNote', '$facultyID', '$fileNameNew', '$fileType', '$filePath')";
    $execute = mysqli_query($conn, $insertTask);
    header("Location: ../facultyOpenSubject.php");
}
?>