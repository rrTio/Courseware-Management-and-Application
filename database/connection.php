<?php

$DB_SERVER = 'localhost';
$DB_USERNAME = 'root';
$DB_PASSWORD = '';
$DB_NAME = '';
$conn = mysqli_connect($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

$createDB = "CREATE DATABASE IF NOT EXISTS admindb";
if(mysqli_query($conn, $createDB)){}
else{}

mysqli_select_db($conn, "admindb");
if(!$conn){die("mysqli_connect_error()");}

$createAdminTable = "CREATE TABLE IF NOT EXISTS `adminTable` (
    `adminID` TEXT,
    `firstName` TEXT,
    `middleName` TEXT,
    `lastName` TEXT,
    `birthMonth` VARCHAR(2),
    `birthDay` VARCHAR(2),
    `birthYear` VARCHAR(4),
    `gender` TEXT,
    `civilStatus` TEXT,
    `cityAddress` TEXT,
    `mobileNumber` VARCHAR(11),
    `homeNumber` VARCHAR(7),
    `username` TEXT,
    `email` TEXT,
    `userPassword` TEXT,
    `confirmPassword` TEXT,
    `imageLocation` TEXT
);";

$createStudentTable = "CREATE TABLE IF NOT EXISTS `studentTable`(
    `studentID` TEXT,
    `firstName` TEXT,
    `middleName` TEXT,
    `lastName` TEXT,
    `username` TEXT,
    `program` TEXT,
    `birthMonth` VARCHAR(2),
    `birthDay` VARCHAR(2),
    `birthYear` VARCHAR(4),
    `mobileNumber` VARCHAR(11),
    `homeNumber` VARCHAR(7),
    `gender` TEXT,
    `civilStatus` TEXT,
    `cityAddress` TEXT,
    `email` TEXT,
    `userPassword` TEXT,
    `confirmPassword` TEXT,
    `imageLocation` TEXT
);";

$createFacultyTable = "CREATE TABLE IF NOT EXISTS `facultyTable`(
    `facultyID` TEXT,
    `firstName` TEXT,
    `middleName` TEXT,
    `lastName` TEXT,
    `username` TEXT,
    `birthMonth` VARCHAR(2),
    `birthDay` VARCHAR(2),
    `birthYear` VARCHAR(4),
    `mobileNumber` VARCHAR(11),
    `homeNumber` VARCHAR(7),
    `gender` TEXT,
    `civilStatus` TEXT,
    `cityAddress` TEXT,
    `email` TEXT,
    `userPassword` TEXT,
    `confirmPassword` TEXT,
    `imageLocation` TEXT
);";

$createEnrolleeTable = "CREATE TABLE IF NOT EXISTS `enrolleeTable`(
    `eventID` TEXT,
    `programName` TEXT,
    `studentID` TEXT,
    `studentName` TEXT,
    `subjectCode` TEXT,
    `subjectName` TEXT,
    `facultyName` TEXT,
    `section` TEXT
)";

$createProgram = "CREATE TABLE IF NOT EXISTS `enrolled`(
    `eventID` TEXT,
    `programName` TEXT,
    `studentID` TEXT,
    `studentName` TEXT,
    `subjectCode` TEXT,
    `subjectName` TEXT,
    `facultyName` TEXT,
    `section` TEXT
);";

$createCourses = "CREATE TABLE IF NOT EXISTS `courseList`(
    `programName` TEXT,
    `subject` TEXT,
    `subjectCode` TEXT,
    `facultyName` TEXT,
    `section` TEXT
);";

$createStudentSujects = "CREATE TABLE IF NOT EXISTS `studentSubjects`(
    `programName` TEXT,
    `subject` TEXT,
    `subjectCode` TEXT,
    `facultyName` TEXT,
    `studentID` TEXT,
    `section` TEXT
);";

mysqli_query($conn, $createProgram);
mysqli_query($conn, $createCourses);
mysqli_query($conn, $createAdminTable);
mysqli_query($conn, $createStudentTable);
mysqli_query($conn, $createFacultyTable);
mysqli_query($conn, $createEnrolleeTable);
mysqli_query($conn, $createStudentSujects);

?>