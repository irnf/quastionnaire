<?php //print_r($gl_arr["VIEW_DATA"]["graph_list"]);
      $json_sports = json_encode($gl_arr["VIEW_DATA"]["graph_list"] , JSON_PRETTY_PRINT);
      //app_log($json_sports);
      //echo ($json_sports);?>

<html>
<canvas class="my-4 w-100" id="myChart" width="900" height="380">
<script>
    let data_array = <?php echo $json_sports ;?>;
    //console.log(data_array);
/**格納用配列を準備します。*/
foot  = [];
softb = [];
softt = [];
bad   = [];
bas   = [];
val   = [];
tab   = [];
run   = [];
for(key in data_array){
    //古い書き方
    /*foot.push(data_array[key]["foot"]);
    softb.push(data_array[key]["softball"]);
    softt.push(data_array[key]["softtennis"]);
    bad.push(data_array[key]["bad"]);
    bas.push(data_array[key]["bas"]);
    val.push(data_array[key]["val"]);
    tab.push(data_array[key]["tab"]);
    run.push(data_array[key]["run"]);*/

    //新しい書き方
    foot[key] = data_array[key]["foot"]; 
    softb[key] = data_array[key]["softball"];
    softt[key] = data_array[key]["softtennis"];
    bad[key]= data_array[key]["bad"];
    bas[key] = data_array[key]["bas"];
    val[key]= data_array[key]["val"];
    tab[key] = data_array[key]["tab"];
    run[key] = data_array[key]["run"];
}
console.log(foot[0]);
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
        data: foot
      },{
        label:'ソフトボール',
        backgroundColor: '#DC143C',
        borderColor: '#DC143C',
        borderWidth: 1,
        data: softb
      },{
        label: 'ソフトテニス',
        backgroundColor: '#7FFF00',
        borderColor: '#7FFF00',
        borderWidth: 1,
        data: softt
      },{
        label: 'バドミントン',
        backgroundColor: '#00BFFF',
        borderColor: '#00BFFF',
        borderWidth: 1,
        data: bad
      },{
        label: 'バスケットボール',
        backgroundColor: '#A0522D',
        borderColor: '#A0522D',
        borderWidth: 1,
        data: bas
      },{
        label: 'バレーボール',
        backgroundColor: '#FFFF00',
        borderColor: '#FFFF00',
        borderWidth: 1,
        data: val
      },{
        label: '卓球',
        backgroundColor: '#FFFFFF',
        borderColor: '#000000',
        borderWidth: 1,
        data: tab
      },{
        label: '6人7脚',
        backgroundColor: '#008000',
        borderColor: '#008000',
        borderWidth: 1,
        data: run
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
</script>
</canvas>
</html>