<?php 
include("../../db/DBConnect.php");
include("../../db/database.php");
include_once("../../lib/users.php");

if (isset($_POST["btn_submit"])) {
    register();
}
if (isset($_POST['btn-login'])) {
    $error = login();
}

?>
<?php 
include("../../inc/header.php");
?>

<div class="body-content">
    <div class="container">
        <div class="sign-in-page">
        <div class="row">

                        <!-- Sign-in -->
                        <form action="register.php" method="post">
                        <div class="col-md-3"></div>
                            <div class="col-md-6 col-sm-6 create-new-account">
                                <h4 class="checkout-subtitle">Create a new account</h4>
                                <p class="text title-tag-line">Create your new account.</p>
                                <form class="register-form outer-top-xs" role="form">
                                    <div class="form-group">
                                        <label class="info-title" for="name">User Name <span>*</span></label>
                                        <input type="text" name ="name" class="form-control text-input" id="name" >
                                    </div>
                                    <div class="form-group">
                                        <label class="info-title" for="pass">Password <span>*</span></label>
                                        <input type="password" name ="pass"class="form-control text-input" id="pass" >
                                    </div>
                                    <div class="form-group">
                                        <label class="info-title" for="cpass">Confirm Password <span>*</span></label>
                                        <input type="password" name ="cpass" class="form-control text-input" id="cpass" >
                                    </div>
                                    <div class="form-group">
                                        <label class="info-title" for="email">Email <span>*</span></label>
                                        <input type="email" name ="email" class="form-control text-input" id="email" >
                                    </div>
                                    <div class="form-group">
                                        <label class="info-title" for="phone">Phone Number <span>*</span></label>
                                        <input type="text" name ="phone" class="form-control text-input" id="phone" >
                                    </div>
                                    <div class="form-group">
                                        <label class="info-title" for="address"> Address <span>*</span></label>
                                        <input type="text" name ="address" class="form-control text-input" id="address" >
                                    </div>
                                    <div class="form-group">
                                        <label class="info-title" for="gender">Gender <span>*</span></label>
                                        <input type="radio" class="form-control  unicase-form-control text-input" value="1"name="gender" checked>Male
                                        <input type="radio" class="form-control  unicase-form-control text-input" value="0"name="gender" > Female
                                    </div>

                                    <button type="submit" name ="btn_submit" value ="Register" class="btn-upper btn btn-primary checkout-page-button">Sign Up</button>


                            </div>

                        </form>
                    </div><!-- create a new account --></div><!-- /.row -->
    </div><!-- /.sign-in-->
</div><!-- /.body-content -->
<?php 
include("../../inc/footer.php");
?>