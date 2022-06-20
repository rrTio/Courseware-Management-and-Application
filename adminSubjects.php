<?php
include_once('./database/connection.php');
session_start();
$firstName = $_SESSION['firstName'];
$fullName = $_SESSION['fullname'];
$adminID = $_SESSION['adminID'];
$image = $_SESSION['profile'];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Add Subjects</title>
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
          <p class="mt-1 mb-0 headPlace"> &nbsp; <?php echo $adminID ?></p>
        </div>
      </div>
      <ul class="categories list-unstyled">
        <li><i class="fa fa-home sideIcons"></i><a href="dashboardAdmin.php"> Dashboard</a></li>
        <li><i class="fa fa-user sideIcons"></i><a href="viewUserAdmin.php"> My Profile</a></li>
        <li><i class="fa fa-list sideIcons"></i><a href="adminSubjects.php"> Add Subject</a></li>
        <li><i class="fa fa-list sideIcons"></i><a href="adminEnrollees.php"> Enrollees</a></li>
        <li><i class="fa fa-power-off sideIcons"></i><a href="index.php"> Logout</a></li>
      </ul>
    </aside>

    <section>
      <div class="p-4">
        <div class="welcome">
          <div class="content rounded-3 p-3">
            <h1 class="fs-3">Add Subjects</h1>
          </div>
        </div>
        
      <section class="subjects">
        <div class="container">
          <h2>&nbsp;Subjects</h2>
        </div>
        <form name="adminSubs"method="POST" action="./database/insertDB.php" enctype="multipart/form-data">
          <div class="row">
              <div class="col-md-10">
                  <div class="row mb-4">
                    <div class="col-lg-3">
                      <div class="form-floating">
                        <select class="form-control form-control-lg p-2 pt-3" id="program" name="program" required>
                          <option selected disabled value="none">--SELECT--</option>
                          <option value="BTLE">Bachelor of Technology and Livelihood Education</option>
                          <option value="BPE">Bachelor of Physical Education</option>
                          <option value="BSBA">BS Business Administration</option>
                          <option value="BSN">BS Nursing</option>
                          <option value="BPA">Bachelor of Public Administration</option>
                          <option value="ABEL">AB English Language</option>
                          <option value="BSIT">BS Information Technology</option>
                          <option value="BECHE">Bachelor of Early Childhood Education</option>
                        </select>
                        <label class="form-label" for="program">PROGRAMS</label>  
                      </div>
                    </div>
                  <div class="col-lg-3">
                    <div class="form-floating">
                      <input class="form-control form-control-lg" id="subjectCode" name="subjectCode" placeholder="Subject Code" required>
                      <label class="form-label" for="subjectCode">Subject Code</label>
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-floating">
                      <input class="form-control form-control-lg" id="subjectName" name="subjectName" placeholder="Subject Name" required>
                      <label class="form-label" for="subjectName">Subject Name</label>
                    </div>
                  </div>
                  <div class="col-lg-3">
                      <div class="form-floating">
                      <select class="form-control form-control-lg p-2 pt-3" id="facultyName" name="facultyName" required>
                          <option selected disabled value="none">--SELECT--</option>
                          <?php
                            $getFaculty = "SELECT * FROM facultyTable;";
                            $result = mysqli_query($conn, $getFaculty);
                            if(mysqli_num_rows($result) > 0){
                              while($faculty = mysqli_fetch_assoc($result)){
                                $firstName = $faculty['firstName'];
                                $middleName = $faculty['middleName'];
                                $lastName = $faculty['lastName'];
                                $fullName = $lastName . ", " . $firstName;
                                echo "<option value=".$faculty['facultyID'].">".$fullName."</option>";
                              }
                            }
                          ?>
                        </select>
                        <label class="form-label" for="program">FACULTY</label>  
                      </div>
                    </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-3">
              <div class="form-floating">
                <input class="form-control form-control-lg" id="section" name="section" placeholder="section" required>
                <label class="form-label" for="section">Section</label>
              </div>
            </div>
            <div class="col-lg-3">
              <button name='btnEncodeSubject' type='submit' class='btn btn-success text-dark bg-gradient fa fa-plus'>Add Subject</button>
            </div>
          </div>
        </form>
      </section>
    </section>
  </body>
</html>