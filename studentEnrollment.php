<?php
include_once('./database/connection.php');
session_start();
$firstName = $_SESSION['firstName'];
$fullName = $_SESSION['fullname'];
$studentID = $_SESSION['studentID'];
$program = $_SESSION['program'];
$image = $_SESSION['profile'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Enrollment</title>
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
  <script type="text/javascript" src="./js/studentEnrollment.js"></script>
</head>

<body onload="getPosition();">
  <aside class="sidebar position-fixed top-0 left-0 overflow-auto h-100 float-left" id="show-side-navigation1">
    <div class="sidebar-header d-flex align-items-center px-3 py-4">
      <?php
        echo "<img class='rounded-pill img-fluid border-2' width='25%' src=" .  $image . " alt='Official's Image'>"
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
    <div class="p-4">
      <div class="welcome">
        <div class="content rounded-3 p-3">
          <h1 class="fs-3">Student Enrollment</h1>
          <p class="mb-0">Hello <?php echo $firstName?></p>
        </div>
      </div>
    <section class="subjects">
      <div class="container">
        <h2>&nbsp;Subjects</h2>
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th data-field="subjectCode" data-sortable="true">Subject Code</th>
              <th data-field="subject" data-sortable="true">Subject Name</th>
              <th data-field="action" data-sortable="true">Action</th>
            </tr>
          </thead>
          <form method="POST" action="./database/insertDB.php">
            <input type="hidden" name="studentName" value="<?php echo $fullName?>">
            <input type="hidden" name="studentID" value="<?php echo $studentID?>">
            <input type="hidden" name="program" value="<?php echo $program?>">
            <tbody>
              <?php
              $getCourse = "SELECT * FROM courselist WHERE programName = '$program';";
              $result = mysqli_query($conn, $getCourse);
              if (mysqli_num_rows($result) > 0) {
                while ($subjects = mysqli_fetch_assoc($result)) {
                  echo "<tr>"
                    . "</td><td>" . $subjects['subjectCode']
                    . "</td><td>" . $subjects['subject']
                    . "<td><button name='btnEncodeStudent' onClick='addedEnrollment()' type='submit' value=" . $subjects['subjectCode'] . " class='btn btn-success text-dark bg-gradient fa fa-plus'>Encode Subject ".$subjects['subjectCode']."</button></td>"
                    . "</tr>";
                }
              }
              ?>
            </tbody>
          </form>
        </table>
      </div>
    </section>

    </div>
  </section>
</body>

</html>