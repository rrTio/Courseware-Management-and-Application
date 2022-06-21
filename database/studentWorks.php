<?php
include_once("connection.php");

if(isset($_POST['btnDownloadFile'])){
    $getTaskID = $_POST['btnDownloadFile'];

    $getLocation = "SELECT * FROM studenttasks WHERE taskID = '$getTaskID';";
    $result = mysqli_query($conn, $getLocation);
    $file = mysqli_fetch_assoc($result);

    $filepath = '../schoolworks/' . $file['fileName'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('../schoolworks/' . $file['fileName']));
        readfile('../schoolworks/' . $file['fileName']);
    }
    header("Location: ../studentOpenSubject.php");
}   

?>