<?php 
include("../../db/DBConnect.php");
include("../../db/database.php");
include_once("../../lib/users.php");

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
        
        <div class="col-md-3"></div>         
        <div class="col-md-6 col-sm-6 sign-in">
            
            <div id="wp-form-login" class=" sign-in">
            <h1 class="title_form_login">Login</h1>
            <form id="form-login" action="" method="POST" 
                  class="register-form outer-top-xs" role="form">

                    <div class="form-group">
                        <label class="info-title" for="name">Username <span>*</span></label>
                        <input type ="text" name="name" id ="name" value ="" placeholder="Username"
                            class ="form-control text-input"  />
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
                            class="form-control text-input" 
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
                        if (!empty($error['common'])) {
                            ?>
                    <p class="error"><?php echo $error['common'] ?></p>
                    <?php
                }
                ?>
           </form>
            <!-- <a href="" id ="lost-pass" class="forgot-password pull-right">Forget Password?</a> -->
        </div>
    </div>
    </div><!-- create a new account --></div><!-- /.row -->
    </div><!-- /.sign-in-->
</div><!-- /.body-content -->

<?php 
include("../../inc/footer.php");
?>