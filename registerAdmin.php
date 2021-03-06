<?php 
$id = date("Y") . "-" . "01" . substr(hexdec(uniqid()), 12) . date("s");
?>

<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8" http-equiv="Content-Type">
    <title>Admin Registration Form</title>  
    <link rel="icon" href="./assets/images/logo.png">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"/>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://unicons.iconscout.com/release/v3.0.6/css/line.css'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/resgister.css">
    <link rel="stylesheet" href="./css/main.css">
    <script type="text/javascript" src="./js/resgister.js"></script>
</head>
<body>
    <section>
            <div class="container mt-5">
                <form name="officials" method="POST" action="./database/insertDB.php" enctype="multipart/form-data">
                    <input type="hidden" name='adminId' value='<?php echo $id?>'>
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <h1>Admin Registration Form</h1>
                            <h4>Basic Information</h4>
                            <h6>ID: <?php echo $id?></h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2" id="imager">
                            <input type="file" name="official" accept="image/*" capture="camera">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input class="form-control form-control-lg" type="text" id="lName" name="lastName" placeholder="Last Name" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" required>
                                        <label class="form-label" for="lName">LAST NAME</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input class="form-control form-control-lg" type="text" id="fName" name="firstName" placeholder="First Name" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" required>
                                        <label class="form-label" for="fName">FIRST NAME</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input class="form-control form-control-lg" type="text" id="mName" name="middleName" placeholder="Middle Name" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" required>
                                        <label class="form-label" for="mName">MIDDLE NAME</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-3 pt-3">
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <p>
                                            </p>
                                        </div>
                                        <div class="col-md-3">
                                            <h6>BIRTHDATE:
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-floating">
                                        <select class="form-control form-control-lg p-2 pt-3" id="bMonth" name="bMonth" required>
                                            <option selected disabled>--SELECT--</option>
                                            <option value="01">January</option>
                                            <option value="02">February</option>
                                            <option value="03">March</option>
                                            <option value="04">April</option>
                                            <option value="05">May</option>
                                            <option value="06">June</option>
                                            <option value="07">July</option>
                                            <option value="08">August</option>
                                            <option value="09">September</option>
                                            <option value="10">October</option>
                                            <option value="11">November</option>
                                            <option value="12">December</option>
                                        </select>
                                        <label class="form-label" for="bMonth">MONTH</label>    
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-floating">
                                        <select class="form-control form-control-lg p-2 pt-3" id="bDay" name="bDay" required>
                                            <option selected disabled>--SELECT--</option>
                                            <option value="01">01</option>
                                            <option value="02">02</option>
                                            <option value="03">03</option>
                                            <option value="04">04</option>
                                            <option value="05">05</option>
                                            <option value="06">06</option>
                                            <option value="07">07</option>
                                            <option value="08">08</option>
                                            <option value="09">09</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                            <option value="25">25</option>
                                            <option value="26">26</option>
                                            <option value="27">27</option>
                                            <option value="28">28</option>
                                            <option value="29">29</option>
                                            <option value="30">30</option>
                                            <option value="31">31</option>
                                        </select>
                                        <label class="form-label" for="bDay">DAY</label>
                                    </div> 
                                </div>
                                <div class="col-md-3">
                                    <div class="form-floating">
                                        <select class="form-control form-control-lg p-2 pt-3" id="bYear" name="bYear" required>
                                            <option selected disabled>--SELECT--</option>
                                            <option value="2003">2003</option>
                                            <option value="2002">2002</option>
                                            <option value="2001">2001</option>
                                            <option value="2000">2000</option>
                                            <option value="1999">1999</option>
                                            <option value="1998">1998</option>
                                            <option value="1997">1997</option>
                                            <option value="1996">1996</option>
                                            <option value="1995">1995</option>
                                            <option value="1994">1994</option>
                                            <option value="1993">1993</option>
                                            <option value="1992">1992</option>
                                            <option value="1991">1991</option>
                                            <option value="1990">1990</option>
                                            <option value="1989">1989</option>
                                            <option value="1988">1988</option>
                                            <option value="1987">1987</option>
                                            <option value="1986">1986</option>
                                            <option value="1985">1985</option>
                                            <option value="1984">1984</option>
                                            <option value="1983">1983</option>
                                            <option value="1982">1982</option>
                                            <option value="1981">1981</option>
                                            <option value="1980">1980</option>
                                            <option value="1979">1979</option>
                                            <option value="1978">1978</option>
                                            <option value="1977">1977</option>
                                            <option value="1976">1976</option>
                                            <option value="1975">1975</option>
                                            <option value="1974">1974</option>
                                            <option value="1973">1973</option>
                                            <option value="1972">1972</option>
                                            <option value="1971">1971</option>
                                            <option value="1970">1970</option>
                                            <option value="1969">1969</option>
                                            <option value="1968">1968</option>
                                            <option value="1967">1967</option>
                                            <option value="1966">1966</option>
                                            <option value="1965">1965</option>
                                            <option value="1964">1964</option>
                                            <option value="1963">1963</option>
                                            <option value="1962">1962</option>
                                            <option value="1961">1961</option>
                                            <option value="1960">1960</option>
                                            <option value="1959">1959</option>
                                            <option value="1958">1958</option>
                                            <option value="1957">1957</option>
                                            <option value="1956">1956</option>
                                            <option value="1955">1955</option>
                                            <option value="1954">1954</option>
                                            <option value="1953">1953</option>
                                            <option value="1952">1952</option>
                                            <option value="1951">1951</option>
                                            <option value="1950">1950</option>
                                            <option value="1949">1949</option>
                                            <option value="1948">1948</option>
                                            <option value="1947">1947</option>
                                            <option value="1946">1946</option>
                                            <option value="1945">1945</option>
                                            <option value="1944">1944</option>
                                            <option value="1943">1943</option>
                                            <option value="1942">1942</option>
                                            <option value="1941">1941</option>
                                            <option value="1940">1940</option>
                                            <option value="1939">1939</option>
                                            <option value="1938">1938</option>
                                            <option value="1937">1937</option>
                                            <option value="1936">1936</option>
                                            <option value="1935">1935</option>
                                            <option value="1934">1934</option>
                                            <option value="1933">1933</option>
                                            <option value="1933">1933</option>
                                            <option value="1932">1932</option>
                                            <option value="1931">1931</option>
                                            <option value="1930">1930</option>
                                            <option value="1929">1929</option>
                                            <option value="1928">1928</option>
                                            <option value="1927">1927</option>
                                            <option value="1926">1926</option>
                                            <option value="1925">1925</option>
                                            <option value="1924">1924</option>
                                            <option value="1923">1923</option>
                                            <option value="1922">1922</option>
                                            <option value="1921">1921</option>
                                            <option value="1920">1920</option>
                                            <option value="1919">1919</option>
                                            <option value="1918">1918</option>
                                            <option value="1917">1917</option>
                                            <option value="1916">1916</option>
                                            <option value="1915">1915</option>
                                            <option value="1914">1914</option>
                                            <option value="1913">1913</option>
                                            <option value="1912">1912</option>
                                            <option value="1911">1911</option>
                                            <option value="1910">1910</option>
                                            <option value="1909">1909</option>
                                            <option value="1908">1908</option>
                                            <option value="1907">1907</option>
                                            <option value="1906">1906</option>
                                            <option value="1905">1905</option>
                                            <option value="1904">1904</option>
                                            <option value="1903">1903</option>
                                            <option value="1902">1902</option>
                                            <option value="1901">1901</option>
                                            <option value="1900">1900</option>
                                        </select>
                                        <label class="form-label" for="bYear">YEAR</label>    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <select class="form-control form-control-lg p-2 pt-3" id="gender" name="gender" required>
                                    <option selected disabled>--SELECT--</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                                <label class="form-label" for="gender">GENDER</label>    
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <select class="form-control form-control-lg p-2 pt-3" id="cStatus" name="cStatus" required>
                                    <option selected disabled>--SELECT--</option>
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Widowed">Widowed</option>
                                    <option value="Separated">Separated</option>
                                </select>
                                <label class="form-label" for="cStatus">CIVIL STATUS</label>    
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <h4>
                                Contact Information
                            </h4>
                        </div>    
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input class="form-control form-control-lg" rows="3" type="text" id="cityAdd" name="cityAdd" placeholder="cityAdd" required>
                                <label for="cityAdd">CITY ADDRESS</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input class="form-control form-control-lg" type="number" id="mobileNumber" name="mobileNumber" placeholder="mobileNumber" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==11) return false;" required>
                                <label class="form-label" for="mobileNumber">MOBILE NUMBER</label>    
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input class="form-control form-control-lg" type="number" id="homeNumber" name="homeNumber" placeholder="mobileNumber" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==11) return false;" required>
                                <label class="form-label" for="mobileNumber">HOME NUMBER</label>    
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <h4>
                                Account Credentials
                            </h4>
                        </div>    
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input class="form-control form-control-lg" type="text" id="uName" name="uName" placeholder="User Name" required>
                                <label class="form-label" for="uName">USERNAME</label>
                            </div>
                        </div>    
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input class="form-control form-control-lg" type="email" id="email" name="email" placeholder="email" required>
                                <label class="form-label" for="email">E-MAIL ADDRESS</label>    
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input class="form-control form-control-lg" type="password" id="password" name="password" placeholder="Password" required>
                                <label class="form-label" for="psswrd">PASSWORD</label>
                            </div>
                        </div>  
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input class="form-control form-control-lg" type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm Pasword" required>
                                <label class="form-label" for="cPsswrd">CONFIRM PASSWORD</label>
                            </div>
                        </div>
                    </div>                    
                    <center>
                        <div class="row mb-5">
                            <div class="col-md-12">
                                <button type="submit" name="btnRegisterAdmin" onClick="checkValidation()" class="btn btn-primary btn-block btn-large">Register</button>
                            </div>
                        </div>
                    </center>
                </form>
            </div>
        </section>
    </body>
</html>