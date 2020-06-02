// Dashboard 1 Morris-chart
$( function () {
	"use strict";

	// Extra chart
	Morris.Area( {
		element: 'extra-area-chart',
		data: [ {
				period: '2001',
				car: 0,
				bike: 0,
				motobike: 0,
				revenue: 0
        }, {
				period: '2002',
				car: 10,
				bike: 60,
				motobike: 80,
				revenue: 120
        }, {
				period: '2003',
				car: 120,
				bike: 10,
				motobike: 30,
				revenue: 50
        }, {
				period: '2004',
				car: 0,
				bike: 0,
				motobike: 0,
				revenue: 0
        }, {
				period: '2005',
				car: 0,
				bike: 0,
				motobike: 150,
				revenue: 0
        }, {
				period: '2006',
				car: 160,
				bike: 75,
				motobike: 60,
				revenue: 90
        }, {
				period: '2007',
				car: 10,
				bike: 120,
				motobike: 60,
				revenue: 30
        }

        ],
		lineColors: [ '#26DAD2', '#fc6180', '#ffb64d', '#4680ff' ],
		xkey: 'period',
		ykeys: [ 'car', 'bike', 'motobike', 'revenue' ],
		labels: [ 'Ô tô', 'Xe đạp', 'Xe máy', 'Doanh thu' ],
		pointSize: 0,
		lineWidth: 0,
		resize: true,
		fillOpacity: 0.8,
		behaveLikeLine: true,
		gridLineColor: '#e0e0e0',
		hideHover: 'auto'

	} );



} );
