<!DOCTYPE html>
<html lang="en>

    <head>
        <meta charset="UTF-8">
        <title>Courseware Management and Application</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
        <link rel="stylesheet" href="./css/main.css">
        <link rel="stylesheet" href="./css/index.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
        <script type="text/javascript" src="./js/index.js"></script>
    </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-sm student">
                    <button type="submit" onclick="openStudentLogin()" name="btnLogin" class="btn btn-primary btn-block btn-large">Login as Student</button>
                </div>

                <div class="col-sm faculty">
                    <button type="submit" onclick="openFacultyLogin()" name="btnLogin" class="btn btn-primary btn-block btn-large">Login as Faculty</button>
                </div>

                <div class="col-sm admin">
                    <button type="submit" onclick="openAdminLogin()" name="btnLogin" class="btn btn-primary btn-block btn-large">Login as Admin</button>
                </div>
            </div>
        </div>
    </body>