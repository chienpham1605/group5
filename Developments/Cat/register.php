<?PHP
require_once './data/DBConnect.php';
//$rs = mysqli_query($conn, $query);
//$count = mysqli_num_rows($rs);

if (isset($_POST["btn_submit"])) {
    //isset de kiem tra button co name la btn_submit da duoc click hay chua
//    $id = $_POST["id"];
    $username = $_POST["name"];
    $password = md5($_POST["pass"]);
    $cpassword = md5(_POST["cpass"]);
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    //    $gender = $_POST["gender"];
    // lấy thông tin tu cac form bang phuong thuc POST
    //$_POST lây gia tri the thong qua name"" - chu khong phai id"" 
    if ($username == "" || $password == "" || $cpassword == "" || $email == "" || $phone == "" || $address == "") {
        echo " Ban vui long nhap day du thong tin";
    } else {
        // Kiem tra tai khoan da ton tai chua
        $sql = "select * from customer  where name= '$username' ";
        $rs = mysqli_query($conn, $sql);

        if (mysqli_num_rows($rs) > 0) {
            echo "Account already exist!!";
        } else {
            if ($password === $cpassword) {
                // thuc hien viec luu tru du lieu vao db      
                $sql = "INSERT INTO customer(
             name, pwd,email, phone,address) VALUES ('{$username}',
                                        '{$password}',
                                        '{$email}',
                                        '{$phone}',
                                        '{$address}')";

                // thuc thi cau $sql vao bien conn lay tu file DBConnect.php                            
                mysqli_query($conn, $sql);
                echo " Signup Successfull";
            } else {
                echo "Password didn't match";
            }
        }
    }
}
?>
<html>

<head>
    <title> OnBookStore- Hãy đăng ký thành viên nào !!!</title>
    <link href="../public/css/reset.css" rel="stylesheet" type="text/css" />
    <link href="./public/css/register.css" rel="stylesheet" type="text/css" />
</head>


<body>
    <form action="register.php" method="post">
        <div id="wp-form-register">
            <h1 class="title_form_register">Form Register</h1>
            <td>User Name:</td>
            <input type="text" name="name" id="name" placeholder="Enter UserName" />
            <p></p>
            <td>Password:</td>
            <input type="password" name="pass" id="pass" placeholder="Enter Password" />
            <p></p>
            <td>Confirm Password:</td>
            <input type="password" name="cpass" id="cpass" placeholder="Enter Confirm Password" />
            <p></p>
            <td>Email:</td>
            <input type="email" name="email" id="email" placeholder="Enter your email" />
            <p></p>
            <td>Phone:</td>
            <input type="text" name="phone" id="name" placeholder="Enter your phone number" />
            <p></p>
            <td>Address:</td>
            <input type="text" id="address" name="address" placeholder="Enter your Adress">

            <tr>
                <td><input type="submit" name="btn_submit" value="Register" </td>
            </tr>
            <div class="text-center">
                <a class="font-weight-bold small" href="login.php">Already have an account?</a>
            </div>
            <div class="text-center">
                <a class="font-weight-bold small" href="index.php">Return your page!</a>
            </div>
        </div>
    </form>
</body>

</html>
<!--             
                <tbody>

                    <tr>
                        <td>Name:</td>
                        <td><input type ="text" id="name" name ="name"</td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td><input type ="password" id="pass" name="pass"</td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td><input type ="email" id="email" name="email"</td>
                    </tr>
                </tbody>
                <tbody>
                    <tr>
                        <td>Phone:</td>
                        <td><input type ="text" id="phone" name ="phone"</td>
                    </tr>
                    <tr>
                        <td>Address:</td>
                        <td><input type ="text" id="address" name="address"</td>
                    </tr>
                    <tr>
                        <td ><input type ="submit" name="btn_submit"  value ="Register"</td>
                    </tr>
                       <a class="font-weight-bold small" href="login.php">Already have an account?</a>
                  </div>
                  <div class="text-center">
                    <a class="font-weight-bold small" href="index.php">Return your page!</a>
                  </div>
                </tbody>
                
              
            </table>-->