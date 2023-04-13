<!DOCTYPE html>
<?php
//1. start session
//2. check session
//3.include class Item
include_once '../Item.php';
$itemObj = new Item();
//4. insert data to database
if(isset($_POST['btnAdd'])):
    $itemObj ->createData($_POST);
endif;
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Replace - [CRUD]</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    </head>
    <body class="container">
        <h2>Add new item</h2>
        <form method="POST">
            <table class ="table table-borderedless">
                <tr align = "right">
                    <td>Code: </td>
                    <td><input name = "txtCode"></td>
                </tr>
                <tr align = "right">
                    <td>Name: </td>
                    <td><input name = "txtName"></td>
                </tr>
                <tr align = "right">
                    <td>Price: </td>
                    <td><input name = "txtPrice"></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type = "submit" name="btnAdd" value="Add new">
                        <input type = "reset" name="btnClear" value="Clear All">
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>
