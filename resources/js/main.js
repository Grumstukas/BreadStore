/*************************functions****************************/



/**************************actions*****************************/

$(document).on("click", ".good", function(e){ //e-event
    e.preventDefault();                                 //draudžia defoltinę elgsena ejimas i linką
    var link = $(this).attr("href");                    //susikuriam kintamajį su visa link info
    axios.post(link, {                            //axiosą siunčiam pagal tą linką
        id:$(this).data('id')                          //iš linko pasiima id (data-id..)
    })
    //veksmas serveryje, kai serveris duoda atsakymą:
        .then(function (response) {
            $("#bun_pop").empty().html(response.data.html);
        })
        .catch(function (error) {
            console.log(error);
        });
});

$(document).on("click", ".clear", function(e){ //e-event
    e.preventDefault();                                 //draudžia defoltinę elgsena ejimas i linką
    $("#bun_pop").empty();
});




//*********************antras psl************************
$(document).on("click", "#buy", function(){
    var link = $(this).data("url");
    axios.post(link, {
        id:$(this).data('id'),
        count:$('.count').val()
    })
        .then(function (response) {
            $(".goodsCount").empty().append(response.data.html);
        })
        .catch(function (error) {
            console.log(error);
        });
});






//*********************pirmas psl******************
// $(document).on("click", "#buy", function(){
//     var link = $(this).data("url");
//     axios.post(link, {
//         id:$(this).data('id'),
//         count:$(this).closest('.amount_to_buy').find('.count').val()
//     })
//         .then(function (response) {
//             $(".goodsCount").empty().append(response.data.html);
//         })
//         .catch(function (error) {
//             console.log(error);
//         });
// });
//***************************************


$(document).ready(function(){
    var link = $(".goodsCount").data("url");
    axios.post(link, {
    })
        .then(function (response) {
            $(".goodsCount").empty().append(response.data.html);
        })
        .catch(function (error) {
            console.log(error);
        });
});
$(document).on("click", ".amount", function(e){

    e.preventDefault();
    var link = $(this).attr("href");
    axios.post(link, {
        key:$(this).data('key'),
        id:$(this).data('id')
    })
    //veksmas serveryje, kai serveris duoda atsakymą:
        .then(function (response) {
            $(".goodsCount").empty().html(response.data.html);
            $("#kashikas").empty().html(response.data.html2);
        })
        .catch(function (error) {
            console.log(error);
        });
});

$(document).on("click", ".deliveryMethod",function(){
    var link = $(".deliveryMethod").data("url");
    axios.post(link, {
        way:$(this).data('way')
    })
        .then(function (response) {
            $(".totalPrice").empty().append(response.data.html);
        })
        .catch(function (error) {
            console.log(error);
        });
});
