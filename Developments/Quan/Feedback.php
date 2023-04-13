<?php
include_once './DBconnect.php';
$nameErr = $emailErr = $dateErr = $phoneErr = "";
$name = $email = $date = $phone = $content = "";
// xác thực form bằng PHP
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["txtname"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["txtname"]);
    if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["txtemail"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["txtemail"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  if (empty($_POST["txtdate"])) {
    $dateErr = "Date is required";
  } else {
    $date = test_input($_POST["txtdate"]);
  }

  if (empty($_POST["txtphone"])) {
    $phoneErr = "Phone number is required";
  } else {
    $phone = test_input($_POST["txtphone"]);
    // if (!preg_match("/^[0-9]{3}[0-9]{3}[0-9]{4}$/", $phone)) 
    if (!preg_match("/^[0-9]{8,12}$/", $phone)) {
      $phoneErr = "Invalid phone number";
    }
  }

  if (empty($_POST["txtcontent"])) {
    $content = "";
  } else {
    $content = test_input($_POST["txtcontent"]);
  }
}
function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if (isset($_POST['btnAdd'])) :
  if (empty($nameErr) && empty($emailErr) && empty($dateErr) && empty($phoneErr)) :
    // echo '<h2 style="color:blue">Welcome '. $sName . ' to my service</h2>';
    $query = "insert into Cusfeedback (name, email, date, phone, content) values('{$name}', '{$email}', '{$date}', '{$phone}', '{$content}')";
    $rs = mysqli_query($conn, $query);
    if (!$rs) :
      echo 'can not found';
    endif;
    header("location:Ex01_read.php");
  endif;
endif;
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="scrap2.css">
</head>

<body>
  <div class="formbold-main-wrapper">
    <!-- Author: FormBold Team -->
    <!-- Learn More: https://formbold.com -->
    <div class="formbold-form-wrapper">
      <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <!-- name -->
        <div class="flex flex-wrap formbold--mx-3">
          <div class="w-full sm:w-half formbold-px-3">
            <div class="formbold-mb-5">
              <label class="formbold-form-label"> First Name </label>
              <input type="text" name="txtname" id="name" placeholder="First Name" class="formbold-form-input" />
              <span class="error"> <?php echo $nameErr; ?></span>
            </div>
          </div>
        </div>
        <!-- Email -->
        <div class="flex flex-wrap formbold--mx-3">
          <div class="w-full sm:w-half formbold-px-3">
            <div class="formbold-mb-5">
              <label class="formbold-form-label"> Email </label>
              <input type="text" name="txtemail" id="email" placeholder="abc@123.com" class="formbold-form-input" />
              <span class="error"> <?php echo $emailErr; ?></span>
            </div>
          </div>
        </div>
        <!-- phone -->
        <div class="flex flex-wrap formbold--mx-3">
          <div class="w-full sm:w-half formbold-px-3">
            <div class="formbold-mb-5">
              <label class="formbold-form-label"> Phone </label>
              <input type="text" name="txtphone" id="phone" placeholder="Phone number" class="formbold-form-input" />
              <span class="error"> <?php echo $phoneErr; ?></span>
            </div>
          </div>
        </div>
        <!-- date -->
        <div class="flex flex-wrap formbold--mx-3">
          <div class="w-full sm:w-half formbold-px-3">
            <div class="formbold-mb-5 w-full">
              <label for="date" class="formbold-form-label"> Date </label>
              <input type="date" name="txtdate" id="date" class="formbold-form-input" />
              <span class="error"> <?php echo $dateErr; ?></span>
            </div>
          </div>
        </div>
        <!-- content -->
        <div class="formbold-mb-5">
          <label class="formbold-form-label"> Content </label>
          <textarea rows="4" name="txtcontent" class="formbold-form-input"></textarea>
        </div>
        <!-- submit -->
        <div>
          <button class="formbold-btn" name="btnAdd">Submit</button>
        </div>
      </form>
    </div>
  </div>
</body>

</html>