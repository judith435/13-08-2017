var app = {
    debugMode: true,
    vendorsApi: 'http://localhost/joint/13-08-2017/siteActions.php'
    //vendorsApi: 'http://localhost:8080/joint/13-08-2017/siteActions.php'
    //vendorsApi: 'http://localhost:8080/joint/13-08-2017/Vendor.php?action=getVendors'

}

$.ajax({    
            type: 'POST',
            url: app.vendorsApi,
            data: {action: 'getVendors'},
       })
        .done(function(data) {
    if (app.debugMode) {
        console.log("vendorsApi response");
        console.log(data);
    }
    data = JSON.parse(data);
    // step 1
    for(let i=0; i < data.length; i++) {
        $("#vendorDDL").append(new Option(data[i].name, data[i].id + ',' + data[i].name));
        // $("#vendorDDL").append(new Option(data[i].name, data[i].id));

    }
});

