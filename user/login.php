<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (isset($_POST['login'])) {
    $mobno = $_POST['mobno'];
    $password = md5($_POST['password']);
    
    $sql = "SELECT ID, user_type FROM tbluser WHERE MobileNumber=:mobno and Password=:password";
    $query = $dbh->prepare($sql);
    $query->bindParam(':mobno', $mobno, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $_SESSION['omrsuid'] = $result['ID'];
        $_SESSION['login'] = $_POST['mobno'];

        $user_type = $result['user_type'];
        if ($user_type == 'user' || $user_type === NULL){
            header("Location: dashboard.php");
            exit();
        } elseif ($user_type == 'admin') {
            header("Location: ../admin/dashboard.php");
            exit();
        } else {
            echo "<script>alert('Invalid User Type');</script>";
        }
    } else {
        echo "<script>alert('Invalid Details');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Marriage Registration System||Sign in page</title>
    <link rel="icon" type="image/png" href="https://cdn.pixabay.com/photo/2016/12/26/09/40/bride-1931722_1280.jpg" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="css/iofrm-style.css">
    <link rel="stylesheet" type="text/css" href="css/iofrm-theme15.css">
</head>

<body>
    <div class="form-body">
        <div class="website-logo">
            <a href="../index.php">
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="white" class="bi bi-house-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                        <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                    </svg>
                </div>
            </a>
        </div>
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                    <h3>BACK TO HOME</h3>

                    <p><br><br>
                        "Every heart sings a song, incomplete, until another heart whispers back. Those who wish to sing always find a song. At the touch of a lover, everyone becomes a poet."</p>
                    <img src="images/graphic1.svg" alt="">

                    <!-- <p style="font-size: 8px;">Copyright © 2020. Online Marriage Registration System</p> -->
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <div class="page-links">
                            <div class="">

                            </div>
                            <a href="login.php" class="active">Login</a><a href="register.php">Register</a>
                        </div>
                        <form action="" method="post">
                            <input type="text" class="form-control" placeholder="Mobile Number" required="true" name="mobno" maxlength="10" pattern="[0-9]+">
                            <input type="password" class="form-control" placeholder="Password" name="password" required="false" value="">
                            <div class="form-button">
                                <button id="submit" type="submit" class="ibtn" name="login">Login</button> <a href="forgot-password.php">Forget password?</a>
                                <br><br> <a href="register.php">Not registered yet Click here for registration </a><br>
                            </div>
                        </form>
                        <div class="other-links">
                            <span>Or login with</span><a href="#"><i class="fab fa-facebook-f"></i></a><a href="#"><i class="fab fa-google"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="lib/jquery/jquery.js"></script>
    <script src="lib/popper.js/popper.js"></script>
    <script src="lib/bootstrap/bootstrap.js"></script>
    <script src="lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>

    <script src="js/amanda.js"></script>
</body>

</html>