<?php

# Lưu trữ mảng dữ liệu user
/* Thong tin users:
  ID => id
  Ho va ten => full name
  Ten dang nhap => username
  mat khau -> password
  Email => email
  dob => date of birth
 */
/*
 */
//$list_users = array(
//    1=> array(
//        'id' => 1,
//        'fullname' => 'Minh Cat',
//        'username' => 'tnmcat',
//        'password' => md5('123@123'),
//        'email' => 'truongngocminhcat@gmmail.com',
//        'dob' => '09/08/1996'
//    ),
//    
//    2 => array(
//        'id' => 2,
//        'fullname' => 'Minh Chien',
//        'username' => 'pmchien',
//        'password' => md5('123@123'),
//        'email' => 'phamminhchien@gmail.com',
//        'dob' => '09/05/2001'
//    ),
//
//    3 => array(
//        'id' => 3,
//        'fullname' => 'Phuong Hoa',
//        'username' => 'nphoa',
//        'password' => md5('123@123'),
//        'email' => 'nguyenphuonghoa@gmail.com',
//        'dob' => '26/06/1993'
//    ),
//);

//if($_SERVER['REQUEST_METHOD']== 'POST'){
    include 'DBConnect.php';
    if(isset($_POST['login'])){
        $username=$_POST['name'];
        $password=md5($_POST['pass']);
        
        $sql ="select * from customer where  username ='$username'
                 and password ='$password' ";
        $rs= mysqli_query($conn, $sql);
        if($rs){
            $num =mysqli_num_rows($rs);
            if($num>0){
                echo " Login successful";
            }else{
                echo "Invalid credntials";
            }
        }
    }
//}