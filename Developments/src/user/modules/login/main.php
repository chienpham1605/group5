<?php
include_once("../../db/DBConnect.php");
include_once("../../db/database.php");
include("../../inc/header.php");
?>
 <div>
 <form method="POST" action="?mod=login&act=auth">

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

        </div>

        <?php
include("../../inc/footer.php");
?>


    

