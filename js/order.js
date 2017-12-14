

var orders = "http://localhost/progexam/api.php/orders/";
var selectedOrder = "http://localhost/progexam/order.php/orders/";
var oder_id = 1;
//handle json_decode
$.get(orders, function (data) {
    var obj = JSON.parse(data);
    var count = obj.length;
    console.log(count);

    for (var x = 1; x < obj.length; x++) {

        $.ajax({
            url: selectedOrder + x,
            dataType: 'json',
            success: function (obj) {
                // console.log(obj.foo);
                console.log(obj.ORD_ID);

                $("p").append("<b> Order ID :" + (obj.ORD_ID) + "</b> ");
                $("p").append("<b> Agent ID :" + (obj.AGENT_ID) + "</b>");
                $("p").append("<b> Order Date:" + (obj.ORD_DATE) + "</b> <br>");
            }
        });


    }

});