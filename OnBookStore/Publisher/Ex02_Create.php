<!DOCTYPE html>
<?php
#1. Start session
#2. Check session
#3. Connectto database
include_once './DBConnect.php';
#4. check Form is Submitted?
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

if (isset($_POST['btnAdd'])):
#5. Read data from input element
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


#6. Execute query
if (empty($phoneErr) && empty($urlErr) && empty($emailErr)) :
    $query = "insert into publisher (publisher_logo, publisher_web, publisher_phone, publisher_email, publisher_address) values ('{$Logo}', '{$LinkWeb}', '{$Phone}', '{$Email}', '{$Address}')";
    $rs = mysqli_query($conn, $query);
    if (!$rs):
        echo 'Nothing to insert!';
    endif;
    header("location:Ex01_Read.php");
endif;
endif;




#7. Close Connection
mysqli_close($conn);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Read - [CRUD]</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css"/>
        
    </head>
    <body class="container">
        <h2>Add New Item</h2>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <table class="table table-hover table bordered">
                
                <tr>
                    <td align="right">Logo: </td>
                    <td>
                        <input type="file" name="txtLogo">
                    </td>
                </tr>
                <tr>
                    <td align="right">Website: </td>
                    <td>
                        <input name="txtLinkWeb">
                        <span class="error"> <?php echo $urlErr; ?></span>
                    </td>
                </tr>
                <tr>
                    <td align="right">Phone: </td>
                    <td>
                        <input type="text" name="txtPhone">
                        <span class="error"> <?php echo $phoneErr; ?></span>
                    </td>
                </tr>
                <tr>
                    <td align="right"><label for="yourEmail" >Email: </label></td>  
                    <td>
                        <input type="text" name="txtEmail" id="yourEmail" required>
                        <span class="error"> <?php echo $emailErr; ?></span>
                    </td>
                </tr>
                <tr>
                    <td align="right">Address: </td>  
                    <td>
                        <input name="txtAddress">
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
