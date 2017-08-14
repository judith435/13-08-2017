var app = {
    debugMode: true,
    vendorsApi: 'http://localhost:8080/joint/13-08-2017/getVendors.php'
    //vendorsApi: 'http://localhost:8080/joint/13-08-2017/Vendor.php?action=getVendors'

}

//  $.ajax({
//             type: 'POST',
//             dataType: 'json',
//             url: ajaxurl,
//             data: { action: 'get_cart_item', post_id: cartData },
//         })
//         .done($.ajax({
//              type: "POST",
//              url: ajaxurl,
//              data: { action: 'build_shopping_cart_html'},
//              success: alert("Cart Updated"),
//          }));

$.ajax(app.vendorsApi).done(function(data) {
    if (app.debugMode) {
        console.log("vendorsApi response");
        console.log(data);
    }
    data = JSON.parse(data);
    // step 1
    for(let i=0; i < data.length; i++) {
        $("#vendorDDL").append(new Option(data[i].name, data[i].id));
    }
});

// $.ajax({ url: '/my/site',
//          data: {action: 'test'},
//          type: 'post',
//          success: function(output) {
//                       alert(output);
//                   }
// });

// if(isset($_POST['action']) && !empty($_POST['action'])) {
//     $action = $_POST['action'];
//     switch($action) {
//         case 'test' : test();break;
//         case 'blah' : blah();break;
//         // ...etc...
//     }
// }