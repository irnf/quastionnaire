var ctx = document.getElementById("myChart");
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ["物理", "化学", "生物学", "地学", "数デ"],
      datasets: [{
        label: 'フットサル',
        backgroundColor: '#0000FF',
        borderColor: '#0000FF',
        borderWidth: 1,
        data: [
        /**ここにgl_arr["VIEW_DATA"]["graph_list"]の値を入れたい 
         * 正確にはphpファイルにて
         * $json_sports = json_encode($gl_arr["VIEW_DATA"]["graph_list"] , JSON_PRETTY_PRINT);
         * というコマンドを行った。
        */
          60, 50, 40, 30, 20
        ]
      },{
        label:'ソフトボール',
        backgroundColor: '#DC143C',
        borderColor: '#DC143C',
        borderWidth: 1,
        data: [
          60, 50, 40, 30, 20
        ]
      },{
        label: 'ソフトテニス',
        backgroundColor: '#7FFF00',
        borderColor: '#7FFF00',
        borderWidth: 1,
        data: [
          60, 50, 40, 30, 20
        ]
      },{
        label: 'バドミントン',
        backgroundColor: '#00BFFF',
        borderColor: '#00BFFF',
        borderWidth: 1,
        data: [
          60, 50, 40, 30, 20
        ]
      },{
        label: 'バスケットボール',
        backgroundColor: '#A0522D',
        borderColor: '#A0522D',
        borderWidth: 1,
        data: [
          60, 50, 40, 30, 20
        ]
      },{
        label: 'バレーボール',
        backgroundColor: '#FFFF00',
        borderColor: '#FFFF00',
        borderWidth: 1,
        data: [
          60, 50, 40, 30, 20
        ]
      },{
        label: '卓球',
        backgroundColor: '#FFFFFF',
        borderColor: '#000000',
        borderWidth: 1,
        data: [
          60, 50, 40, 30, 20
        ]
      },{
        label: '6人7脚',
        backgroundColor: '#008000',
        borderColor: '#008000',
        borderWidth: 1,
        data: [
          60, 50, 40, 30, 20
        ]
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