<?php
include_once('./database/connection.php');
session_start();
$firstName = $_SESSION['firstName'];
$fullName = $_SESSION['fullname'];
$studentID = $_SESSION['studentID'];
$program = $_SESSION['program'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Academics</title>
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
</head>

<body>
  <aside class="sidebar position-fixed top-0 left-0 overflow-auto h-100 float-left" id="show-side-navigation1">
    <div class="sidebar-header d-flex align-items-center px-3 py-4">
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
      <li><i class="fa fa-list sideIcons"></i><a href="residents.php"> Tasks</a></li>
      <li><i class="fa fa-list sideIcons"></i><a href="studentEnrollment.php"> Enrollment</a></li>
      <li><i class="fa fa-list sideIcons"></i><a href="studentAcademics.php"> Academics</a></li>
      <li><i class="fa fa-power-off sideIcons"></i><a href="index.php"> Logout</a></li>
    </ul>
  </aside>

  <section>
    <div class="p-4">
      <div class="welcome">
        <div class="content rounded-3 p-3">
          <h1 class="fs-3 text-center">Student Academics</h1>
        </div>
      </div>
      <section class="statistics mt-4">
        <form method="POST" action="./database/openSubject.php">
        <?php
          $getSubjects = "SELECT * FROM studentsubjects WHERE studentID = '$studentID';";
          $query = mysqli_query($conn, $getSubjects);
          if(mysqli_num_rows($query) > 0){
            while($subjectList = mysqli_fetch_assoc($query)){
              $sCode = $subjectList['subjectCode'];
              $sName = $subjectList['subject'];
              echo "<div class='row mt-1'>
              <div class='col-lg-12'>
                <div class='box d-flex rounded-1 align-items-center mb-4 mb-lg-0 p-3'>
                  <div class='ms-3'>
                    <div class='d-flex align-items-center'>
                      <h3 class='mb-0'>".$sCode."</h3> 
                      <span class='d-block ms-2'>".$sName."</span>
                      <button name='btnOpenSubject' onClick='addedEnrollment()' type='submit' value=" . $sCode . " class='btn btn-success text-dark bg-gradient fa fa-plus'>Open ".$subjectList['subjectCode']."</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>";
            }
          }
        ?>
        </form>
    </section>
    </div>
  </section>
</body>

</html>