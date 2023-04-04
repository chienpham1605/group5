$(document).ready(function () {
  $(".increment-btn").click(function (e) {
    e.preventDefault();
    var qty = $(".input-qty").val();
    var value = parseInt(qty);
    value = isNaN(value) ? 0 : value;
    if (value < 10) {
      value++;
      $(".input-qty").val(value);
    }
  });
  $(".decrement-btn").click(function (e) {
    e.preventDefault();
    var qty = $(".input-qty").val();
    var value = parseInt(qty);
    value = isNaN(value) ? 0 : value;
    if (value > 1) {
      value--;
      $(".input-qty").val(value);
    }
  });
  $(".addToCartBtn").click(function (e) {
    e.preventDefault();
    var qty = $(".input-qty").val();
    var book_id = $(this).val();
    $.ajax({
      url: "modules/cart/cartHandle.php",
      method: "POST",
      data: { qty: qty, book_id: book_id, scope: "add" },
      //   dataType: "JSON",
      success: function (response) {
        if (response == 201) {
          alert("Product added to cart");
        }
        if (response == 401) {
          alert("Login to continue");
        }
        if (response == 501) {
          alert("Something went wrong");
        }
        if (response == "existing") {
          alert("Product aldready in cart");
        }
      },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      },
    });
  });

  $(".num_order").change(function(){
   
    var qty = $(this).val();  
    var book_price = $(this).attr("data-price");
    var book_id = $(this).attr("data-id");
    $.ajax({
      url: "modules/cart/cartHandle.php",
      method: "POST",     
      data: { qty: qty, book_id: book_id, book_price:book_price, scope: "update" },
      dataType: "JSON",
      success: function (response) {
        console.log(response);
        $("#sub-total-"+book_id).text(response.sub_total);
        // if (response == 200) {
        //   alert("Product added to cart");
        // }
        // if (response == 401) {
        //   alert("Login to continue");
        // }
        // if (response == 501) {
        //   alert("Something went wrong");
        // }
        // if (response == "existing") {
        //   alert("Product aldready in cart");
        // }
      },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      },
    });  

  });
  $(".remove").click(function(){   
    var book_id = $(this).attr("data-id");
    $.ajax({
      url: "modules/cart/delete.php",
      method: "POST",     
      data: {book_id: book_id, scope: "delete" },
      //   dataType: "JSON",
      success: function (response) {
        if (response == 200) {
          alert("Delete successfully");
          redirect("?mod=cart&act=show");
        }
        if (response == 401) {
          alert("Login to continue");
        }
        if (response == 501) {
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
