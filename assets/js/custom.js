$(document).ready(function() {

    
    $(document).on('click','.increment-btn', function (e) {
        e.preventDefault();

        var qty = $(this).closest('.product_data').find('.input-qty').val();
        
        var value = parseInt(qty, 10);
        value = isNaN(value) ? 0 : value;
        if(value < 10)
        {
            value++;
            $(this).closest('.product_data').find('.input-qty').val(value);
        }
    });
    
    $(document).on('click','.decrement-btn', function (e) {
        e.preventDefault();

        var qty = $(this).closest('.product_data').find('.input-qty').val();
        
        var value = parseInt(qty, 10);
        value = isNaN(value) ? 0 : value;
        if(value > 1)
        {
            value--;
            $(this).closest('.product_data').find('.input-qty').val(value);
        }
    });
    
    $(document).on('click','.addToCartBtn', function (e) {
        e.preventDefault();
        var qty = $(this).closest('.product_data').find('.input-qty').val();
        var prod_id = $(this).val();
        

        $.ajax({
            method: "POST",
            url: "functions/handlecart.php",
            data: {
                "prod_id": prod_id,
                "prod_qty": qty,
                "scope": "add"
            },
            success: function (response) {
                if(response == 201)
                {
                    alertify.success("product added to cart");
                }
                else if(response == "already_exist")
                {
                    alertify.success("product already in cart");
                }                
                
                else if(response == 401)
                {
                    alertify.success("Login to continue");
                }
                else if(response == 500)
                {
                    alertify.success("something went wrong");
                }
               
            }
        });
    });

    $(document).on('click','.updateQty', function () {
        
        var qty = $(this).closest('.product_data').find('.input-qty').val();
        var prod_id = $(this).val();
        var prod_id = $(this).closest('.product_data').find('.prodId').val();
        $.ajax({
            type: "POST",
            url: "functions/handlecart.php",
            data: {
                "prod_id": prod_id,
                    "prod_qty": qty,
                    "scope": "update"
                },
            success: function (response) {
                //alert(response);
            }
        });
    });

    $(document).on('click','.deleteItem', function () {
        var cart_id = $(this).val();
        //alert(cart_id);
        $.ajax({
            type: "POST",
            url: "functions/handlecart.php",
            data: {
                "cart_id": cart_id,
                    "scope": "delete"
                },
            success: function (response) {
                //alert(response);
                if(response == 200)
                {
                    alertify.success("Item successfully removed");
                    $('#mycart').load(location.href + " #mycart");
                }
                else
                {
                    alertify.success(response);
                }
             }
        });
    });

    $(document).on('click','.cancelorder', function () {
        var order_id = $(this).val();
        //alert(cart_id);
        $.ajax({
            type: "POST",
            url: "functions/handlecart.php",
            data: {
                    "order_id": order_id,
                    "scope": "cancel"
                },
            success: function (response) {
                //alert(response);
                if(response == 200)
                {
                    alertify.success("Order has been Cancelled");
                    $('#myorder').load(location.href + " #myorder");
                }
                else
                {
                    alertify.success(response);
                }
             }
        });
    });
});