$(document).ready(function () {
    $(".plus").click(function (e) {
      e.preventDefault();
      var qty = $(".input-qty").val();
      var value = parseInt(qty);
      value = isNaN(value) ? alert("Quantity must be number") : value;
      if (value < 10) {
        value++;
        $(".input-qty").val(value);
      }
    });
    $(".minus").click(function (e) {
      e.preventDefault();
      var qty = $(".input-qty").val();
      var value = parseInt(qty);
      value = isNaN(value) ? alert("Quantity must be number") : value;
      if (value > 1) {
        value--;
        $(".input-qty").val(value);
      }
    });
    $(".add-btn").click(function (e) {
      e.preventDefault();
      var qty = $(".input-qty").val();
      var book_id = $(this).attr("data-id");
      var book_price = $(this).attr("data-price");
      $.ajax({
        url: "modules/cart/add.php",
        method: "POST",
        data: { qty: qty, book_id: book_id, book_price:book_price},
        success: function (data) {
          if (data.response == 201) {
            alert("Product added to cart");
            $("#sub-total-"+book_id).text(data.sub_total);
            $("#subtotal-check-"+book_id).text(data.sub_total);
            $(".cart-grand-total span").text(data.total);
            $("#qty-book-id-"+book_id).text(data.qty);
          }
          else if (data.response == 401) {
            alert("Login to continue");
          }
          else if (data.response == 501) {
            alert("Something went wrong");
          }
          else if (data.response == "existing") {
            alert("Product aldready in cart");
          }
        },
        error: function (xhr, ajaxOptions, thrownError) {
          alert(xhr.status);
          alert(thrownError);
        },
      });
    });
  
    $(".input-qty").change(function(){
     
      var qty = $(this).val();  
      var book_price = $(this).attr("data-price");
      var book_id = $(this).attr("data-id");
      $.ajax({
        url: "modules/cart/update.php",
        method: "POST",     
        data: { qty: qty, book_id: book_id, book_price:book_price},
        dataType: "JSON",
        success: function (response) {
          console.log(response);
          $("#sub-total-"+book_id).text(response.sub_total);
          $(".cart_checkbox").attr('subtotal', response.sub_total);
          $(".cart-grand-total span").text(response.total);
          $("#qty-book-id-"+book_id).text(response.qty);
          if (response == 401) {
            alert("Login to continue");
          }
          else if (response == 501) {
            alert("Something went wrong");
          }
        },
        error: function (xhr, ajaxOptions, thrownError) {
          alert(xhr.status);
          alert(thrownError);
        },
      });  
  
    }); 
$('input:checkbox').change(function ()
{

      var total = 0;
      $('input:checkbox:checked').each(function(){
       total += isNaN(parseInt($(this).val())) ? 0 : parseInt($(this).val());
      });   
  
      $("#overall_total").val(total);

});
  
  });
  