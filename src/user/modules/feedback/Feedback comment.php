<!DOCTYPE html>

<?php
include_once("../../db/DBConnect.php");
include_once("../../db/database.php");
include("../../inc/header.php");
// $query = "SELECT * FROM feedback, book, customer where feedback.book_id=book.book_id AND book.book_id = '{$book_id}' AND  feedback.customer_id = customer.id";
// $rs = mysqli_query($conn, $query);
// $count = mysqli_num_rows($rs);
$ratingErr = "";
$content = $rating = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["txtcontent"])) {
		$content = "";
	  } else {
		$content = test_input($_POST["txtcontent"]);
	  }

	  if (empty($_POST["txtstar"])) {
		$ratingErr = "Date is required";
	  }
}
function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
// function getFeedback() {
//     global $conn; 
//     $sql = "SELECT * FROM feedback, customer, book WHERE feedback.customer_id = customer.id AND feedback.book_id = book.book_id";
//     $result = mysqli_query($conn, $sql);
//     return mysqli_fetch_all($result, MYSQLI_ASSOC);
// }
// $feedback = getFeedback();
// foreach ($feedback as $feedbacks) {
// 	if($feedbacks['book_id'] == $book_id){
// 	echo "Book: ". $feedbacks['book_name'] . "<br>";
// 	echo "Name: ". $feedbacks['name'] . "<br>";
//     echo "Rating: " . $feedbacks['rating'] . "<br>";
//     echo "Content: " . $feedbacks['content'] . "<br>";
// 	}
// }
if (isset($_POST['btnAdd'])) :
	if (empty($ratingErr)) :
		// echo '<h2 style="color:blue">Welcome '. $sName . ' to my service</h2>';
		$query = "insert into feedback (content, rating) values('{$content}, '{$rating}')";
		$rs = mysqli_query($conn, $query);
		if (!$rs) :
			echo 'can not found';
		endif;
		header("location:Ex01_read.php");
	endif;
endif;
?>
<html lang="en">
<body>

<div id="review" class="tab-pane">
                  <div class="product-tab">
                    <div class="product-add-review">
                      <h4>Customer review</h4>
                      <?php
                      if ($count == 0) :
                        echo 'record not found';
                      else :
                        while ($feedback = mysqli_fetch_array($rs)) :
                      ?>
                          <div class="cus_feedback">
                          <h5> <?= $feedback['name'] ?></h5>
                          
                           <h6> <?= $feedback['rating'] ?> star</h6>

                           <h6> <?= $feedback['content'] ?></h6>
                          </div>
                      <?php
                        endwhile;
                      endif;
                      ?>
                      <h4 class="title">Write your own review</h4>
                      <div class="review-table">
                        <div class="table-responsive">
                          <table class="table">
                            <div class="rate" name="txtstar">
                              <input type="radio" id="star5" name="rate" value="5" />
                              <label for="star5" title="text">5 stars</label>
                              <input type="radio" id="star4" name="rate" value="4" />
                              <label for="star4" title="text">4 stars</label>
                              <input type="radio" id="star3" name="rate" value="3" />
                              <label for="star3" title="text">3 stars</label>
                              <input type="radio" id="star2" name="rate" value="2" />
                              <label for="star2" title="text">2 stars</label>
                              <input type="radio" id="star1" name="rate" value="1" />
                              <label for="star1" title="text">1 star</label>
                              <span class="error">
                              </span>
                            </div>
                        </div>
                      </div>
                      </table><!-- /.table .table-bordered -->
                    </div><!-- /.table-responsive -->
                  </div><!-- /.review-table -->

                  <div class="review-form">
                    <div class="form-container">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="exampleInputReview">Content <span class="astk">*</span></label>
                            <textarea class="form-control txt txt-review" name="txtcontent" id="exampleInputReview" rows="4" placeholder=""></textarea>
                          </div>
                        </div>
                      </div>

                      <div class="action text-right" name="btnAdd">
                        <button class="btn btn-primary btn-upper">SUBMIT REVIEW</button>
                      </div>

                      </form><!-- /.cnt-form -->
                    </div><!-- /.form-container -->
                  </div><!-- /.review-form -->

                </div><!-- /.product-add-review -->
</div>

</body>

</html>
<?php 
include("../../inc/footer.php");
?>