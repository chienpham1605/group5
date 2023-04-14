<!DOCTYPE html>
<?php
#1. Start session
#2. Check session
#3. Connectto database
include_once './DBConnect.php';
#4. Excute query
$query = "select * from discount";
$rs = mysqli_query($conn, $query);
$count = mysqli_num_rows($rs);


// $time_input = strtotime("14/04/2023"); 
// $date_input = getDate($time_input); 
// print_r($date_input);                

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Read - [CRUD]</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css"/>
    </head>
    <body class ="container">
        <h2>discount List</h2>
        <p><a href="Ex02_Create.php">New discount</a></p>
        <table class="table table-hover table bordered">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Percentage</th>
                <th>Start</th>
                <th>End</th>
                <th>Status</th>
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
                            <!-- <?= $fields[6] ?> -->
                            
                        </td>
                        <td>
                            <a href="Ex03_Update.php?code=<?= $fields[0] ?>">Edit</a>   |
                            <a href="Ex04_Delete.php?code=<?= $fields[0] ?>"
                               onclick="return confirm('Are you sure to delete Item <?= $fields[0] ?>')">Delete</a>
                        </td>
                    </tr>
            <?php
                endwhile;
            endif;
            ?>
        </table>


    
</body>
</html>