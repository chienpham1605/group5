<!DOCTYPE html>
<?php
//1. start session
//2. check session
//3.include class Item
include_once '../Item.php';
$itemObj = new Item();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Read - [CRUD]</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    </head>
    <body class="container">
        <?php
        if (isset($_GET['msgCreate'])):
            echo '<div class="alert alert-success">Insert data succesful</div>';
        endif;
        if (isset($_GET['msgUpdate'])):
            echo '<div class="alert alert-warning">Update data succesful</div>';
        endif;
        if (isset($_GET['msgDelete'])):
            echo '<div class="alert alert-danger">Delete data succesful</div>';
        endif;
        ?>
        <h2>Item List</h2>
        <p><a href="Ex02_add.php">Add New Item</a></p>
        <table class="table table-bordered table-hover">
            <tr>
                <th>Item code</th>  
                <th>Name</th>  
                <th>Price</th>  
                <th>Function</th>                  
            </tr>
            <?php
            $data = $itemObj->readData();
            foreach ($data as $field):
                ?>
                <tr>
                    <td><?= $field[0] ?></td>
                    <td><?= $field[1] ?></td>
                    <td><?= $field[2] ?></td>
                    <td>
                        <a href="Ex03_update.php?code=<?= $field[0] ?>">Edit</a>
                        <a href="Ex04_delete.php?code=<?= $field[0] ?>" 
                           onclick="return confirm('Are you sure to update item <?= $field[0] ?>?')">
                            Delete</a>
                    </td>
                </tr>
    <?php
endforeach;
?>
        </table>

    </body>
</html>
