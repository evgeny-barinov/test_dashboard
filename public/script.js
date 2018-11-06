$(function() {
  Highcharts.chart('container', {
    chart: {
      type: 'spline'
    },
    title: {
      text: 'Daily Stat'
    },
    xAxis: {
      categories: stat['days']
    },
    yAxis: {
      title: {
        text: 'Number'
      }
    },
    tooltip: {
      crosshairs: false,
      shared: true
    },
    plotOptions: {
      spline: {
        marker: {
          radius: 4,
          lineColor: '#666666',
          lineWidth: 1
        }
      }
    },
    series: [{
      name: 'Orders',
      marker: {
        symbol: 'square'
      },
      data: stat['orders'].map(function(item) {return parseInt(item);})

    }, {
      name: 'Customers',
      marker: {
        symbol: 'diamond'
      },
      data: stat['customers'].map(function(item) {return parseInt(item);})
    }]
  });
});