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
    `nickName` TEXT,
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
    `yearLevel` VARCHAR(2),
    `birthMonth` VARCHAR(2),
    `birthDay` VARCHAR(2),
    `birthYear` VARCHAR(4),
    `username` TEXT,
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
    `yearLevel` VARCHAR(2),
    `birthMonth` VARCHAR(2),
    `birthDay` VARCHAR(2),
    `birthYear` VARCHAR(4),
    `username` TEXT,
    `email` TEXT,
    `userPassword` TEXT,
    `confirmPassword` TEXT,
    `imageLocation` TEXT
);";
mysqli_query($conn, $createAdminTable);
mysqli_query($conn, $createStudentTable);
mysqli_query($conn, $createFacultyTable);
?>