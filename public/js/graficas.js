/**
 * Created by xavisanchezmir on 7/11/15.
 */
$(document).ready(function(){

    if
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
        colorStart: '#FF5A5E',   // Colors
        colorStop: '#FF5A5E',    // just experiment with them
        strokeColor: '#E0E0E0',   // to see which ones work best for you
        generateGradient: true
    };

    var target = document.getElementById('cocina_temp'); // your canvas element
    var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
    gauge.maxValue = 60; // set max gauge value
    gauge.animationSpeed = 32; // set animation speed (32 is default value)
    gauge.set(40);



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
        colorStart: '#4B77BE',   // Colors
        colorStop: '#4B77BE',    // just experiment with them
        strokeColor: '#E0E0E0',   // to see which ones work best for you
        generateGradient: true
    };

    var target = document.getElementById('cocina_hum'); // your canvas element
    var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
    gauge.maxValue = 60; // set max gauge value
    gauge.animationSpeed = 32; // set animation speed (32 is default value)
    gauge.set(22);

    //pie chart data
    //sum of values = 360
    var data2 = [
        {
            value: 130,
            color:"#4B77BE",
            highlight: "#3A539B",
            label: "Temperatura baja"
        },
        {
            value: 100,
            color: "#46BFBD",
            highlight: "#318685",
            label: "Temperatura normal"
        },
        {
            value: 130,
            color: "#FF5A5E",
            highlight: "#CF484B",
            label: "Temperatura alta"
        }
    ];






});