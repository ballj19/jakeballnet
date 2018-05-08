function chart(xaxis,yaxis) {
    var ctx = document.getElementById('diglettChart').getContext('2d');
    var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: xaxis,
        datasets: [{
            label: "Diglett 24 Hour Temperature",
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: yaxis,
        }]
    },

    // Configuration options go here
    options: {
        scales: {
            xAxes: [{
                ticks: {
                    autoSkip: true,
                    maxTicksLimit: 24
                }
            }]
        }
    }
    });
}