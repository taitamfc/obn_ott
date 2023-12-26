/* ========================================================================

Chart Js Init

=========================================================================
 */


"use strict";


/*======== Doucument Ready Function =========*/
jQuery(document).ready(function () {

    var results = createDataLine(items);
    console.log(results);
    // jQuery(document).ready(function () {
    //     if ($('#morris_bar').length) {
    //         let data = results.data;
    //         let Y = results.Y;
    //         Morris.Bar({
    //             element: 'morris_bar',
    //             data: data,
    //             xkey: 'x',
    //             ykeys: ['y'],
    //             labels: [Y],
    //             barColors: ['#2671ff'],
    //             resize: true,
    //             gridTextSize: '14px'

    //         });
    //     }

    // });
    if ($('#line_chart').length) {
        var ctx = document.getElementById('line_chart').getContext('2d');

        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                datasets: [{
                    label: 'Main Data',
                    data: [12, 19, 3, 17, 6, 3, 7],
                    backgroundColor: "rgba(54, 68, 255, 0.5)",
                    borderColor: "rgba(54, 68, 255, 0.7)",
                    borderWidth: 2
                }, {
                    label: 'Basic Data',
                    data: [2, 29, 5, 5, 2, 3, 10],
                    backgroundColor: "rgba(60, 58, 204,0.5)",
                    borderColor: "rgba(60, 58, 204,0.7)",
                    borderWidth: 2
                }]

            },
            options: {
                maintainAspectRatio: false,
                legend: {
                    display: true,
                    position: 'bottom',

                    labels: {
                        fontColor: '#71748d',
                        fontSize: 14,
                    }
                },

                scales: {
                    xAxes: [{
                        ticks: {
                            fontSize: 14,
                            fontColor: '#71748d',
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            fontSize: 14,
                            fontColor: '#71748d',
                        }
                    }]
                }
            }



        });
    }

    if ($('#doughnut_chart').length) {
        var ctx = document.getElementById("doughnut_chart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ["Data 1", "Data 2", "Data 3", "Data 4"],
                datasets: [{
                    backgroundColor: [
                        "#1687FC",
                        "#2671FF",
                        "#3C3ACC",
                        "#02007C",
                        "#2D2C91",
                    ],
                    data: [12, 19, 3, 17]
                }]
            },
            options: {
                maintainAspectRatio: false,

                legend: {
                    display: true,
                    position: 'bottom',

                    labels: {
                        fontColor: '#71748d',
                        fontSize: 14,
                    }
                },


            }

        });
    }
});
/*======== End Doucument Ready Function =========*/