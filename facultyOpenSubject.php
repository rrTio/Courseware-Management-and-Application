<?php
include_once('./database/connection.php');
session_start();
$firstName = $_SESSION['firstName'];
$fullName = $_SESSION['fullname'];
$facultyID = $_SESSION['facultyID'];
$image = $_SESSION['profile'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Tasks</title>
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
        echo "<img class='rounded-pill img-fluid border-2' width='25%' src=" .  $image . " alt='Official's Image'>"
      ?>
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
          <h1 class="fs-3 text-center">TASKS</h1>
        </div>
      </div>
    </div>
  </section>
    
  <section class="subjects">
    <div class="container">
      <h2>&nbsp;Create Lessons</h2>
      <form action='./database/facultyWorks.php' enctype="multipart/form-data" method="POST">
        <input type="hidden" name='facultyID' value='<?php echo $facultyID?>'>
      <div class="row">
        <div class="col-md-10">
          <div class="row mb-4">
            <div class="col-md-3">
              <div class="form-floating">
                  <input class="form-control form-control-lg" type="text" id="task" name="task" placeholder="Last Name" required>
                  <label class="form-label" for="lName">TASK TITLE</label>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-floating">
                <select class="form-control form-control-lg p-2 pt-3" id="subject" name="subject" required>
                  <option selected disabled value="none">--SELECT--</option>
                  <?php
                    $getSubject = "SELECT * FROM courselist WHERE facultyName = '$facultyID';";
                    $result = mysqli_query($conn, $getSubject);
                    if(mysqli_num_rows($result) > 0){
                      while($subject = mysqli_fetch_assoc($result)){
                        $subjectName = $subject['subject'];
                        $subjectCode = $subject['subjectCode'];
                        $section = $subject['section'];
                        $fullName = $subjectName . "(" . $subjectCode . ") - Section: " . $section;
                        echo "<option value=".$subjectCode.">".$fullName."</option>";
                      }
                    }
                  ?>
                </select>
                <label class="form-label" for="program">SUBJECT</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating">
                <input class="form-control form-control-lg " type="text" id="subNote" name="subNote" placeholder="Subject Note" required>
                <label class="form-label" for="subNote">SUBJECT NOTE</label>
              </div>
            </div>
          <div class="row mt-2">
            <div class="col-md-3" id="fileUpload">
              <input type="file" name="taskFile">
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-md-12">
              <button type="submit" name="btnAddTask" onClick="checkValidation()" class="btn btn-primary btn-block btn-large">ADD TASK</button>
            </div>
          </div>
      </form>  
    </div>
  </section>
</body>
</html>