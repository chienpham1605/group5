<?php
session_start();
ob_start();

require './data/users.php';
;
require './lib/users.php';

if (isset($_POST['btn-login'])) {
//    $error = array();
    include './data/DBConnect.php';
    //Check username
    if (empty($_POST['name'])) {
        $error['name'] = " username cannot be blank ";
    } else {
        $pattern = '/^[A-Za-z0-9_\.]{6,32}$/';
        if (!preg_match($pattern, $_POST['name'])) {
            $error['name'] = " username  incorrect ";
        } else {
            $username = $_POST['name'];
        }             // replace username to name
    }
    //Check password
    if (empty(md5($_POST['pass']))) {
        $error['pass'] = " password cannot be blank ";
    } else {
        $pattern = '/^[A-Za-z0-9_\.!@#$%^&*()]{6,32}$/';
        if (!preg_match($pattern, md5($_POST['pass']))) {
            $error['pass'] = " password  incorrect ";
        } else {
            $password = md5($_POST['pass']);
        }
    }
    //Conclusion
    if (empty($error)) {
        if (check_login($username, $password)) {
            $_SESSION['is_login'] = true;
            $_SESSION['user_login'] = $username;
            header('Location:index.php');
        } else {
            $error['account'] = " Username or Password doesn't esixt";
        }
    }
}
?>
<!--16.4 #2-->
<html>
    <head>
        <title>Trang dang nhap</title>
<!--        <link href="../public/css/reset.css" rel="stylesheet" type="text/css"/>
        <link href="./public/css/login.css" rel="stylesheet" type="text/css"/>-->
   <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="public/css/bootstrap.min.css">

        <!-- Customizable CSS -->
        <link rel="stylesheet" href="public/css/main.css">
        <link rel="stylesheet" href="public/css/blue.css">
        <link rel="stylesheet" href="public/css/owl.carousel.css">
        <link rel="stylesheet" href="public/css/owl.transitions.css">
        <link rel="stylesheet" href="public/css/animate.min.css">
        <link rel="stylesheet" href="public/css/rateit.css">
        <link rel="stylesheet" href="public/css/bootstrap-select.min.css">

        <!-- Icons/Glyphs -->
        <link rel="stylesheet" href="public/css/font-awesome.css">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Barlow:200,300,300i,400,400i,500,500i,600,700,800" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <div id="wp-form-login" class="col-md-6 col-sm-6 sign-in">
            <h1 class="title_form_login">Login</h1>
            <form id="form-login" action="" method="POST" 
                  class="register-form outer-top-xs" role="form">
                
                   <div class="form-group">
                    <label class="info-title" for="name">Username <span>*</span></label>
                <input type ="text" name="name" id ="name" value ="" placeholder="Username"
                   class ="  form-control unicase-form-control text-input"  />
                <?php
                if (!empty($error['name'])) {
                    ?>
                    <p class="error"><?php echo $error['name'] ?></p>
                    <?php
                }
                ?>
                    </div>
                <div class="form-group">
                    <label class="info-title" for="pass">Password <span>*</span></label>
                <input type ="password" name="pass" id="pass"  value ="" placeholder="Password"
                       class="form-control unicase-form-control text-input" 
                       />
                <?php
                if (!empty($error['pass'])) {
                    ?>
                    <p class="error"><?php echo $error['pass'] ?></p><!-- comment -->
                    <?php
                }
                ?>
                    </div>
                <button type ="submit" id="btn-login" name="btn-login"  value ="Login" 
                       class="btn-upper btn btn-primary checkout-page-button">Login </button>
                <?php
                if (!empty($error['account'])) {
                    ?>
                    <p class="error"><?php echo $error['account'] ?></p>
                    <?php
                }
                ?>
            </form>
            <a href="" id ="lost-pass" class="forgot-password pull-right">Forget Password?</a>
        </div>


        <!-- Sign-in -->			
<!--        <div class="col-md-6 col-sm-6 sign-in">
            <h4 class="">Sign in</h4>
            <p class="">Hello, Welcome to your account.</p>
            <form class="register-form outer-top-xs" role="form">
                <div class="form-group">
                    <label class="info-title" for="name">Username <span>*</span></label>
                    <input type="text" name ="name" id="name"class="form-control unicase-form-control text-input"  >
                </div>
                <div class="form-group">
                    <label class="info-title" for="pass">Password <span>*</span></label>
                    <input type="password"  name ="pass" id="pass" class="form-control unicase-form-control text-input" >
                </div>
                <div class="radio outer-xs">
                    <label>
                        <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Remember me!
                    </label>
                    <a href="#" class="forgot-password pull-right">Forgot your Password?</a>
                </div>
                <button type="submit" id="btn-login" name="btn-login" value ="Login" class="btn-upper btn btn-primary checkout-page-button">Login</button>
            </form>					
        </div>-->
        <!-- Sign-in -->
        
    <!-- JavaScripts placed at the end of the document so the pages load faster --> 
    <script src="public/js/jquery-1.11.1.min.js"></script> 
    <script src="public/js/bootstrap.min.js"></script> 
    <script src="public/js/bootstrap-hover-dropdown.min.js"></script> 
    <script src="public/js/owl.carousel.min.js"></script> 
    <script src="public/js/echo.min.js"></script> 
    <script src="public/js/jquery.easing-1.3.min.js"></script> 
    <script src="public/js/bootstrap-slider.min.js"></script> 
    <script src="public/js/jquery.rateit.min.js"></script> 
    <script type="text/javascript" src="public/js/lightbox.min.js"></script> 
    <script src="public/js/bootstrap-select.min.js"></script> 
    <script src="public/js/wow.min.js"></script> 
    <script src="public/js/scripts.js"></script>
    </body>
</html>



