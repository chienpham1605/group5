<?php
include_once("../../db/DBConnect.php");
if (isset($_POST['btnAdd'])):
    #5. Read the data from Input
    $name = $_POST['txtName']; 
    $country = $_POST['txtCountry'];
    
    #. Process Image value
    $folder     = "../../../book/";
    $fileName   = $_FILES["txtLogo"]["name"];
    $fileTmp    = $_FILES["txtLogo"]["tmp_name"];
    $logo = $folder.$fileName;
     
    move_uploaded_file($fileTmp, $logo);
     
       
    #6. Execute 
    $query = "insert into book_image values('img_url')";
    $rs = mysqli_query($conn, $query); 
    if (!$rs):
        echo 'can not found';  
    endif;
    header("location:../book/main.php");
    
endif;
mysqli_close($conn);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Create-[CRUD]</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css"/>

    </head>
    <body class="container">
        <form method="POST" enctype="multipart/form-data"> 
        <table class="table table-borderedless">
            <tr>
                <td align="right">Logo: </td>
                <td>
                    <input type="file" name="txtLogo">
                </td>               
            </tr>
            <tr>
                <td>
                    <input type="submit" name="btnAdd" value="Add">
                </td>               
            </tr>
        </table>
        </form>>
    </body>
</html>
