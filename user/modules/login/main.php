<!DOCTYPE html>
<?php

if (isset($_POST['btnLogin'])):
//4. read data form element
    $user = $_POST['txtName'];
    $pass = $_POST['txtPassword'];

//5. excute query
    // $query = "select * from onbookstore_db where name ='{$user}' and pwd='{$pass}'";

    $row = db_fetch_row("SELECT * FROM `customer` WHERE `name` LIKE '{$user}' AND `pwd` LIKE '{$pass}'");
    $count = db_fetch_row("SELECT * FROM `customer` WHERE `name` LIKE '{$user}' AND `pwd` LIKE '{$pass}'");
//    echo '<pre>';
//    print_r($row);
//    die;
    
    if ($count > 0):

//6. set username to session
//        $_SESSION['sesAdmin'] = $row;
        $_SESSION['auth'] =  $row;
    
show_array($_SESSION['auth']);
// die();
//7. redirect to Ex01_read.php
        redirect("?mod=cart&act=show");
        

//8. back to login if error
    else:
        header("Location: Login.php?errLogin");
    endif; //if count
endif;
?>
<!-- <html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    </head>
    <body class="container"> -->
<?php
// show mess if error
if (isset($_GET['errLogin'])):
    echo '<div class="alert alert-danger">Wrong username or password</div>';
endif;
?>

        <form method="POST">

            <div class="form-group">
                <label for="email">Enter username:</label>
                <input class="form-control" placeholder="Enter username" name="txtName">
            </div>
            <div class="form-group">
                <label for="pwd">Enter password:</label>
                <input type="password" class="form-control" placeholder="Enter password" name="txtPassword">
            </div>
            <div class="form-group form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox"> Remember me
                </label>
            </div>
            <button type="submit" class="btn btn-primary" name = "btnLogin">Submit</button>
        </form>
    <!-- </body>
</html> -->
