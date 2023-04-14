<!DOCTYPE html>
<!--Importance: Have to run this page from EX01_Read.php -->
<?php
#1. Start session
#2. Check session
#3. Connectto database
include_once './DBConnect.php';
$phoneErr = $urlErr = $emailErr = "";
$Phone = $LinkWeb = $Email = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["txtPhone"])) {
        $phoneErr = "Phone number is required";
      } else {
        $Phone = test_input($_POST["txtPhone"]);
        if (!preg_match("/^[0-9]{8,12}$/", $Phone)) {
          $phoneErr = "Invalid phone number";
        }
    }
    // Website
    if (empty($_POST["txtLinkWeb"])) {
        $urlErr = "URL is required";
    } elseif(!filter_var($_POST["txtLinkWeb"], FILTER_VALIDATE_URL)) {
        $urlErr = "Invalid Url";
    }else {
        $LinkWeb = test_input($_POST["txtLinkWeb"]);
    }
    // Email
    if (empty($_POST["txtEmail"])) {
        $emailErr = "Email is required";
    } elseif(!filter_var($_POST["txtEmail"], FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid Email";
    }else {
        $Email = test_input($_POST["txtEmail"]);
    }

}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
#4. Get Item Code from Read
if (!isset($_GET['code'])):
    header("location:Ex01_Read.php");
endif;
$ID = $_GET['code'];

#5. Execute query (for data reading by Item code)
$query = "select * from publisher where publisher_id = '{$ID}'";
$rs = mysqli_query($conn, $query);
$fields = mysqli_fetch_array($rs);

#6. Check form is sumitted
if (isset($_POST['btnUpdate'])):

#7. Read new data from Input elements
$Logo = $_POST['txtLogo'];
$LinkWeb = $_POST['txtLinkWeb'];
$Phone = $_POST['txtPhone'];
$Email = $_POST['txtEmail'];
$Address = $_POST['txtAddress'];

if(isset($_FILES['txtLogo'])):
    #1. Process Image value:
    $msgErr     = [];
    $folder     = "Images/";
    $fileName   = $_FILES["txtLogo"]["name"];
    $fileTmp    = $_FILES["txtLogo"]["tmp_name"];
    $Logo       = $folder.$fileName;
    #---------------------------------#
    $fileSize   = $_FILES['txtLogo']['size'];
    $fileType   = $_FILES['txtLogo']['type'];
    $fileExt    = pathinfo($Logo,PATHINFO_EXTENSION);
    
    #2. //Upload image into folder in server
    $allowTypes   = array("jpg","png", "txt");
  
    if(!in_array($fileExt,$allowTypes)):
        $msgErr[]="Incorrect extension, please choose a JPG, PNG or TXT.";
    endif;
  
    if($fileSize > 2097152):
        $msgErr[]='File size has to be less than 2 MB';
    endif;
  
    if(empty($msgErr)):
        move_uploaded_file($fileTmp, $Logo);
        echo '<div class="alert alert-info">';
        echo 'Folder: '     .$folder    . '<br>';
        echo 'File name: '  . $fileName . '<br>';
        echo 'File tmp: '   . $fileTmp  . '<br>';
        echo 'Logo: '       . $Logo     . '<br>';
        echo 'File size: '  . $fileSize . '<br>';
        echo 'File type: '  . $fileType . '<br>';
        echo 'File Ext: '   . $fileExt  . '<br>';
        echo '</div>';
    else:
        echo '<div class="alert alert-info">';
        print_r($msgErr);
        echo '</div>';
    endif;
endif;
    
#8. Execute query (for update)
if (empty($phoneErr) && empty($urlErr) && empty($emailErr)) :
    $query = "update publisher set publisher_logo = '{$Logo}', publisher_web = '{$LinkWeb}', publisher_phone = '{$Phone}', publisher_email = '{$Email}', publisher_address = '{$Address}' where publisher_id = '{$ID}'";
    $rs = mysqli_query($conn, $query);
    if (!$rs):
        error_clear_last();
        echo 'Nothing to Update!';
    endif;
    header("location:Ex01_Read.php");
endif;
endif;
#9. Close Connection
mysqli_close($conn);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Read - [CRUD]</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css"/>
    </head>
    <body class="container">
        <h2>Update Item</h2>
        <form method="POST">
            <table class="table table-hover table bordered">
                <tr>
                    <td align="right">ID:</td>
                    <td>
                        <input name="txtId" value="<?= $fields[0] ?>" readonly>
                    </td>
                </tr>
                <tr>
                    <td align="right">Logo:	</td>
                    <td>
                        <input type="file" name="txtLogo" value="<?= $fields[1] ?>">
                    </td>
                </tr>
                <tr>
                    <td align="right">Website:	</td>
                    <td>
                        <input name="txtLinkWeb" value="<?= $fields[2] ?>">
                        <span class="error"> <?php echo $urlErr; ?></span>
                    </td>
                </tr>
                <tr>
                    <td align="right">Phone: </td>
                    <td>
                        <input name="txtPhone" value="<?= $fields[3] ?>">
                        <span class="error"> <?php echo $phoneErr; ?></span>

                    </td>
                </tr>
                <tr>
                    <td align="right">Email: </td>
                    <td>
                        <input name="txtEmail" value="<?= $fields[4] ?>">
                        <span class="error"> <?php echo $emailErr; ?></span>
                    </td>
                </tr>
                <tr>
                    <td align="right">Address: </td>
                    <td>
                        <input name="txtAddress" value="<?= $fields[5] ?>">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="btnUpdate" value="Update" onclick="return confirm('Are you sure to update publisher <?= $fields[0] ?>')">
                    </td>

                </tr>
            </table>
        </form>
    </body>
</html>
