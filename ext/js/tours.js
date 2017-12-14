

var tours = "http://localhost/progexam2017/explore_california_api.php/tours/";

//jeg bruger toursApi fordi den kan retunere ud fra id, explore_california_api retunere alt.
var toursApi = "http://localhost/progexam2017/api.php/tours/";
//handle json_decode
$.get(tours, function (data) {
    var obj = JSON.parse(data);
    var count = obj.length;
    console.log(count);
    console.log("xd");

    for (var x = 1; x < obj.length; x++) {

        $.ajax({
            url: toursApi + x,
            dataType: 'json',
            success: function (obj) {
                // console.log(obj.foo);
                console.log(obj.tourId);
                //man kan bare tilføje flere felter fx obj.price
                $("table").append("<tr> <td> <b> Tour ID :" + (obj.tourId) + "</b> </td> </tr>");
            }
        });


    }

});