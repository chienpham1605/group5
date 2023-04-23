<?php
session_start();

require_once  '../../db/DBConnect.php';
$info_user = $_SESSION['user_login'];
$emailerror = "";
  
if (isset($_POST['btn-update'])):
    $id = $_POST['id'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];

    $query = "update customer set email = '{$email}', phone = '{$phone}', address = '{$address}', gender='{$gender}'  where id = '{$id}'";
    echo $query;
    $rs = mysqli_query($conn, $query);

    if (!$rs) {
        error_clear_last();
        die("Nothing to update!");
    }
    $query = "SELECT * FROM customer WHERE id = '{$id}'";
     $rs = mysqli_query($conn, $query);
   $num = mysqli_fetch_assoc($rs);
   $_SESSION['user_login'] = $num;
    header('location: show-info.php');

    #9. Close connection
    mysqli_close($conn);
endif;
?>
<?php
  include("../../inc/header.php");
?>
    <body class="cnt-home">
        <div class="body-content">
            <div class="container">
                <div class="sign-in-page">
                    <div class="row">

                        <form action="show-info.php" method="post">
                            <div class="col-md-6 col-sm-6 create-new-account">
                                <h4 class="checkout-subtitle">Info User</h4>
                                <form class="register-form outer-top-xs" role="form">
                                    <div class =" form-group">
                                        <input type ="hidden" value=" <?php echo $info_user['id'] ?>" name ="id">
                                    </div>
                                    <div class="form-group" >
                                        <label class="info-title" for="name">Name <span></span></label>
                                        <input type="text" name ="name" class="form-control unicase-form-control text-input" id="id"  value=" <?php echo$info_user['name'] ?>" readonly="">
                                    </div>
                                    <div class="form-group">
                                        <label class="info-title" for="email">Email <span></span></label>
                                        <input type="email" name ="email" class="form-control unicase-form-control text-input" id="email" value="<?php echo$info_user['email'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="info-title" for="phone">Phone Number <span></span></label>
                                        <input type="text" name ="phone" class="form-control unicase-form-control text-input" id="phone" value=" <?php echo$info_user['phone'] ?>" >
                                    </div>
                                    <div class="form-group">
                                        <label class="info-title" for="address"> Address <span></span></label>
                                        <input type="text" name ="address" class="form-control unicase-form-control text-input" id="address" value=" <?php echo$info_user['address'] ?>" >
                                    </div>
                                    <div class="form-group">
                                        <label class="info-title" for="gender">Gender <span></span></label>

                                        <input <?php if ($info_user ['gender'] == 1) echo 'checked'; ?> type="radio" class="form-control unicase-form-control text-input" value="1"name="gender" >Male
                                        <input <?php if ($info_user ['gender'] == 0) echo 'checked'; ?> type="radio" class="form-control unicase-form-control text-input" value="0"name="gender"  > Female 
                                    </div>

                                    <button type="submit" name ="btn-update" value ="Update" class="btn-upper btn btn-primary checkout-page-button"
                                            ">Edit</button>
                                     <button type="submit" name ="btn_resetpass" value ="resetpass" class="btn-upper btn btn-primary checkout-page-button">Reset Password</button>       
                            </div>
                        </form>

                    </div><!-- create a new account --></div><!-- /.row -->
            </div><!-- /.sign-in-->
        </div><!-- /.body-content -->
<?php
  include("../../inc/footer.php");
?>

