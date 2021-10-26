<footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0-rc
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ url('template/admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ url('template/admin/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ url('template/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ url('template/admin/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ url('template/admin/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ url('template/admin/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ url('template/admin/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ url('template/admin/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ url('template/admin/plugins/moment/moment.min.js') }}"></script>
<script src="{{ url('template/admin/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ url('template/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ url('template/admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ url('template/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url('template/admin/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="{{ url('template/admin/dist/js/demo.js') }}"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ url('template/admin/dist/js/pages/dashboard.js') }}"></script>
@yield('onpage-js')
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
</body>
</html>
