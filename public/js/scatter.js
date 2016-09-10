$(function () {
    $('#container').highcharts({
        chart: {
            type: 'scatter',
            zoomType: 'xy'
        },
        credits: {
          enabled: false
        },
        title: {
            text: 'Duration of calls vs Time of Day'
        },
        subtitle: {
            text: 'Up to the minute data on call duration/time of day'
        },
        xAxis: {
            title: {
                enabled: true,
                text: 'Hour'
            },
            startOnTick: true,
            endOnTick: true,
            showLastLabel: true
        },
        yAxis: {
            title: {
                text: 'Duration (Seconds)'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'left',
            verticalAlign: 'top',
            x: 100,
            y: 70,
            floating: true,
            backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF',
            borderWidth: 1
        },
        plotOptions: {
            scatter: {
                marker: {
                    radius: 5,
                    states: {
                        hover: {
                            enabled: true,
                            lineColor: 'rgb(100,100,100)'
                        }
                    }
                },
                states: {
                    hover: {
                        marker: {
                            enabled: false
                        }
                    }
                },
                tooltip: {
                    headerFormat: '<b>{series.name}</b><br>',
                    pointFormat: '{point.x} o\' clock, {point.y} seconds'
                }
            }
        },
        series: [{
            name: 'Neutral',
            color: 'rgba(255, 255, 0, .5)',
            data: neutralScatter

        }, {
            name: 'Positive',
            color: 'rgba(0, 128, 0, .5)',
            data: positiveScatter
        },
        {
            name: 'Negative',
            color: 'rgba(255, 0, 0, .5)',
            data: negativeScatter
        },
      ]
    });
});
