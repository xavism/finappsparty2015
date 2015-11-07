/**
 * Created by xavisanchezmir on 7/11/15.
 */
$(document).ready(function(){
    var temperatura_cuina = 11;
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
        limitMax: 'false',   // If true, the pointer will not go past the end of the gauge
        colorStart: color_result,   // Colors
        colorStop: color_result,    // just experiment with them
        strokeColor: '#E0E0E0',   // to see which ones work best for you
        generateGradient: true
    };

    var target = document.getElementById('cocina_temp'); // your canvas element
    var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
    gauge.maxValue = 60; // set max gauge value
    gauge.animationSpeed = 32; // set animation speed (32 is default value)
    gauge.set(temperatura_cuina);


    var humitat_cuina = 90;
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
                data: [21, 23, 24, 22, 19]
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
                data: [21, 23, 24, 22, 19]
            }
        ]
    };
    var myLineChart = new Chart(ctx).Line(data);






});