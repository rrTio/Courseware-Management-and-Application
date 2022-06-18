<?php
include_once('./database/connection.php');
session_start();
$firstName = $_SESSION['firstName'];
$fullName = $_SESSION['fullname'];
$adminID = $_SESSION['adminID'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Enrollees</title>
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
      <div class="ms-2">
        <h5 class="fs-6 mb-0">
          <a class="text-decoration-none headName" href="viewUser.php"> &nbsp; <?php echo $fullName; ?></a>
        </h5>
        <p class="mt-1 mb-0 headPlace"> &nbsp; <?php echo $adminID ?></p>
      </div>
    </div>
    <ul class="categories list-unstyled">
        <li><i class="fa fa-home sideIcons"></i><a href="dashboardAdmin.php"> Dashboard</a></li>
        <li><i class="fa fa-user sideIcons"></i><a href="viewUser.php"> My Profile</a></li>
        <li><i class="fa fa-list sideIcons"></i><a href="adminSubjects.php"> Add Subject</a></li>
        <li><i class="fa fa-list sideIcons"></i><a href="adminEnrollees.php"> Enrollees</a></li>
        <li><i class="fa fa-power-off sideIcons"></i><a href="index.php"> Logout</a></li>
    </ul>
  </aside>

  <section>
    <div class="p-4">
      <div class="welcome">
        <div class="content rounded-3 p-3">
          <h1 class="fs-3">Enrollees</h1>
          <p class="mb-0">Hello <?php echo $firstName?></p>
        </div>
      </div>
    <section class="subjects">
      <div class="container">
        <h2>&nbsp;Subjects</h2>
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th data-field="subjectCode" data-sortable="true">Program Name</th>
              <th data-field="subject" data-sortable="true">Student ID</th>
              <th data-field="faculty" data-sortable="true">Student Name</th>
              <th data-field="faculty" data-sortable="true">Student Code</th>
              <th data-field="faculty" data-sortable="true">Subject Name</th>
              <th data-field="faculty" data-sortable="true">Faculty Name</th>
              <th data-field="faculty" data-sortable="true">Section</th>
              <th data-field="action" data-sortable="true">Action</th>
            </tr>
          </thead>
          <form method="POST" action="./database/insertDB.php">
            <tbody>
            <?php
            include_once("./database/connection.php");
            $getCourse = "SELECT * FROM enrolleeTable";
            $result = mysqli_query($conn, $getCourse);
            if (mysqli_num_rows($result) > 0) {
                while ($subjects = mysqli_fetch_assoc($result)) {
                echo "<tr>"
                    . "<td>" . $subjects['programName']
                    . "</td><td>" . $subjects['studentID']
                    . "</td><td>" . $subjects['studentName']
                    . "</td><td>" . $subjects['subjectCode']
                    . "</td><td>" . $subjects['subjectName']
                    . "</td><td>" . $subjects['facultyName']
                    . "</td><td>" . $subjects['section']
                    . "<td><button name='btnVerifyStudent' title='Verify Student' type='submit' value=" . $subjects['studentID'] . " class='btn btn-success text-dark bg-gradient fa fa-check'></button>
                            <button name='btnDenyStudent' title='Deny Student' type='submit' value=" . $subjects['studentID'] . " class='btn btn-success text-dark bg-danger fa fa-trash'></button></td>"
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