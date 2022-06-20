<?php
include_once('./database/connection.php');
session_start();
$firstName = $_SESSION['firstName'];
$fullName = $_SESSION['fullname'];
$facultyID = $_SESSION['facultyID'];
$image = $_SESSION['profile'];

$countStudents = "SELECT COUNT(DISTINCT(studentID)) FROM enrolled WHERE facultyName = '$facultyID';";
$studentsQuery = mysqli_query($conn, $countStudents);
$totalStudents = mysqli_num_rows($studentsQuery);

$countSubjects = "SELECT * FROM enrolled WHERE facultyName = '$facultyID';";
$subjectsQuery = mysqli_query($conn, $countSubjects);
$totalSubjects = mysqli_num_rows($subjectsQuery);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <link rel="icon" href="./assets/images/logo.png">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" />
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css'>
  <link rel='stylesheet' href='https://unicons.iconscout.com/release/v3.0.6/css/line.css'>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/dashboardAdmin.css">
  <link rel="stylesheet" href="./css/main.css">
  <script type="text/javascript" src="./js/dashboard.js"></script>
</head>

<body onload="getPosition();">
  <aside class="sidebar position-fixed top-0 left-0 overflow-auto h-100 float-left" id="show-side-navigation1">
    <div class="sidebar-header d-flex align-items-center px-3 py-4">
      <div class="ms-2">
        <h5 class="fs-6 mb-0">
          <a class="text-decoration-none headName" href="viewUser.php"> &nbsp; <?php echo $fullName; ?></a>
        </h5>
        <p class="mt-1 mb-0 headPlace"> &nbsp; <?php echo $facultyID ?></p>
      </div>
    </div>
    <ul class="categories list-unstyled">
      <li><i class="fa fa-home sideIcons"></i><a href="dashboardFaculty.php"> Dashboard</a></li>
      <li><i class="fa fa-user sideIcons"></i><a href="viewUserFaculty.php"> My Profile</a></li>
      <li><i class="fa fa-list sideIcons"></i><a href="facultyStudents.php"> Subject List</a></li>
      <li><i class="fa fa-power-off sideIcons"></i><a href="index.php"> Logout</a></li>
    </ul>
  </aside>

  <section>
    <div class="p-4">
      <div class="welcome">
        <div class="content rounded-3 p-3">
          <h1 class="fs-3">Welcome to Faculty Dashboard</h1>
          <p class="mb-0">Hello <?php echo $firstName?></p>
        </div>
      </div>
      <section class="statistics mt-4">
        <div class="row">
          <div class="col-lg-6">
            <div class="box d-flex rounded-1 align-items-center mb-4 mb-lg-0 p-3">
              <i class="uil-user-square fs-2 text-center bg-primary rounded-circle"></i>
              <div class="ms-3">
                <div class="d-flex align-items-center">
                  <h3 class="mb-0">Subjects</h3> <span class="d-block ms-2"><?php echo $totalSubjects?></span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="box d-flex rounded-2 align-items-center mb-4 mb-lg-0 p-3">
              <i class="uil-user fs-2 text-center bg-danger rounded-circle"></i>
              <div class="ms-3">
                <div class="d-flex align-items-center">
                  <h3 class="mb-0">Students</h3> <span class="d-block ms-2"><?php echo $totalStudents?></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  <section class="officials">
    <div class="container">
      <div class="table-wrapper">
        <div class="table-title">
          <div class="row">
            <div class="col-sm-8">
              <h2>&nbsp;Officials</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  </div>
  </section>
</body>

</html>