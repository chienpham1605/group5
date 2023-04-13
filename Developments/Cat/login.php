<?php
session_start();
ob_start();

require './data/DBConnect.php';
require  './lib/users.php';

if(isset($_POST['btn-login'])){
    $error = array();
    //Check username
 if (empty($_POST['username'])){
        $error['username'] = " username cannot be blank ";
    }else{
        $pattern = '/^[A-Za-z0-9_\.]{6,32}$/';
        if (!preg_match($pattern, $_POST['username'])) {
                $error['username'] = " username  incorrect ";
        }else{
            $username= $_POST['username'];
        }             
    }
     //Check password
    if (empty($_POST['password'])){
        $error['password'] = " password cannot be blank ";
    }else{
        $pattern = '/^[A-Za-z0-9_\.!@#$%^&*()]{6,32}$/';
        if (!preg_match($pattern, $_POST['password'])) {
                $error['password'] = " password  incorrect ";
        }else{
            $password= $_POST['password'];
        }             
    }
    //Conclusion
    if(empty($error)){
       if(check_login($username, $password )){
           $_SESSION['is_login'] = true;
           $_SESSION['user_login'] = $username;
           header('Location:index.php');
       } else{
           $error['account'] =" Username or Password doesn't esixt";
       }
    
}
}
?>
<!--16.4 #2-->
<html>
    <head>
        <title>Trang dang nhap</title>
        <link href="../public/css/reset.css" rel="stylesheet" type="text/css"/>
        <link href="./public/css/login.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div id="wp-form-login">
            <h1 class="title_form_login">Login</h1>
            <form id="form-login" action="" method="POST">
            <input type ="text" name="username" id ="username" value ="" placeholder="Username" />
            <?php
            if(!empty($error['username'])){
                ?>
            <p class="error"><?php echo $error['username']?></p>
            <?php
            }
                ?>
            <input type ="password" name="password" id="password"  value ="" placeholder="Password" />
          <?php
            if(!empty($error['password'])){
                ?>
            <p class="error"><?php echo $error['password']?></p><!-- comment -->
            <?php
            }
                ?>
            <input type ="submit" id="btn-login" name="btn-login" value ="Đăng nhập"  />
            <?php
            if(!empty($error['account'])){
                ?>
            <p class="error"><?php echo $error['account']?></p><!-- comment -->
            <?php
            }
                ?>
            </form>
            <a href="" id ="lost-pass">Forget Password?</a>
        </div>
    </body>
</html>



