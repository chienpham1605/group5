<!DOCTYPE html>
<!--Importance: Have to run this page from EX01_Read.php -->
<?php
#1. Start session
#2. Check session
#3. Connectto database
include_once './DBConnect.php';

#4. Get Item Code from Read
if (!isset($_GET['code'])):
    header("location:Ex01_Read.php");
endif;
$ID = $_GET['code'];

#5. Execute query (for data reading by Item code)
$query = "select * from discount where discount_id = '{$ID}'";
$rs = mysqli_query($conn, $query);
$fields = mysqli_fetch_array($rs);

#6. Check form is sumitted
if (isset($_POST['btnUpdate'])):

#7. Read new data from Input elements
    $ID = $_POST['txtId'];
    $Start = $_POST['txtStart'];
    $End = $_POST['txtEnd'];
    
#8. Execute query (for update)
    $query = "update discount set discount_start = '{$Start}', discount_end = '{$End}' where discount_id = '{$ID}'";
    $rs = mysqli_query($conn, $query);
    if (!$rs):
        error_clear_last();
        echo 'Nothing to Update!';
    endif;
    header("location:Ex01_Read.php");
endif;
#9. Close Connection
mysqli_close($conn);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Read - [CRUD]</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css"/>
    </head>
    <body class="container">
        <h2>Update Item</h2>
        <form method="POST">
            <table class="table table-hover table bordered">
                <tr>
                    <td align="right">ID:</td>
                    <td>
                        <input name="txtId" value="<?= $fields[0] ?>" readonly>
                    </td>
                </tr>
                <tr>
                    <td align="right">Start:</td>
                    <td>
                        <input name="txtStart" value="<?= $fields[4] ?>">
                    </td>
                </tr>
                <tr>
                    <td align="right">End:</td>
                    <td>
                        <input name="txtEnd" value="<?= $fields[5] ?>">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="btnUpdate" value="Update" onclick="return confirm('Are you sure to update Item <?= $fields[0] ?>')">
                    </td>

                </tr>
            </table>
        </form>
    </body>
</html>
