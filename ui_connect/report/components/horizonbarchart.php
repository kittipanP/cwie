<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.6/Chart.min.js"></script>
<script>
    var ctx4 = document.getElementById("horizonbarChart").getContext('2d');
    //Set chart type ex: bar,pie,line etc.
    var type = 'horizontalBar';
    //Function Random color of pie piece
    var randomColor = function () {
        return '#' + (Math.random().toString(16) + '0000000').slice(2, 8);
      //return "#"+((1<<24)*Math.random()|0).toString(16);
    };
    //Set data to show in chart
    var data = {
        labels: <?=json_encode($datas)?>,
        datasets: [{
            fill: false,
            label: 'Number of Students',
            data: <?=json_encode($datasnum, JSON_NUMERIC_CHECK);?>,
            backgroundColor: [
              "rgba(127,255,212,1)",
              "rgba(255,255,0,1)",
              "rgba(210,105,30,1)",
              "rgba(77,77,255,1)",
              "rgba(255,0,0,1)",
              "rgba(139,69,19,1)",
              "rgba(238,130,238,1)",
              "rgba(154,205,50,1)",
              "rgba(100,149,237,1)",
              "rgba(165,42,42,1)",
              "rgba(95,158,160,1)",
              "rgba(127,255,0,1)",
              "rgba(255,127,80,1)",
              "rgba(100,149,237,1)",
              "rgba(220,20,60,1)",
              "rgba(0,139,139,1)",
              "rgba(0,100,0,1)",
              "rgba(153,50,204,1)",
              "rgba(143,188,143,1)",
              "rgba(72,61,139,1)",
              "rgba(255,222,173,1)",
              "rgba(128,128,128,1)",
              "rgba(47,79,79,1)",
              "rgba(255,20,147,1)",
              "rgba(30,144,255,1)",
              "rgba(178,34,34,1)",
              "rgba(105,105,105,1)",
              "rgba(255,215,0,1)",
              "rgba(173,255,47,1)",
              "rgba(255,105,180,1)",
              "rgba(75,0,130,1)",
              "rgba(205,92,92,1)",
              "rgba(144,238,144,1)",
              "rgba(32,178,170,1)",
              "rgba(85,107,47,1)",
              "rgba(147,112,219,1)",
              "rgba(60,179,113,1)",
              "rgba(128,128,0,1)",
              "rgba(255,165,0,1)",
              "rgba(255,69,0,1)",
              "rgba(205,133,63,1)",
              "rgba(106,90,205,1)",
              "rgba(0,255,127,1)",
              "rgba(70,130,180,1)",
              "rgba(255,99,71,1)",
              "rgba(0,128,128,1)",
              "rgba(127,255,212,0.5)",
              "rgba(255,255,0,0.5)",
              "rgba(210,105,30,0.5)",
              "rgba(77,77,255,0.5)",
              "rgba(255,0,0,0.5)",
              "rgba(139,69,19,0.5)",
              "rgba(238,130,238,0.5)",
              "rgba(154,205,50,0.5)",
              "rgba(100,149,237,0.5)",
              "rgba(165,42,42,0.5)",
              "rgba(95,158,160,0.5)",
              "rgba(127,255,0,0.5)",
              "rgba(255,127,80,0.5)",
              "rgba(100,149,237,0.5)",
              "rgba(220,20,60,0.5)",
              "rgba(0,139,139,0.5)",
              "rgba(0,100,0,0.5)",
              "rgba(153,50,204,0.5)",
              "rgba(143,188,143,0.5)",
              "rgba(72,61,139,0.5)",
              "rgba(255,222,173,0.5)",
              "rgba(128,128,128,0.5)",
              "rgba(47,79,79,0.5)",
              "rgba(255,20,147,0.5)",
              "rgba(30,144,255,0.5)",
              "rgba(178,34,34,0.5)",
              "rgba(105,105,105,0.5)",
              "rgba(255,215,0,0.5)",
              "rgba(173,255,47,0.5)",
              "rgba(255,105,180,0.5)",
              "rgba(75,0,130,0.5)",
              "rgba(205,92,92,0.5)",
              "rgba(144,238,144,0.5)",
              "rgba(32,178,170,0.5)",
              "rgba(85,107,47,0.5)",
              "rgba(147,112,219,0.5)",
              "rgba(60,179,113,0.5)",
              "rgba(128,128,0,0.5)",
              "rgba(255,165,0,0.5)",
              "rgba(255,69,0,0.5)",
              "rgba(205,133,63,0.5)",
              "rgba(106,90,205,0.5)",
              "rgba(0,255,127,0.5)",
              "rgba(70,130,180,0.5)",
              "rgba(255,99,71,0.5)",
              "rgba(0,128,128,0.5)",

              "rgba(127,255,212,0.3)",
              "rgba(255,255,0,0.3)",
              "rgba(210,105,30,0.3)",
              "rgba(77,77,255,0.3)",
              "rgba(255,0,0,0.3)",
              "rgba(139,69,19,0.3)",
              "rgba(238,130,238,0.3)",
              "rgba(154,205,50,0.3)",
              "rgba(100,149,237,0.3)",
              "rgba(165,42,42,0.3)",
              "rgba(95,158,160,0.3)",
              "rgba(127,255,0,0.3)",
              "rgba(255,127,80,0.3)",
              "rgba(100,149,237,0.3)",
              "rgba(220,20,60,0.3)",
              "rgba(0,139,139,0.3)",
              "rgba(0,100,0,0.3)",
              "rgba(153,50,204,0.3)",
              "rgba(143,188,143,0.3)",
              "rgba(72,61,139,0.3)",
              "rgba(255,222,173,0.3)",
              "rgba(128,128,128,0.3)",
              "rgba(47,79,79,0.3)",
              "rgba(255,20,147,0.3)",
              "rgba(30,144,255,0.3)",
              "rgba(178,34,34,0.3)",
              "rgba(105,105,105,0.3)",
              "rgba(255,215,0,0.3)",
              "rgba(173,255,47,0.3)",
              "rgba(255,105,180,0.3)",
              "rgba(75,0,130,0.3)",
              "rgba(205,92,92,0.3)",
              "rgba(144,238,144,0.3)",
              "rgba(32,178,170,0.3)",
              "rgba(85,107,47,0.3)",
              "rgba(147,112,219,0.3)",
              "rgba(60,179,113,0.3)",
              "rgba(128,128,0,0.3)",
              "rgba(255,165,0,0.3)",
              "rgba(255,69,0,0.3)",
              "rgba(205,133,63,0.3)",
              "rgba(106,90,205,0.3)",
              "rgba(0,255,127,0.3)",
              "rgba(70,130,180,0.3)",
              "rgba(255,99,71,0.3)",
              "rgba(0,128,128,0.3)",
            ]
          ,
            borderColor: [],
            borderWidth: 1
        }]
    };
    //Set chart properties
    var options = {
        maintainAspectRatio: false,
        responsive: false,
        title: {
            display: true,
            position: "top",
            //text: "Student Information",
            fontSize: 18,
            fontColor: "#000000"
        },
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true,
                }
            }],
            xAxes: [{
                ticks: {
                  autoSkip: false,
                  beginAtZero:true
                }
            }]
        },
        tooltips: {
          callbacks: {
            title: function(tooltipItems, data) {
              return '';
            },
            label: function(tooltipItem, data) {
              var datasetLabel = '';
              var label = data.labels[tooltipItem.index];
              return data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
            }
          }
        },showAllTooltips: true

    };

    Chart.pluginService.register({
         beforeRender: function (chart) {
            if (chart.config.options.showAllTooltips) {
                  // create an array of tooltips
                  // we can't use the chart tooltip because there is only one tooltip per chart
                  chart.pluginTooltips = [];
                  chart.config.data.datasets.forEach(function (dataset, i) {
                       chart.getDatasetMeta(i).data.forEach(function (sector, j) {
                            chart.pluginTooltips.push(new Chart.Tooltip({
                                _chart: chart.chart,
                                _chartInstance: chart,
                                _data: chart.data,
                                _options: chart.options.tooltips,
                                _active: [sector]
                            }, chart));
                       });
                  });

                 // turn off normal tooltips
                 chart.options.tooltips.enabled = false;
           }
        },
        afterDraw: function (chart, easing) {
          if (chart.config.options.showAllTooltips) {
            // we don't want the permanent tooltips to animate, so don't do anything till the animation runs atleast once
            if (!chart.allTooltipsOnce) {
              if (easing !== 1)
                return;
              chart.allTooltipsOnce = true;
            }

          // turn on tooltips
              chart.options.tooltips.enabled = true;
              Chart.helpers.each(chart.pluginTooltips, function (tooltip) {
                tooltip.initialize();
                tooltip.update();
                // we don't actually need this since we are not animating tooltips
                tooltip.pivot();
                tooltip.transition(easing).draw();
              });
              chart.options.tooltips.enabled = false;
          }
        }
    })

      Chart.defaults.global.defaultFontColor = 'black';
      Chart.defaults.global.defaultFontSize = 15;
      Chart.defaults.global.defaultFontStyle = 'bold';
      var horizonbarChart = new Chart(ctx4,{type,data,options});
      $('#horizonbarChart').css('background-color', 'rgba(255, 255, 255, 0.8)');
</script>
<br>
<br>
