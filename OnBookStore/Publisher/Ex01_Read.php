<!DOCTYPE html>
<?php
#1. Start session
#2. Check session
#3. Connectto database
include_once './DBConnect.php';
#4. Excute query
$query = "select * from publisher";
$rs = mysqli_query($conn, $query);
$count = mysqli_num_rows($rs);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Read - [CRUD]</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css"/>
    </head>
    <body class ="container">
        <h2>Publisher List</h2>
        <p><a href="Ex02_Create.php">New publisher</a></p>
        <table class="table table-hover table bordered">
            <tr>
                <th>ID</th>
                <th>Logo</th>
                <th>Website</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
            <?php
            if ($count == 0):
                echo 'Record not found!';
            else:
                while ($fields = mysqli_fetch_array($rs)):
                    ?>
                    <tr>
                        <td><?= $fields[0] ?></td>
                        <td><?= $fields[1] ?></td>
                        <td><?= $fields[2] ?></td>
                        <td><?= $fields[3] ?></td>
                        <td><?= $fields[4] ?></td>
                        <td><?= $fields[5] ?></td>
                        <td>
                            <a href="Ex03_Update.php?code=<?= $fields[0] ?>">Edit</a>
                        </td>
                    </tr>
            <?php
                endwhile;
            endif;
            ?>
        </table>


    
</body>
</html>