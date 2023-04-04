

$(document).ready(function(){
    $(".num_order").change(function(){
        var id = $(this).attr("data-id");
        var qty = $(this).val();  
        var data = {id: id, qty:qty};     
        console.log(data);         

        $.ajax({
            url: "modules/cart/update_ajax.php",
            method: 'POST',
            data: data,
            dataType: "JSON",
            success: function(data){     
                console.log(data);           
                $("#sub-total-"+id).text(data.sub_total);
                $("#total-price span").text(data.total);                                  
            },
            error: function(xhr, ajaxOptions, thrownError){
                alert(xhr.status);
                alert(thrownError);
            }
        });
    });
});