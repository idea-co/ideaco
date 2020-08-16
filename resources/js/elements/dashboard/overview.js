//line chart 
const ctx_graph = document.getElementById('main_chart').getContext('2d'); 
let chart1 = new Chart(ctx_graph, { 
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
        datasets: [{
            fill: 'false',
            data: [1, 2, 3, 4],
            borderColor: '#EFB84C',
            borderWidth: 1,
            pointRadius:3,
            pointBackgroundColor: "#EFB84C",
            lineTension:0,
        },
        {
            fill: 'false',
            data: [2, 1, 2, 3],
            borderColor: '#669E1F',
            borderWidth: 1,
            pointRadius:3,
            pointBackgroundColor: "#669E1F",
            lineTension:0,
        },
        {
            fill: 'false',
            data: [4, 5, 4, 1],
            borderColor: '#1F439E',
            borderWidth: 1,
            pointRadius:3,
            pointBackgroundColor: "#1F439E",
            lineTension:0,
        }
    ]
    },
    // Configuration options go here
    options: {
      scales: {
        xAxes: [{
            gridLines: {
                display:false
            }
        }],
        yAxes: [{
            gridLines: {
              beginAtZero: false,    
              display:false 
            },
            ticks: {
                fontSize: 11,
                fontColor: "black",
                beginAtZero: false,     
                min: 0, // it is for ignoring negative step.
                stepSize: 1
            },
        }]
    },
    title: {
        display: false
    },
    legend: {
        display:false
    }
  }
});