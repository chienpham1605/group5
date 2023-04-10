<?PHP
require_once './data/DBConnect.php';
require './lib/users.php';
//$rs = mysqli_query($conn, $query);
//$count = mysqli_num_rows($rs);

if (isset($_POST["btn_submit"])) {
    //isset de kiem tra button co name la btn_submit da duoc click hay chua
//    $id = $_POST["id"];
    $username = $_POST["name"];
    $password = md5($_POST["pass"]);
    $cpassword = md5($_POST["cpass"]);
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $gender = $_POST["gender"];
    // lấy thông tin tu cac form bang phuong thuc POST
    //$_POST lây gia tri the thong qua name"" - chu khong phai id"" 
    if ($username == "" || $password == "" || $cpassword == "" || $email == "" || $phone == "" || $address == "" || $gender == "") {
        echo " Ban vui long nhap day du thong tin";
    } else {
        // Kiem tra tai khoan da ton tai chua
        $sql = "select * from customer  where name= '$username' ";
        $rs = mysqli_query($conn, $sql);

        if (mysqli_num_rows($rs) > 0) {
            echo "Account already exist";
        } else {
            if ($password === $cpassword) {
                // thuc hien viec luu tru du lieu vao db      
                $sql = "INSERT INTO customer(
             name, pwd,email, phone,address,gender) VALUES (
                                       
                                        '{$username}',
                                        '{$password}',
                                        '{$email}',
                                        '{$phone}',
                                        '{$address}',
                                        '{$gender}')";
                // thuc thi cau $sql vao bien conn lay tu file DBConnect.php                            
                mysqli_query($conn, $sql);

                echo " Signup Successfull";
            } else {
                echo "Password didn't match";
            }
        }
    }
}
?>
<html>
    <head>
        <title>EduBook - Hãy đăng ký thành viên nào !!!</title>
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
    <?php
    require './lib/template.php';
    get_header();
    ?>
    <body class="cnt-home">

        <!-- Sign-in -->			
        <div class="col-md-6 col-sm-6 sign-in">
            <h4 class="">Sign in</h4>
            <p class="">Hello, Welcome to your account.</p>
            <form class="register-form outer-top-xs" role="form">
                <div class="form-group">
                    <label class="info-title" for="name">Username <span>*</span></label>
                    <input type="text" name ="name" id="name"class="form-control unicase-form-control text-input"  >
                </div>
                <div class="form-group">
                    <label class="info-title" for="pass">Password <span>*</span></label>
                    <input type="password"  ame ="pass" id="pass" class="form-control unicase-form-control text-input" >
                </div>
                <div class="radio outer-xs">
                    <label>
                        <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Remember me!
                    </label>
                    <a href="#" class="forgot-password pull-right">Forgot your Password?</a>
                </div>
                <button type="submit" id="btn-login" name="btn-login" value ="Login" class="btn-upper btn btn-primary checkout-page-button">Login</button>
            </form>					
        </div>
        <!-- Sign-in -->
        <form action="register.php" method="post">
            <div class="col-md-6 col-sm-6 create-new-account">
                <h4 class="checkout-subtitle">Create a new account</h4>
                <p class="text title-tag-line">Create your new account.</p>
                <form class="register-form outer-top-xs" role="form">
                    <div class="form-group">
                        <label class="info-title" for="name">User Name <span>*</span></label>
                        <input type="text" name ="name" class="form-control unicase-form-control text-input" id="name" >
                    </div>
                    <div class="form-group">
                        <label class="info-title" for="pass">Password <span>*</span></label>
                        <input type="password" name ="pass"class="form-control unicase-form-control text-input" id="pass" >
                    </div>
                    <div class="form-group">
                        <label class="info-title" for="cpass">Confirm Password <span>*</span></label>
                        <input type="password" name ="cpass" class="form-control unicase-form-control text-input" id="cpass" >
                    </div>
                    <div class="form-group">
                        <label class="info-title" for="email">Email <span>*</span></label>
                        <input type="email" name ="email" class="form-control unicase-form-control text-input" id="email" >
                    </div>
                    <div class="form-group">
                        <label class="info-title" for="phone">Phone Number <span>*</span></label>
                        <input type="text" name ="phone" class="form-control unicase-form-control text-input" id="phone" >
                    </div>
                    <div class="form-group">
                        <label class="info-title" for="address"> Address <span>*</span></label>
                        <input type="text" name ="address" class="form-control unicase-form-control text-input" id="address" >
                    </div>
                    <div class="form-group">
                        <label class="info-title" for="gender">Gender <span>*</span></label>
                        <input type="radio" class="form-control unicase-form-control text-input" value="1"name="gender" checked>Male
                        <input type="radio" class="form-control unicase-form-control text-input" value="0"name="gender" > Female
                    </div>

                    <button type="submit" name ="btn_submit" value ="Register" class="btn-upper btn btn-primary checkout-page-button">Sign Up</button>


                    <div class="text-center">
                        <a class="font-weight-bold small" href="login.php">Already have an account?</a>
                    </div>
                    <div class="text-center">
                        <a class="font-weight-bold small" href="index.php">Return your page!</a>
                    </div>
            </div>
        </form>

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



