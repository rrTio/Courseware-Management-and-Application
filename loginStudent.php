<!DOCTYPE html>
<html lang="en" >
  <head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="./css/main.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
    <script src="./js/login.js" type="text/javascript"></script>
  </head>
  <body>
    <div class="login">
      <h1>Student Login</h1>
      <form action="./database/loginDB.php" method="post">
        <input type="text" name="usernameStudent" placeholder="Username or Email" required="required" />
        <input type="password" name="passwordStudent" placeholder="Password" required="required" />
        <button type="submit" name="btnLoginStudent" class="btn btn-primary btn-block btn-large">Enter</button>
        <center class="marginButton">
          <a id="forgotPassword" onClick="return forgotPassword()">Forgot password?</a>
        </center>
        <center class="marginButton">
          <a id="createAccount" onClick="return createAccountStudent()">Create Account</a>
        </center>
      </form>
    </div>
  </body>
</html>