<?php
session_start();
# Process logout

unset ($_SESSION['is_login']);


unset ($_SESSION['user_login']);

header('Location:index.php');
