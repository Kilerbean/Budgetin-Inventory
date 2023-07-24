// categorization chart
var allcategorizationstatus = {
    chart: {
        height: 450,
        type: 'bar',
        toolbar:{
          show: false
        }
    },
    plotOptions: {
        bar: {
            horizontal: false,
            endingShape: 'rounded',            
        }
    },
    dataLabels: {
        enabled: false
    },
    series: [{
        name: 'Count',
        data: categorizationcount
    }],
    xaxis: {
        categories: categorization,
    },
    colors:['#02C239'],
    fill: {
        type: "gradient",
        gradient: {
          shadeIntensity: 0.1,
          opacityFrom: 0.8,
          opacityTo: 1,
          stops: [0, 90, 100]
        }
      },
}

var chartallcategorization = new ApexCharts(
    document.querySelector("#all-lup-categorization"),
    allcategorizationstatus
);
chartallcategorization.render();