( function ( $ ) {
  "use strict";

  //bar chart
  var ctx = document.getElementById( "barChart" );
  //    ctx.height = 200;
  var myChart = new Chart( ctx, {
    type: 'bar',
    data: {
      labels: [ "STUDENTS" ],
      datasets: [
        {
          label: "Active",
          data: [65],
          borderColor: "rgba(0, 123, 255, 1)",
          borderWidth: "0",
          backgroundColor: "rgba(0, 123, 255, 0.8)"
        },
        {
          label: "Inactive",
          data: [28],
          borderColor: "rgba(131, 128, 134, 1)",
          borderWidth: "0",
          backgroundColor: "rgba(131, 128, 134, 0.8)"
        }
      ]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true
          }
        }]
      }
    }
  });

  //doughut chart
  var ctx = document.getElementById( "doughutChart" );
  ctx.height = 150;
  var myChart = new Chart( ctx, {
    type: 'doughnut',
    data: {
      datasets: [{
        data: [ 45, 25, 20, 10 ],
        backgroundColor: 
        [
          "rgba(75, 199, 234, 0.9)",
          "rgba(254, 215, 102, 0.9)",
          "rgba(43, 198, 126, 0.9)",
          "rgba(248, 51, 60, 0.9)"
        ],
        hoverBackgroundColor: 
        [
          "rgba(75, 199, 234, 0.7)",
          "rgba(254, 215, 102, 0.7)",
          "rgba(43, 198, 126, 0.7)",
          "rgba(248, 51, 60, 0.7)"
        ]
      }],
      labels: 
      [
        "BSIT",
        "BSEn",
        "BSOA",
        "BSA"
      ]
    },
    options: {
      responsive: true
    }
  });
})( jQuery );