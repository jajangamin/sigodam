@extends('master')

@section('dashboard')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    @include('kumulatif.data-pikcovid')
    @include('kumulatif.data-jdih')
    @include('kumulatif.data-kepegawaian')
</div>
<!-- /.content-wrapper -->
@stop

@section('onpage-js')
<script>
  var url = 'https://jdih.ciamiskab.go.id/api/get_perda_by_tahun';
  var url_2 = 'https://jdih.ciamiskab.go.id/api/get_perbup_by_tahun';
  var covid = 'https://pikcovid19.ciamiskab.go.id/api/get_data_covid';
    // perda
    $.ajax({
			url: url,
			method: 'get',
			datatType: 'json',
			success: function (data) {
        var json = JSON.stringify(Object.keys(data.data));
        var val = JSON.stringify(Object.values(data.data));
        var arr = JSON.parse(json);
        var value = JSON.parse(val);
        // var label = JSON.stringify(Object.keys(data.data));
				// var obj = JSON.parse(data);
        var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
        var donutData        = {
          labels: arr,
          datasets: [
            {
              data: value,
              backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
            }
          ]
        }
        var donutOptions     = {
          maintainAspectRatio : false,
          responsive : true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        new Chart(donutChartCanvas, {
          type: 'doughnut',
          data: donutData,
          options: donutOptions
        });
      }
		});
    
    // perbup
    $.ajax({
			url: url_2,
			method: 'get',
			datatType: 'json',
			success: function (data) {
        var json = JSON.stringify(Object.keys(data.data));
        var val = JSON.stringify(Object.values(data.data));
        var arr = JSON.parse(json);
        var value = JSON.parse(val);
        // var label = JSON.stringify(Object.keys(data.data));
				// var obj = JSON.parse(data);
        var donutChartCanvas = $('#pieChart').get(0).getContext('2d')
        var donutData        = {
          labels: arr,
          datasets: [
            {
              data: value,
              backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
            }
          ]
        }
        var donutOptions     = {
          maintainAspectRatio : false,
          responsive : true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        new Chart(donutChartCanvas, {
          type: 'doughnut',
          data: donutData,
          options: donutOptions
        });
      }
		});

    // pikcovid
    $.ajax({
			url: covid,
			method: 'get',
			datatType: 'json',
			success: function (data) {
        // key
        var key = JSON.stringify(Object.keys(data.data));
        var arr = JSON.parse(key);
        // positif
        var source = JSON.stringify(Object.values(data.data));
        var arr_p = JSON.parse(source);
        var positive = [];
        var aktif = [];
        var sembuh = [];
        var meninggal = [];
        var j_positive = 0;
        var j_aktif = 0;
        var j_sembuh = 0;
        var j_meninggal = 0;
        for (let i = 0; i < arr_p.length; i++) {
          positive.push(arr_p[i].positive);
          aktif.push(arr_p[i].aktif);
          sembuh.push(arr_p[i].sembuh);
          meninggal.push(arr_p[i].meninggal);
        }
        // perhitungan data positif
        for (let i = 0; i < positive.length; i++) {
          j_positive += positive[i];
        }
        for (let i = 0; i < aktif.length; i++) {
          j_aktif += aktif[i];
        }
        for (let i = 0; i < sembuh.length; i++) {
          j_sembuh += sembuh[i];
        }
        for (let i = 0; i < meninggal.length; i++) {
          j_meninggal += meninggal[i];
        }
        $("#positive").html(j_positive);
        $("#aktif").html(j_aktif);
        $("#sembuh").html(j_sembuh);
        $("#meninggal").html(j_meninggal);
        // console.log(j_positive);
        // console.log(meninggal)
        // console.log(arr);
    var ticksStyle = {
      fontColor: '#495057',
      fontStyle: 'bold'
    }

    var mode = 'index'
    var intersect = true

    var $salesChart = $('#sales-chart')
    // eslint-disable-next-line no-unused-vars
    var salesChart = new Chart($salesChart, {
      type: 'bar',
      data: {
        labels: arr,
        datasets: [
          { 
            backgroundColor: '#00a65a',
            borderColor: '#00a65a',
            data: positive
          },
          {
            backgroundColor: '#f56954',
            borderColor: '#f56954',
            data: aktif
          },
          {
            backgroundColor: '#007bff',
            borderColor: '#007bff',
            data: sembuh
          },
          {
            backgroundColor: '#000',
            borderColor: '#000',
            data: meninggal
          }
        ]
      },
      options: {
        maintainAspectRatio: false,
        tooltips: {
          mode: mode,
          intersect: intersect
        },
        hover: {
          mode: mode,
          intersect: intersect
        },
        legend: {
          display: false
        },
        scales: {
          yAxes: [{
            // display: false,
            gridLines: {
              display: true,
              lineWidth: '10px',
              color: 'rgba(0, 0, 0, .2)',
              zeroLineColor: 'transparent'
            },
            ticks: $.extend({
              beginAtZero: true,

              // Include a dollar sign in the ticks
              callback: function (value) {
                if (value >= 1000) {
                  value /= 1000
                  value += 'k'
                }

                return value
              }
            }, ticksStyle)
          }],
          xAxes: [{
            display: true,
            gridLines: {
              display: false
            },
            ticks: ticksStyle
          }]
        }
      }
    })
  }
		});
</script>
@stop