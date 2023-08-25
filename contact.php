
<?php include 'sendemail.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form-Online Marriage System</title>
    <link rel="icon" type="image/png" href="https://cdn.pixabay.com/photo/2016/12/26/09/40/bride-1931722_1280.jpg"/>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="css/iofrm-style.css">
    <link rel="stylesheet" type="text/css" href="css/iofrm-theme26.css">

<style>
    

.alert-success{
  z-index: 1;
  background: #D4EDDA;
  font-size: 18px;
  padding: 20px 40px;
  min-width: 420px;
  position: fixed;
  right: 0;
  top: 10px;
  border-left: 8px solid #3AD66E;
  border-radius: 4px;
}

.alert-error{
  z-index: 1;
  background: #FFF3CD;
  font-size: 18px;
  padding: 20px 40px;
  min-width: 420px;
  position: fixed;
  right: 0;
  top: 10px;
  border-left: 8px solid #FFA502;
  border-radius: 4px;
}


    
</style>


</head>
<body>

 <!--alert messages start-->
 <?php echo $alert; ?>
    <!--alert messages end-->

    <div class="form-body">
        <div class="">
            <a href="index.php">
                <div class="logo">
                    <img class="logo-size" src="#" alt="">
                </div>
            </a>
        </div>
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                    <h4><a href="index.php">BACK TO HOME</a></h4>
                    <h2>We’re ready to help you,<br><span>at any moment.</span></h2>
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        
                        <h3>Just fill the form.<br>We’ll get back to you.</h3>
                        <p>Do you have any problem? Or you need help?<br>Or just want to say hi, here you can send us.</p>

                        <!-- form eka start -->
                        <form method="post">
                            <div class="form-row">
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Name" name="name">
                                </div>
                               
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Email" name="email">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <textarea name="message" class="form-control" placeholder="Description..."></textarea>
                                </div>
                            </div>
                            <div class="form-button">

                                <button name="submit" id="submit" type="submit" class="ibtn extra-padding">Send message</button>
                            </div>
                        </form>

                         <!-- form eka end -->
                        <script type="text/javascript">
    if(window.history.replaceState){
      window.history.replaceState(null, null, window.location.href);
    }
    </script>
    <div class="page-links">
                            <a href="index.php">Back to Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <!--contact section end-->

    
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>