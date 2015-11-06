/**
 * Created by xavisanchezmir on 7/11/15.
 */
$(document).ready(function(){
    var ctx = $("#cocina_temp").get(0).getContext("2d");

    //pie chart data
    //sum of values = 360
    var data = [
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

    //draw
    var piechart = new Chart(ctx).Doughnut(data);

    var ctx = $("#cocina_hum").get(0).getContext("2d");

    //pie chart data
    //sum of values = 360
    var data = [
        {
            value: 100,
            color:"#4B77BE",
            highlight: "#3A539B",
            label: "Temperatura baja"
        },
        {
            value: 80,
            color: "#46BFBD",
            highlight: "#318685",
            label: "Temperatura normal"
        },
        {
            value: 180,
            color: "#FFFFFF",
            highlight: "#CF484B",
            label: "Temperatura alta"
        }
    ];

    //draw
    var piechart2 = new Chart(ctx).Doughnut(data);


});