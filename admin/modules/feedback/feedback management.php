
<?php
include_once("../../db/DBConnect.php");
include_once("../../db/database.php");
include("../../inc/header.php");
$return = '';
#2. Thực hiện query

?>
<body>
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Feedback Management</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item active">Elements</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <h2>Search</h2>
    <div class="row">
      <div class="col-xs-12">
        <input class="form-control" id="txtSearch" placeholder="Search">
        <div id="txtDisplay"></div>
      </div>
    </div>
    <div>
    <?php 
    $return = '';
    #2. Thực hiện query
    if(isset($_POST["query"])){
        $search = mysqli_real_escape_string($conn, $_POST["query"]);
        $query = "select * from feedback where "
                . "feedback_id like '%{$search}%' or "
                . "book_id like '%{$search}%'";      
    }
    else{
            $query = "select * from feedback";
    }
    $rs = mysqli_query($conn, $query);
    if(mysqli_num_rows($rs) > 0){
            $return .='
            <table class="table table-hover table-bordered">
                <tr>
                  <th>ID</th>
                  <th>Book ID</th>
                  <th>Customer</th>
                  <th>Rating</th>
                  <th>Content</th>
                  <th>Detail ID</th>
                </tr>';
            while($data = mysqli_fetch_array($rs)){
                    $return .= '
                    <tr>
                    <td>' . $data[0] . '</td>
                    <td>' . $data[5] . '</td>
                    <td>' . $data[3] . '</td>
                    <td>' . $data[2] . '</td>
                    <td>' . $data[1] . '</td>
                    <td>' . $data[4] . '</td>
                    </tr>';
            }
            echo $return;
            }
    else{
            echo 'Record not found!';
    }
    ?>
    </div>

</main>
</body>
<?php 

?>