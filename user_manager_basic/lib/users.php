<?php


function check_login($username, $password) {
//    global $list_users;
    
    if(isset($_POST['btn-login'])){
    
    foreach ($_POST['btn-login'] as $user) {
        if ($username == $user['name'] && md5($password) == $user['pass']) {
            return TRUE;
        }
    }
    
    
    
    return FALSE;
}}

function is_login() {
  if(isset($_SESSION['is_login']))
      return true;
  return false;
}

//return username of login
function user_login() {
    if(!empty($_SESSION['user_login'])){
        return $_SESSION['user_login'];
    }
    return FALSE;
}

function info_user($field ='id') {
//    global $list_users;
    if (isset($_SESSION['is_login'])){
        foreach($list_users as $user){  
            if($_SESSION["user_login"] == $user[ 'name']){
               return $user["fullname"];
            }
        }
    }
    return FALSE;
}
