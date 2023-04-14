<!DOCTYPE html>
<?php
#1. Start session
#2. Check session
#3. Connectto database
include_once './DBConnect.php';
#4. check Form is Submitted?
if (isset($_POST['btnAdd'])):
#5. Read data from input element
    $name = $_POST['txtName'];
    $Description = $_POST['txtDescription'];
    $Percentage = $_POST['txtPercentage'];
    $Strat = $_POST['txtStart'];
    $End = $_POST['txtEnd'];

#6. Execute query
    $query = "insert into discount (discount_name, discount_des, discount_per, discount_start, discount_end) values ('{$name}', '{$Description}', '{$Percentage}', '{$Strat}', '{$End}')";
    $rs = mysqli_query($conn, $query);
    if (!$rs):
        echo 'Nothing to insert!';
    endif;
    header("location:Ex01_Read.php");
endif;
#7. Close Connection
mysqli_close($conn);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Read - [CRUD]</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css"/>

        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

        <script>
             $( function() {
                $( "#start_discount" ).datepicker({
                    prevText:"Last month",
                    nextText:"Next month",
                    dateFormat:"dd/mm/yy",
                    dayNamesMin: ["Mo", "Tu", "We", "Th", "Fr", "Sa", "Su"],
                    discount_start:"slow"
                });
                $( "#end_discount" ).datepicker({
                    prevText:"Last month",
                    nextText:"Next month",
                    dateFormat:"dd/mm/yy",
                    dayNamesMin: ["Mo", "Tu", "We", "Th", "Fr", "Sa", "Su"],
                    discount_start:"slow"
                });
            } );
        </script>
    </head>
    <body class="container">
        <h2>Add New Item</h2>
        <form method="POST">
            <table class="table table-hover table bordered">
                
                <tr>
                    <td align="right">Name:</td>
                    <td>
                        <input name="txtName">
                    </td>
                </tr>
                <tr>
                    <td align="right">Description:</td>
                    <td>
                        <input name="txtDescription">
                    </td>
                </tr>
                <tr>
                    <td align="right">Percentage:</td>  
                    <td>
                        <input name="txtPercentage">
                    </td>
                </tr>
                <tr>
                    <td align="right">Date Start:</td>  
                    <td>
                        <input type="text" name="txtStart" id="start_discount">
                    </td>
                </tr>
                <tr>
                    <td align="right">Date End:</td>  
                    <td>
                        <input type="text" name="txtEnd" id="end_discount">
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="btnAdd" value="Add new">
                        <input type="reset" name="btnClear" value="Clear All">
                    </td>

                </tr>
                
            </table>
        </form>
    </body>
</html>
