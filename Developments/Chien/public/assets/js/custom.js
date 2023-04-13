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
      location.reload(true);
      $.ajax({
        url: "modules/cart/add.php",
        method: "POST",
        data: { qty: qty, book_id: book_id},
        success: function (data) {
          if (data == 201) {
            alert("Product added to cart");        
          } 
          if (data == 401) {
            alert("Login to continue");
          }
          if (data == 501) {
            alert("Something went wrong");
          }
          if (data == "existing") {
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
    

 
  
  });
  