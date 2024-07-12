$(function () {
    new Chart(document.getElementById("bar_chart").getContext("2d"), getChartJs('bar'));
    new Chart(document.getElementById("pie_chart").getContext("2d"), getChartJs('pie'));
});

function getChartJs(type) {
    var config = null;

    if (type === 'bar') {
        config = {
            type: 'bar',
            data: {
                labels: ["Bungursari", "Cibeureum", "Cihideung", "Cipedes", "Indihiang", "Kawalu", "Mangkubumi", "Purbaratu", "Tamansari", "Tawang"],
                datasets: [{
                    label: "Jumlah Kejadian Bencana",
                    data: [65, 59, 80, 81, 56, 55, 40, 65, 59, 80, 81, 56],
                    backgroundColor: ['#00BCD4','#E91E63','#FF5722','#673AB7','#4CAF50','#3F51B5',
									  '#03A9F4','#CDDC39','#F44336','#009688']
									
                }]
            },
            options: {
                responsive: true,
                legend: false,
				scales: {
				  yAxes: [{
					ticks: {
					  min: 0,
					  max: 100,
					  maxTicksLimit: 11
					},
					gridLines: {
					  display: true
					}
				  }]
				}
            }
        }
    }
    else if (type === 'pie') {
        config = {
            type: 'pie',
            data: {
                datasets: [{
                    data: [225, 50, 100, 40],
                    backgroundColor: [
                        "rgb(233, 30, 99)",
                        "rgb(255, 193, 7)",
                        "rgb(0, 188, 212)",
                        "rgb(139, 195, 74)"
                    ],
                }],
                labels: [
                    "Pink",
                    "Amber",
                    "Cyan",
                    "Light Green"
                ]
            },
            options: {
                responsive: true,
                legend: false
            }
        }
    }
    return config;
}