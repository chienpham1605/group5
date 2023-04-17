<?php
//require '../lib/template.php';
get_header();
?>

<div id ="content">
            <h1> Trang chu </h1>
        </div> 
        <?php
show_array($_SESSION);
        echo $_SESSION['name'];

        ?>
<?php
get_footer();
?>

