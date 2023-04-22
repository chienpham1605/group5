<?php 
include_once("../../db/DBConnect.php");
include_once("../../db/database.php");
include_once("../../inc/header.php");
if (isset($_POST['btnAdd'])):
        $name = $_POST['txtName'];
        $Description = $_POST['txtDescription'];
        $Author = $_POST['txtAuthor'];
        $Price = $_POST['txtPrice'];
        $page = $_POST['txtPage'];
        $yearbook = $_POST['txtYear'];
    
        $query = "insert into book (book_name, book_des, book_author, book_price, page, yearBook) values ('{$name}', '{$Description}', '{$Author}', '{$Price}', '{$page}', '{$yearBook}')";
        $rs = mysqli_query($conn, $query);
        if (!$rs):
            echo 'Nothing to insert!';
        endif;
    header("location:book/main.php");
endif;

?>
<main id="main" class="main">

<div class="pagetitle">
  <h1>Add Discount</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Book</li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<section class="section">
  <div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Add book</h5>

          <!-- Horizontal Form -->
          <form class="row g-3" method="POST" >
            <div class="col-12">
              <label class="form-label">Name</label>
              <input class="form-control" name="txtName">
            </div>
            <div class="col-12">
              <label class="form-label">Author</label>
              <input name="txtAuthor" class="form-control">
            </div>
            <div class="col-12">
              <label class="form-label">Price</label>
              <input type="text" class="form-control" name="txtPrice" id="start_discount">
            </div>
            <div class="col-25">
              <label class="form-label">Description</label>
              <input type="text" class="form-control" name="txtDescription" id="start_discount">
            </div>

            <div class="col-12">
              <label class="form-label">Page</label>
              <input type="text" class="form-control"  name="txtPage" id="end_discount">
            </div>
            <div class="col-12">
              <label class="form-label">Year of book</label>
              <input type="text" class="form-control"  name="txtYear" id="end_discount">
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary" name="btnAdd">Submit</button>
              <button type="reset" class="btn btn-secondary" name="btnClear">Reset</button>
            </div>
          </form>

        </div>
      </div>

    </div>
  </div>
</section>

<?php
include_once("../../inc/footer.php");
?>
