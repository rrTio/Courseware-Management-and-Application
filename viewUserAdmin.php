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
  <title>My Profile</title>
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
        <li><i class="fa fa-home sideIcons"></i><a href="dashboardFaculty.php"> Dashboard</a></li>
        <li><i class="fa fa-user sideIcons"></i><a href="viewUser.php"> My Profile</a></li>
        <li><i class="fa fa-list sideIcons"></i><a href="facultyStudents.php"> Subject List</a></li>
        <li><i class="fa fa-power-off sideIcons"></i><a href="index.php"> Logout</a></li>
        </ul>
    </aside>

    <section>
        <div class="p-4">
            <div class="welcome">
                <div class="content rounded-3 p-3">
                    <h1 class="fs-3 text-center">MY PROFILE</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="subjects">
    <div class="container text-center">
            <?php echo "<img class='img-fluid border-2' width='25%' src=" .  $image . " alt='Official's Image'>" ?>
        </div>

        <?php
        $getAdmin = "SELECT * FROM adminTable WHERE adminID = '$adminID';";
        $result = mysqli_query($conn, $getAdmin);
        if(mysqli_num_rows($result) > 0){
            while($adminInfo = mysqli_fetch_assoc($result)){
                $adminFName = $adminInfo['firstName'];
                $adminMName = $adminInfo['middleName'];
                $adminLName = $adminInfo['lastName'];
                $bMonth = $adminInfo['birthMonth'];
                $bDay = $adminInfo['birthDay'];
                $bYear = $adminInfo['birthYear'];
                $gender = $adminInfo['gender'];
                $civilStat = $adminInfo['civilStatus'];
                $cityAddress = $adminInfo['cityAddress'];

                $birthDay = $bMonth."-".$bDay."-".$bYear;
            }
        }


        
        ?>

        <div class="container">

            <div class="row mb-4 mt-2">
                <div class="col-md-6">
                    <div class="form-floating">
                    <input class="form-control form-control-lg" type="text" id="fName" value="<?php echo $adminFName ?>" name="fName" placeholder="Last Name" readonly>
                    <label class="form-label" for="lName">FIRST NAME</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                    <input class="form-control form-control-lg" type="text" id="lName" value="<?php echo  $adminMName ?>" name="lName" placeholder="First Name" readonly>
                    <label class="form-label" for="lName">MIDDLE NAME</label>
                    </div>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="form-floating">
                    <input class="form-control form-control-lg" type="text" id="lName" value="<?php echo $adminLName ?>" name="lastName" placeholder="Last Name" readonly>
                    <label class="form-label" for="lName">LAST NAME</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                    <input class="form-control form-control-lg" type="text" id="fName" value="<?php echo  $birthDay ?>" name="firstName" placeholder="First Name" readonly>
                    <label class="form-label" for="fName">BIRTH DATE</label>
                    </div>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="form-floating">
                    <input class="form-control form-control-lg" type="text" id="lName" value="<?php echo $gender ?>" name="lastName" placeholder="Last Name" readonly>
                    <label class="form-label" for="lName">GENDER</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                    <input class="form-control form-control-lg" type="text" id="fName" value="<?php echo  $civilStat ?>" name="firstName" placeholder="First Name" readonly>
                    <label class="form-label" for="fName">CIVIL STATUS</label>
                    </div>
                </div>
            </div>

            <div class="row mb-4 mt-3">
                <div class="col-md-12">
                    <div class="form-floating">
                    <input class="form-control form-control-lg" type="text" id="lName" value="<?php echo $cityAddress ?>" name="lastName" placeholder="Last Name" readonly>
                    <label class="form-label" for="lName">CITY ADDRESS</label>
                    </div>
                </div>
            </div>

        </div>
    </section>
    
</body>
</html>