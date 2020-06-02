// Dashboard 1 Morris-chart
$( function () {
    "use strict";

    // Chart Day
    var data_day_chart = '';

    Morris.Donut( {
        element: 'day-chart',
        data: [ {
            label: "Xe ô tô",
            value: 12,

        }, {
            label: "Xe máy",
            value: 50
        }, {
            label: "Xe đạp",
            value: 20
        } ],
        resize: true,
        colors: [ '#4680ff', '#26DAD2', '#fc6180' ]
    } );

    // Chart Month
    var data_month_chart = '';

    Morris.Donut( {
        element: 'month-chart',
        data: [ {
            label: "Xe ô tô",
            value: 12,

        }, {
            label: "Xe máy",
            value: 30
        }, {
            label: "Xe đạp",
            value: 20
        } ],
        resize: true,
        colors: [ '#4680ff', '#26DAD2', '#fc6180' ]
    } );

    // Extra chart




} );
