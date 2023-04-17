<?php

# Process logout
unset ($_SESSION['is_login']);
unset ($_SESSION['user_login']);


redirect('register.php');