<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.6/Chart.min.js"></script>
<script>
    var ctx3 = document.getElementById("lineChart").getContext('2d');
    //Set chart type ex: bar,pie,line etc.
    var type = 'line';
    //Function Random color of pie piece

    //Set data to show in chart
    var data = {
        labels: <?=json_encode($datas)?>,
        datasets: [{
            label: 'Number of Student',
            data: <?=json_encode($datasnum, JSON_NUMERIC_CHECK);?>,
            backgroundColor: "transparent"
          ,
            borderColor: "red",
            borderWidth: 1,
            borderDash: [3, 3],
            fill: false,
            pointRadius: 2,
            pointBackgroundColor: 'rgba(255,150,0,0.5)',
            pointHoverRadius: 2,
            pointHitRadius: 3,
            pointBorderWidth: 4,
            pointStyle: 'rectRounded',
            lineTension: 0,

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
                  autoSkip: false
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
    var lineChart = new Chart(ctx3,{type,data,options});
    $('#lineChart').css('background-color', 'rgba(255, 255, 255, 0.8)');
</script>
<br>
<br>
