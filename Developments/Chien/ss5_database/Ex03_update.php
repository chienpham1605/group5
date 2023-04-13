<!DOCTYPE html>
<!--have to run this page from Ex01_read.php-->
<?php
//1. start session
//2. check session
//3.connect to database
include_once '../Item.php';
$itemObj = new Item();
//4. filter data
if (isset($_GET['code'])&&(!empty($_GET['code']))):
    $code = $_GET['code'];
    $field = $itemObj ->filterData($code);

endif;
//4. update data to database
if(isset($_POST['btnUpdate'])):
    $itemObj ->updateData($_POST);
endif;

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Update</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    </head>
    <body class="container">
        <h2>Update item</h2>
        <form method="POST">
            <table class ="table table-borderedless">
                <tr align = "right">
                    <td>Code: </td>
                    <td><input name = "txtCode" readonly value ="<?= $field[0] ?>"></td>
                </tr>
                <tr align = "right">
                    <td>Name: </td>
                    <td><input name = "txtName" value ="<?= $field[1] ?>"></td>
                </tr>
                <tr align = "right">
                    <td>Price: </td>
                    <td><input name = "txtPrice" value ="<?= $field[2] ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type = "submit" name="btnUpdate" value="Update Item"
                        onclick="return confirm('Are you sure to update item <?= $field[0]?>?')"
                               >

                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>
