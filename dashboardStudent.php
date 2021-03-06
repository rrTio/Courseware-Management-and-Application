<?php
include_once('./database/connection.php');
session_start();
$firstName = $_SESSION['firstName'];
$fullName = $_SESSION['fullname'];
$studentID = $_SESSION['studentID'];
$program = $_SESSION['program'];
$image = $_SESSION['profile'];

$countSubjects = "SELECT * FROM studentsubjects;";
$subjects = mysqli_query($conn, $countSubjects);
$totalSubjects = mysqli_num_rows($subjects);

$countTasks = "SELECT * FROM studenttasks;";
$tasks = mysqli_query($conn, $countTasks);
$totalTasks = mysqli_num_rows($tasks);
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
  <script type="text/javascript" src="./assets/js/dashboard.js"></script>
</head>

<body onload="getPosition();">
  <aside class="sidebar position-fixed top-0 left-0 overflow-auto h-100 float-left" id="show-side-navigation1">
    <div class="sidebar-header d-flex align-items-center px-3 py-4">
      <?php
        echo "<img class='rounded-pill img-fluid border-2' width='25%' src=" .  $image . " alt='Admin's Image'>"
      ?>
      <div class="ms-2">
        <h5 class="fs-6 mb-0">
          <a class="text-decoration-none headName" href="viewUser.php"> &nbsp; <?php echo $fullName; ?></a>
        </h5>
        <p class="mt-1 mb-0 headPlace"> &nbsp; <?php echo $studentID ?></p>
        <p class="mt-1 mb-0 headPlace"> &nbsp; <?php echo $program ?></p>
      </div>
    </div>
    <ul class="categories list-unstyled">
      <li><i class="fa fa-home sideIcons"></i><a href="dashboardStudent.php"> Dashboard</a></li>
      <li><i class="fa fa-book-open sideIcons"></i><a href="studentSubjects.php"> Subjects</a></li>
      <li><i class="fa fa-list sideIcons"></i><a href="studentOpenSubject.php"> Tasks</a></li>
      <li><i class="fa fa-list sideIcons"></i><a href="studentEnrollment.php"> Enrollment</a></li>
      <li><i class="fa fa-list sideIcons"></i><a href="studentAcademics.php"> Academics</a></li>
      <li><i class="fa fa-power-off sideIcons"></i><a href="index.php"> Logout</a></li>
    </ul>
  </aside>

  <section>
    <form name="position">
      
    </form>
    <div class="p-4">
      <div class="welcome">
        <div class="content rounded-3 p-3">
          <h1 class="fs-3">Welcome to Student Dashboard</h1>
          <p class="mb-0">Hello <?php echo $firstName?></p>
        </div>
      </div>
      <section class="statistics mt-6">
        <div class="row mt-2">
          <div class="col-lg-6">
            <div class="box d-flex rounded-1 align-items-center mb-4 mb-lg-0 p-3">
              <i class="uil-user-square fs-2 text-center bg-primary rounded-circle"></i>
              <div class="ms-3">
                <div class="d-flex align-items-center">
                  <h3 class="mb-0">SUBJECTS</h3> <span class="d-block ms-2"><?php echo $totalSubjects?></span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="box d-flex rounded-2 align-items-center mb-4 mb-lg-0 p-3">
              <i class="uil-user fs-2 text-center bg-danger rounded-circle"></i>
              <div class="ms-3">
                <div class="d-flex align-items-center">
                  <h3 class="mb-0">TASKS</h3> <span class="d-block ms-2"><?php echo $totalTasks?></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <section class="subjects">
      <div class="container">
        <h2>&nbsp;Tasks</h2>


      </div>
    </section>

    </div>
  </section>
</body>

</html>