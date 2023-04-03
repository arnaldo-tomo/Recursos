/**
* Author: LimpidThemes
* Version: 1.0
* Description: Javascript file for the Pathshala Dashboard Template
* Date: 16-07-2017
**/

/**********************************************************
		BEGIN: MENU TOGGLE
**********************************************************/
jQuery(document).ready(function($){
	"use strict";
	jQuery("#menu-toggle").click(function(e) {
		e.preventDefault();
		jQuery("#outer-wrapper").toggleClass("toggled");
	});
	
	//datepicker
	jQuery("#startDate").datepicker();
	jQuery("#endDate").datepicker();
	jQuery("#studentDOB").datepicker({changeYear: true});
	
	//Student attendence detailed table
	jQuery('#attendenceDetailedTable').DataTable();
	
	
	//Student attendence horizontal bar chart
	var myChart = new Chart( $('#studentAttendenceChart'), {
		type: 'horizontalBar',
		data: {
			labels: ["Math", "Physics", "Chemistry", "Language", "History"],
			datasets: [{
				data: [69, 78, 60, 90, 85],
				backgroundColor: [
					'rgba(255, 195, 109, 1)',
					'rgba(39, 174, 96, 1)',
					'rgba(255, 118, 118, 1 )',
					'rgba(39, 174, 96, 1)',
					'rgba(39, 174, 96, 1)'
				],
				 borderWidth: 0
			}]
		},
		options: {
			scales: {
				xAxes: [{
					ticks: {
						beginAtZero:true
					},
					gridLines: {
						display:false
					}
				}],
				yAxes: [{
					gridLines: {
						display:false
					},
					//barPercentage: 0.5,
					categoryPercentage: 0.5
				}]
			},
			legend: {
				display: false
			}
		}
	});


	//Student attendence summary bar chart
	var myChart = new Chart( $('#studentAttendenceSummary'), {
		type: 'bar',
		data: {
			labels: ["MTH101", "PHY201", "CHE101", "LAN201", "HIS301", "BIO101"],
			datasets: [{
				data: [69, 78, 60, 90, 85, 55],
				backgroundColor: [
					'rgba(255, 195, 109, 1)',
					'rgba(39, 174, 96, 1)',
					'rgba(255, 118, 118, 1 )',
					'rgba(39, 174, 96, 1)',
					'rgba(39, 174, 96, 1)',
					'rgba(255, 118, 118, 1 )'
				],
				 borderWidth: 0
			}]
		},
		options: {
			scales: {
				xAxes: [{
					ticks: {
						beginAtZero:true
					},
					gridLines: {
						display:false
					}
				}],
				yAxes: [{
					gridLines: {
						display:false
					},
					//barPercentage: 0.5,
					categoryPercentage: 0.5,
					ticks: {
						beginAtZero:true
					}
				}]
			},
			legend: {
				display: false
			}
		}
	});
	
	//Student attendence summary bar chart
	var myChart = new Chart( $('#studentAttendenceBar'), {
		type: 'bar',
		data: {
			labels: ["STD 5", "STD 6", "STD 7", "STD 8", "STD 9", "STD 10"],
			datasets: [
				{
					data: [23, 21, 18 , 19, 15, 29],
					backgroundColor: 'rgba(255, 118, 118, 1)',
					borderWidth: 0
				},
				{
					data: [15, 20, 21, 22, 24, 28],
					backgroundColor:'rgba(255, 195, 109, 1)',
					borderWidth: 0
				},
				{
					data: [26, 25, 23, 26, 26, 28],
					backgroundColor: 'rgba(39, 174, 96, 1)',
					borderWidth: 0
				}
			]
		},
		options: {
			scales: {
				xAxes: [{
					ticks: {
						beginAtZero:true
					},
					gridLines: {
						display:false
					}
				}],
				yAxes: [{
					gridLines: {
						display:false
					},
					//barPercentage: 0.5,
					categoryPercentage: 0.5,
					ticks: {
						beginAtZero:true
					}
				}]
			},
			legend: {
				display: false
			}
		}
	});
	
	//student pie chart
	var myChart = new Chart( $('#studentPie'), {
		type: 'pie',
		data: {
			labels: ["Absent", "Leave", "Present"],
			datasets: [{
			  backgroundColor: [
				"#FF7676",
				"#FFC36D",
				"#27AE60"
			  ],
			  data: [20, 10, 70]
			}]
		},
		options: {
			legend: {
				display: false
			}
		}
	});
	
	//student attendence trend chart
	var myChart = new Chart( $('#studentAttendenceLine'), {
		type: 'line',
		data: {
			labels: ["21 Jul", "22 Jul", "23 Jul", "24 Jul", "25 Jul", "26 Jul", "27 Jul"],
			datasets: [
				{
					data: [10, 11, 12, 9, 8, 15, 11],
					borderColor: "#FF7676",
					fill: false
				},
				{
					data: [15, 11, 14, 5, 11, 4, 9],
					borderColor: "#FFC36D",
					fill: false
				},
				{
					data: [25, 21, 24, 25, 21, 20, 24],
					borderColor: "#27AE60",
					fill: false
				},
			]
		},
		options: {
			scales: {
				xAxes: [{
					ticks: {
						beginAtZero:true
					},
					gridLines: {
						display:false
					}
				}],
				yAxes: [{
					gridLines: {
						display:false
					},
					//barPercentage: 0.2,
					categoryPercentage: 0.5,
					ticks: {
						beginAtZero:true
					}
				}]
			},
			legend: {
				display: false
			}
		}
	});
	
});
