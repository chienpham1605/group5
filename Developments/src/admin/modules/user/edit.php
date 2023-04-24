<?php
include_once '../../db/DBConnect.php';
include_once '../../db/database.php';

$id = -1;
if (!isset($_GET['id'])):
    header("location:main.php");
endif;

$id = $_GET['id'];
#5. Execute query (for data reading by Item code)
$query = "select * from customer where id = '{$id}'";
$rs = mysqli_query($conn, $query);
$fields = mysqli_fetch_array($rs);

#6. Check form is sumitted
if (isset($_POST['btn-update'])):
#7. Read new data from Input elements
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $is_block = 0;
    
    if (isset($_POST["is_block"])) {
        $is_block = $_POST["is_block"];
    }
    $id = $_POST["id"];
    $query = "update customer set name"
            . " ='{$name}',  email = '{$email}', phone = '{$phone}', address = '{$address}',"
            . " gender='{$gender}', is_block = '$is_block' where id = '{$id}'";

            $rs = mysqli_query($conn, $query);
    if (!$rs):
        error_clear_last();
        echo 'Nothing to Update!';
      
    endif;

    $id = -1;
            if (isset($_GET['id'])) {
                    $id = $_GET['id'];
            }
            $query = "SELECT * FROM customer WHERE id = '{$id}'";
            $rs = mysqli_query($conn, $query);
             $fields = mysqli_fetch_assoc($rs);
        header("location:main.php");
                mysqli_close($conn);
endif;

    while ($data = mysqli_fetch_array($rs)) {
        $i = 1;
        $id = $data['id'];
        $is_block = "";
        if ($data['is_block'] == 1) {
            $is_block = "checked='checked'";
        }
    }

    var_dump($fields);
?>

        <?php
        // require_once '../../lib/template.php';
        // get_header();
        include("../../inc/header.php");
        ?>


    <body class="container">
        <h2>Update Item</h2>

        <main id="main" class="main">

            <div class="pagetitle">
                <h1>Form Elements</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item">Forms</li>
                        <li class="breadcrumb-item active">Elements</li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->

            <section class="section">
                <div class="row">
                    <div class="col-lg-10">

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">General Form Elements</h5>

                                <!-- General Form Elements -->
                                <form method ="POST">
                                    <div class="row mb-3">
                                        <label for="inputNumber" class="col-sm-2 col-form-label">ID</label>
                                        <div class="col-sm-10">
                                            <input type="Number" readonly name ="id" class="form-control" value="<?= $fields['id'] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-2 col-form-label" >Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" name ="name" readonly class="form-control" value="<?= $fields['name'] ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="Text" name ="email" readonly class="form-control" value="<?= $fields['email'] ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputNumber" class="col-sm-2 col-form-label">Phone</label>
                                        <div class="col-sm-10">
                                            <input type="Number" name ="phone" readonly  class="form-control" value="<?= $fields['phone'] ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-2 col-form-label">Address</label>
                                        <div class="col-sm-10">
                                            <input type="text" name ="address" readonly class="form-control" value="<?= $fields['address'] ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputNumber" class="col-sm-2 col-form-label">Gender</label>
                                        <div class="col-sm-10">
                                            <input type="text" name ="gender" readonly class="form-control" value="<?php echo $fields['gender']?"Male":"Female" ?>">
                                        </div>
                                    </div>
                                    
                                   <tr>
                                        <td nowrap="nowrap">Status:</td>
                                        <td>
                                            <input  type="radio" id="is_block" name="is_block" value="1" >Lock 
                                            <input  type="radio" id="is_block" name="is_block" value="0" >Unlock
                                    </td>
                                    </tr>

                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">Update</label>
                                        <div class="col-sm-10">

                                            <button type="submit" name="btn-update" value="Update" 

                                                    onclick="return confirm(' Are you sure to update <?= $fields[0] ?>?');"
                                                    class="btn btn-primary">Update</button>
                                        </div>
                                    </div>

                                </form><!-- End General Form Elements -->
                            </div>
                        </div>

                    </div>
                </div>
                </div>

                </div>
                </div>
            </section>
        </main>
        <!-- End #main -->
        <?php
        // get_footer();
        include("../../inc/footer.php");
        ?>
    </body>
