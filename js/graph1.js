var ctx = document.getElementById("myChart");
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ["物理", "化学", "生物学", "地学", "数デ"],
      datasets: [{
        data: [60, 50, 40, 30, 20],
        backgroundColor: '#007bff',
        borderColor: '#007bff',
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true
          }
        }]
      },
      legend: {
        display: false,
      }
    }
  });