var app = {
    debugMode: true,
    citiesApi: 'http://localhost/joint/13-08-2017/hw/siteActions.php'

}

$.ajax({    
            type: 'POST',
            url: app.citiesApi,
            data: {action: 'getCities'},
       })
        .done(function(data) {
    if (app.debugMode) {
        console.log("citiesApi response");
        console.log(data);
    }
    data = JSON.parse(data);
    // step 1
    for(let i=0; i < data.length; i++) {
        $("#citiesDDL").append(new Option(data[i].name, data[i].id + ',' + data[i].name));

    }
});

