(function ($) {
  'use strict';
  var StatsLineOptions = {
    responsive: true,
    maintainAspectRatio: true,
    scales: {
      yAxes: [{
        display: false
      }],
      xAxes: [{
        display: false
      }]
    },
    legend: {
      display: false
    },
    elements: {
      point: {
        radius: 0
      },
      line: {
        tension: 0
      }
    },
    layout: {
      padding: {
        left: 0,
        right: 0,
        top: 0,
        bottom: 0
      }
    }
  };
  if ($('.circle-progress.success').length) {
    var c4 = $('.circle-progress.success');

    c4.circleProgress({
      startAngle: -Math.PI / 4 * 3,
      value: 0.4,
      lineCap: 'round',
      fill: {
        color: 'rgb(102.0, 226.0, 173.0)'
      },
      thickness: 12,
      size: 100
    });
  }
  if ($('.circle-progress.primary').length) {
    var c4 = $('.circle-progress.primary');
    c4.circleProgress({
      startAngle: -Math.PI / 4 * 3,
      value: 0.7,
      lineCap: 'round',
      fill: {
        color: '#1458e8'
      },
      thickness: 12,
      size: 100
    });
  }
  if ($('#stats-line-graph_1').length) {
    var lineChartCanvas = $("#stats-line-graph_1").get(0).getContext("2d");
    var data = {
      labels: ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9"],
      datasets: [{
        label: 'Product',
        data: [3, 3, 8, 5, 7, 4, 6, 4, 6, 3],
        backgroundColor: '#9cf7d7',
        borderColor: '#1dd795',
        borderWidth: 2,
        fill: true
      }]
    };
    var lineChart = new Chart(lineChartCanvas, {
      type: 'line',
      data: data,
      options: StatsLineOptions
    });
  }
  if ($('#stats-line-graph_2').length) {
    var lineChartCanvas = $("#stats-line-graph_2").get(0).getContext("2d");
    var data = {
      labels: ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9"],
      datasets: [{
        label: 'Product',
        data: [6, 3, 8, 2, 4, 7, 2, 1, 2, 7],
        backgroundColor: '#febeb9',
        borderColor: '#ff6358',
        borderWidth: 2,
        fill: true
      }]
    };
    var lineChart = new Chart(lineChartCanvas, {
      type: 'line',
      data: data,
      options: StatsLineOptions
    });
  }
  if ($('#stats-line-graph_3').length) {
    var lineChartCanvas = $("#stats-line-graph_3").get(0).getContext("2d");
    var data = {
      labels: ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9"],
      datasets: [{
        label: 'Product',
        data: [7, 2, 6, 8, 5, 4, 7, 5, 2, 8],
        backgroundColor: '#a8d4f8',
        borderColor: '#2196f3',
        borderWidth: 2,
        fill: true
      }]
    };
    var lineChart = new Chart(lineChartCanvas, {
      type: 'line',
      data: data,
      options: StatsLineOptions
    });
  }
  if ($('#stats-line-graph_4').length) {
    var lineChartCanvas = $("#stats-line-graph_4").get(0).getContext("2d");
    var data = {
      labels: ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9"],
      datasets: [{
        label: 'Product',
        data: [3, 3, 8, 5, 7, 4, 6, 4, 6, 3],
        backgroundColor: '#fddf9e',
        borderColor: '#ffaf01',
        borderWidth: 2,
        fill: true
      }]
    };
    var lineChart = new Chart(lineChartCanvas, {
      type: 'line',
      data: data,
      options: StatsLineOptions
    });
  }
  if ($('#total-sales').length) {
    var areaData = {
      labels: ["Jul 2018", "Aug 2018", "Sep 2018", "Oct 2018", "Nov 2018", "Dec 2018", "Jan 2019", "Feb 2019", "Mar 2019", "Apr 2019", "May 2019", "Jun 2019", "Jul 2019", "Aug 2019", "Sep 2019", "Oct 2019", "Nov 2019", "Dec 2019", "Jan 2019", "Feb 2019", "Mar 2019", "Apr 2019", "May 2019", "Jun 2019", "Jul 2019", "Aug 2019"],
      datasets: [{
        label: 'Enterprise',
        data: [19549,
          25990,
          9232,
          15494,
          14756,
          13096,
          26315,
          29236,
          19181,
          27484,
          3824,
          16140,
          12054,
          13797,
          23824,
          11660,
          8316,
          16862,
          2525,
          22587,
          16613,
          22056,
          13672,
          10099,
          15151,
          26362,
          20801
        ],
        borderColor: '#1458e8',
        backgroundColor: '#e1eaff',
        borderWidth: 3
      }]
    };
    var areaOptions = {
      responsive: true,
      animation: {
        animateScale: true,
        animateRotate: true
      },
      elements: {
        point: {
          radius: 0
        },
        line: {
          tension: 0
        }
      },
      layout: {
        padding: {
          left: 0,
          right: 0,
          top: 0,
          bottom: 0
        }
      },
      legend: false,
      stepsize: 10000,
      scales: {
        xAxes: [{
          scaleLabel: {
            display: true,
            labelString: 'month',
            fontSize: 16,
            lineHeight: 2
          },
          ticks: {
            autoSkip: true,
            autoSkipPadding: 60,
            maxRotation: 0,
            maxTicksLimit: 10,
            fontColor: '#bfccda'
          },
          gridLines: {
            color: '#f2f2f2',
            display: true
          }
        }],
        yAxes: [{
          scaleLabel: {
            display: true,
            labelString: 'revenue by sales',
            fontSize: 16,
            lineHeight: 2
          },
          ticks: {
            fontColor: '#bfccda'
          },
          gridLines: {
            display: false
          }
        }]
      }
    }
    var ctx = document.getElementById('total-sales').getContext('2d');
    var revenueChart = new Chart(ctx, {
      type: 'line',
      data: areaData,
      options: areaOptions
    });

    $("#total-sales").html(revenueChart.generateLegend());
  }
  if ($('#overview-areachart_1').length) {
    var areaData = {
      labels: ["04", "08", "12", "1", "20"],
      datasets: [{
        label: 'This month',
        data: [6, 2, 7, 3, 1],
        borderColor: '#8862e0',
        backgroundColor: 'rgba(255,255,255,0)',
        borderWidth: 3
      }, {
        label: 'This week',
        data: [2, 6, 3, 8, 2],
        borderColor: '#bfccda',
        backgroundColor: '#e5e9f2',
        borderWidth: 3
      }]
    };
    var areaOptions = {
      responsive: true,
      animation: {
        animateScale: true,
        animateRotate: true
      },
      elements: {
        point: {
          radius: 0
        }
      },
      layout: {
        padding: {
          left: -10,
          right: 0,
          top: 0,
          bottom: -10
        }
      },
      legend: false,
      stepsize: 200,
      min: 0,
      max: 400,
      scales: {
        xAxes: [{
          ticks: {
            display: false
          },
          gridLines: {
            display: false
          }
        }],
        yAxes: [{
          ticks: {
            display: false
          },
          gridLines: {
            display: false
          }
        }]
      }
    }
    var ctx = document.getElementById('overview-areachart_1').getContext('2d');
    var revenueChart = new Chart(ctx, {
      type: 'line',
      data: areaData,
      options: areaOptions
    });
  }
  if ($('#overview-areachart_2').length) {
    var areaData = {
      labels: ["04", "08", "12", "1", "20"],
      datasets: [{
        label: 'This month',
        data: [1, 5, 1, 3, 4],
        borderColor: '#8862e0',
        backgroundColor: 'rgba(255,255,255,0)',
        borderWidth: 3
      }, {
        label: 'This week',
        data: [2, 6, 3, 8, 2],
        borderColor: '#bfccda',
        backgroundColor: '#e5e9f2',
        borderWidth: 3
      }]
    };
    var areaOptions = {
      responsive: true,
      animation: {
        animateScale: true,
        animateRotate: true
      },
      elements: {
        point: {
          radius: 0
        }
      },
      layout: {
        padding: {
          left: -10,
          right: 0,
          top: 0,
          bottom: -10
        }
      },
      legend: false,
      stepsize: 200,
      min: 0,
      max: 400,
      scales: {
        xAxes: [{
          ticks: {
            display: false
          },
          gridLines: {
            display: false
          }
        }],
        yAxes: [{
          ticks: {
            display: false
          },
          gridLines: {
            display: false
          }
        }]
      }
    }
    var ctx = document.getElementById('overview-areachart_2').getContext('2d');
    var revenueChart = new Chart(ctx, {
      type: 'line',
      data: areaData,
      options: areaOptions
    });
  }
  if ($('#overview-areachart_3').length) {
    var areaData = {
      labels: ["04", "08", "12", "1", "20"],
      datasets: [{
        label: 'This month',
        data: [2, 5, 2, 1, 7],
        borderColor: '#8862e0',
        backgroundColor: 'rgba(255,255,255,0)',
        borderWidth: 3
      }, {
        label: 'This week',
        data: [2, 6, 3, 8, 2],
        borderColor: '#bfccda',
        backgroundColor: '#e5e9f2',
        borderWidth: 3
      }]
    };
    var areaOptions = {
      responsive: true,
      animation: {
        animateScale: true,
        animateRotate: true
      },
      elements: {
        point: {
          radius: 0
        }
      },
      layout: {
        padding: {
          left: -10,
          right: 0,
          top: 0,
          bottom: -10
        }
      },
      legend: false,
      stepsize: 200,
      min: 0,
      max: 400,
      scales: {
        xAxes: [{
          ticks: {
            display: false
          },
          gridLines: {
            display: false
          }
        }],
        yAxes: [{
          ticks: {
            display: false
          },
          gridLines: {
            display: false
          }
        }]
      }
    }
    var ctx = document.getElementById('overview-areachart_3').getContext('2d');
    var revenueChart = new Chart(ctx, {
      type: 'line',
      data: areaData,
      options: areaOptions
    });
  }
  if ($('#horizontal-bar-chart').length) {
    var barChartData = {
      labels: [
        "MA",
        "FEB",
        "JA"
      ],
      datasets: [{
          label: "American Express",
          backgroundColor: "#8862e0",
          borderColor: "#8862e0",
          borderWidth: 1,
          data: [3, 5, 6, 7, 3, 5, 6, 7]
        },
        {
          label: "Mastercard",
          backgroundColor: "#2196f3",
          borderColor: "#2196f3",
          borderWidth: 1,
          data: [4, 7, 3, 6, 10, 7, 4, 6]
        },
        {
          label: "Paypal",
          backgroundColor: "#1dd795",
          borderColor: "#1dd795",
          borderWidth: 1,
          data: [10, 7, 4, 6, 9, 7, 3, 10]
        }
      ]
    };

    var chartOptions = {
      responsive: true,
      legend: false,
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true
          }
        }]
      },
      ticks: {
        display: true,
        color: "grey"
      }
    }
    var ctx = document.getElementById("horizontal-bar-chart").getContext("2d");
    window.myBar = new Chart(ctx, {
      type: "horizontalBar",
      data: barChartData,
      options: chartOptions
    });
  }
  if ($('#sales-info-bar').length) {
    var barChartData = {
      labels: [
        "JAN",
        "FEB",
        "MAR",
        "APR",
        "MAR"
      ],
      datasets: [{
          label: "Mastercard",
          backgroundColor: "#2196f3",
          borderColor: "#2196f3",
          borderWidth: 1,
          data: [4, 7, 3, 6, 10, 7, 4, 6]
        },
        {
          label: "American Express",
          backgroundColor: "#74bdf8",
          borderColor: "#74bdf8",
          borderWidth: 1,
          data: [3, 5, 6, 7, 3, 5, 6, 7]
        }
      ]
    };

    var chartOptions = {
      responsive: true,
      legend: false,
      categoryPercentage: 3,
      scales: {
        xAxes: [{
          ticks: {
            display: true,
            fontColor: '#bfccda'
          },
          gridLines: {
            display: false
          }
        }],
        yAxes: [{
          display: false,
          ticks: {
            display: false
          },
          gridLines: {
            display: false
          }
        }]
      },
      ticks: {
        display: true,
        color: "grey"
      }
    }
    var ctx = document.getElementById("sales-info-bar").getContext("2d");
    window.myBar = new Chart(ctx, {
      type: "bar",
      data: barChartData,
      options: chartOptions
    });
  }
  if ($('#dashboard-bar-chart').length) {
    var barChartData = {
      labels: [
        "JAN",
        "FEB",
        "MAR",
        "APR",
        "MAY",
        "JUN",
        "JUL",
        "AUG",
        "SEP",
        "OCT",
        "NOV"
      ],
      datasets: [{
          label: "esjfk",
          backgroundColor: "#1dd795",
          borderColor: "#1dd795",
          borderWidth: 1,
          data: [2, 5, 6, 7, 3, 5, 6, 7, 2, 5, 3]
        },
        {
          label: "Mastercard",
          backgroundColor: "#2196f3",
          borderColor: "#2196f3",
          borderWidth: 1,
          data: [4, 7, 3, 6, 5, 7, 4, 6, 3, 6, 2]
        },
        {
          label: "gsd",
          backgroundColor: "#d8d8d8",
          borderColor: "#d8d8d8",
          borderWidth: 1,
          data: [3, 2, 3, 2, 7, 3, 4, 2, 6, 4, 7]
        }
      ]
    };

    var chartOptions = {
      responsive: true,
      maintainAspectRatio: true,
      legend: false,
      categoryPercentage: 3,
      stacked: true,
      scales: {
        xAxes: [{
          ticks: {
            display: true,
            fontColor: '#001737'
          },
          stacked: true,
          barPercentage: 0.2
        }],
        yAxes: [{
          display: true,
          ticks: {
            display: false
          }
        }]
      }
    }
    var ctx = document.getElementById("dashboard-bar-chart").getContext("2d");
    window.myBar = new Chart(ctx, {
      type: "bar",
      data: barChartData,
      options: chartOptions
    });
  }
  if ($('#financial-information').length) {
    var financialLineChartCanvas = $("#financial-information").get(0).getContext("2d");
    var gradientStrokeFill_1 = financialLineChartCanvas.createLinearGradient(1, 2, 1, 250);
    gradientStrokeFill_1.addColorStop(0, "rgba(33, 219, 176, 0.9)");
    gradientStrokeFill_1.addColorStop(1, "rgba(255,255,255,0.4)");
    var gradientStrokeFill_2 = financialLineChartCanvas.createLinearGradient(1, 2, 1, 200);
    gradientStrokeFill_2.addColorStop(0, "rgba(20, 88, 232, 0.37)");
    gradientStrokeFill_2.addColorStop(1, "rgba(255,255,255,0.4)");
    var areaData = {
      labels: ["04", "08", "12", "1", "20"],
      datasets: [{
        label: 'Turnover',
        data: [1, 4, 8, 3, 7, 6, 7, 1, 7, 8],
        borderColor: "#1dd795",
        backgroundColor: gradientStrokeFill_1,
        borderWidth: 3,
        fill: true
      }, {
        label: 'Impression',
        data: [5, 12, 9, 15, 13, 12, 13, 4, 11, 18],
        borderColor: "#2196f3",
        backgroundColor: gradientStrokeFill_2,
        borderWidth: 3
      }]
    };
    var areaOptions = {
      responsive: true,
      animation: {
        animateScale: true,
        animateRotate: true
      },
      elements: {
        point: {
          pointStyle: 'circle',
          radius: 2,
        }
      },
      layout: {
        padding: {
          left: 0,
          right: 0,
          top: 0,
          bottom: 0
        }
      },
      legend: false,
      stepsize: 5,
      min: 0,
      max: 15,
      scales: {
        xAxes: [{
          ticks: {
            display: true
          },
          gridLines: {
            display: true,
            color: "#e5e9f2"
          }
        }],
        yAxes: [{
          ticks: {
            display: true
          },
          gridLines: {
            display: false
          }
        }]
      }
    }
    var revenueChart = new Chart(financialLineChartCanvas, {
      type: 'line',
      data: areaData,
      options: areaOptions
    });
  }
  if ($("#humanResouceDoughnutChart").length) {
    var doughnutChartCanvas = $("#humanResouceDoughnutChart").get(0).getContext("2d");
    var doughnutPieData = {
      datasets: [{
        data: [20, 80, 85],
        backgroundColor: [
          successColor,
          primaryColor,
          dangerColor
        ],
        borderColor: [
          successColor,
          primaryColor,
          dangerColor
        ],
      }],

      // These labels appear in the legend and in the tooltips when hovering different arcs
      labels: [
        'Human Resources',
        'Manger',
        'Other'
      ]
    };
    var doughnutPieOptions = {
      cutoutPercentage: 65,
      animationEasing: "easeOutBounce",
      animateRotate: true,
      animateScale: false,
      responsive: true,
      maintainAspectRatio: true,
      showScale: true,
      legend: {
        display: false
      },
      layout: {
        padding: {
          left: 0,
          right: 0,
          top: 0,
          bottom: 0
        }
      }
    };
    var doughnutChart = new Chart(doughnutChartCanvas, {
      type: 'doughnut',
      data: doughnutPieData,
      options: doughnutPieOptions
    });
  }
})(jQuery);