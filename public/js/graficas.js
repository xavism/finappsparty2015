/**
 * Created by xavisanchezmir on 7/11/15.
 */

function print_temp_cocina(temperatura_cuina){
    var color_result;
    if (temperatura_cuina < 12) color_result = "#4B77BE";
    else if (temperatura_cuina > 42) color_result = "#FF5A5E";
    else if (temperatura_cuina > 30) color_result = "#F27935";
    else color_result = "#46BFBD";
    var opts = {
        lines: 1, // The number of lines to draw
        angle: 0.0, // The length of each line
        lineWidth: 0.3, // The line thickness
        pointer: {
            length: 0.75, // The radius of the inner circle
            strokeWidth: 0.025, // The rotation offset
            color: '#BDC3C7' // Fill color
        },
        limitMax: 'true',   // If true, the pointer will not go past the end of the gauge
        colorStart: color_result,   // Colors
        colorStop: color_result,    // just experiment with them
        strokeColor: '#E0E0E0',   // to see which ones work best for you
        generateGradient: true
    };

    var target = document.getElementById('cocina_temp'); // your canvas element
    var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
    gauge.maxValue = 60; // set max gauge value
    gauge.animationSpeed = 32; // set animation speed (32 is default value)
    if(temperatura_cuina > 60) temperatura_cuina = 60;
    else if(temperatura_cuina < 0) temperatura_cuina = 0;
    gauge.set(temperatura_cuina);
};


function update_temp() {
    $.ajax({
        type: "POST",
        url: "http://46.101.139.161/bdapi/get-temp.php",
        data: {},
        success: function(data, textStatus, jqXHR) {
            print_temp_cocina(parseInt(data));
        }
    });
    return false;
};

function print_hum_cocina(humitat_cuina){

    var color_result_cuina;
    if (humitat_cuina < 80) color_result_cuina = "#4B77BE";
    else color_result_cuina = "#FF5A5E";
    var opts = {
        lines: 1, // The number of lines to draw
        angle: 0.0, // The length of each line
        lineWidth: 0.3, // The line thickness
        pointer: {
            length: 0.75, // The radius of the inner circle
            strokeWidth: 0.025, // The rotation offset
            color: '#000000' // Fill color
        },
        limitMax: 'false',   // If true, the pointer will not go past the end of the gauge
        colorStart: color_result_cuina,   // Colors
        colorStop: color_result_cuina,    // just experiment with them
        strokeColor: '#E0E0E0',   // to see which ones work best for you
        generateGradient: true
    };

    var target = document.getElementById('cocina_hum'); // your canvas element
    var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
    gauge.maxValue = 100; // set max gauge value
    gauge.animationSpeed = 32; // set animation speed (32 is default value)
    gauge.set(humitat_cuina);
}

function update_hum() {
    $.ajax({
        type: "POST",
        url: "http://46.101.139.161/bdapi/get-hum.php",
        data: {},
        success: function(data, textStatus, jqXHR) {
            print_hum_cocina(parseInt(data));
        }
    });
    return false;
};

$(document).ready(function(){
    var temperatura_cuina = parseInt(all_data_temperatura[0].valor);
    print_temp_cocina(temperatura_cuina);
    var humitat_cuina = parseInt(all_data_humitat[0].valor);
    print_hum_cocina(humitat_cuina);
    setInterval(function() {
        update_temp();
        update_hum();
    }, 10000);




    var temperatura_dorm = 24;
    var color_result;
    if (temperatura_dorm < 12) color_result = "#4B77BE";
    else if (temperatura_dorm > 42) color_result = "#FF5A5E";
    else if (temperatura_dorm > 30) color_result = "#F27935";
    else color_result = "#46BFBD";
    var opts = {
        lines: 1, // The number of lines to draw
        angle: 0.0, // The length of each line
        lineWidth: 0.3, // The line thickness
        pointer: {
            length: 0.75, // The radius of the inner circle
            strokeWidth: 0.025, // The rotation offset
            color: '#BDC3C7' // Fill color
        },
        limitMax: 'false',   // If true, the pointer will not go past the end of the gauge
        colorStart: color_result,   // Colors
        colorStop: color_result,    // just experiment with them
        strokeColor: '#E0E0E0',   // to see which ones work best for you
        generateGradient: true
    };

    var target = document.getElementById('dormitorio_temp'); // your canvas element
    var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
    gauge.maxValue = 60; // set max gauge value
    gauge.animationSpeed = 32; // set animation speed (32 is default value)
    gauge.set(temperatura_dorm);


    var ctx = document.getElementById("grafic_temp_cuina").getContext("2d");
    var data = {
        labels: ["20:00", "21:00", "22:00", "23:00", "00:00"],
        datasets: [
            {
                label: "My Second dataset",
                fillColor: "rgba(151,187,205,0.2)",
                strokeColor: "rgba(151,187,205,1)",
                pointColor: "rgba(151,187,205,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [parseInt(all_data_temperatura[4].valor), parseInt(all_data_temperatura[3].valor), parseInt(all_data_temperatura[2].valor), parseInt(all_data_temperatura[1].valor), parseInt(all_data_temperatura[0].valor)]
            }
        ]
    };
    var myLineChart = new Chart(ctx).Line(data);

    var ctx = document.getElementById("grafic_hum_cuina").getContext("2d");
    var data = {
        labels: ["20:00", "21:00", "22:00", "23:00", "00:00"],
        datasets: [
            {
                label: "My Second dataset",
                fillColor: "rgba(151,187,205,0.2)",
                strokeColor: "rgba(151,187,205,1)",
                pointColor: "rgba(151,187,205,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [parseInt(all_data_humitat[4].valor), parseInt(all_data_humitat[3].valor), parseInt(all_data_humitat[2].valor), parseInt(all_data_humitat[1].valor), parseInt(all_data_humitat[0].valor)]
            }
        ]
    };
    var myLineChart = new Chart(ctx).Line(data);



    $('#cocina_up').on('click', changeClass);
    function changeClass() {

        $('#cocina_up').toggleClass('col-md-6 col-md-12');
        $('#grafic_temp_cuina').toggleClass('no-display display');
        $('#grafic_hum_cuina').toggleClass('no-display display');
    }

});