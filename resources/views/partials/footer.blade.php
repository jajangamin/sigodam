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
        console.log(data)
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
        console.log(data)
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
<!-- <script src="{{ asset('js/peta_desa.js') }}"></script> -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://code.highcharts.com/modules/variable-pie.js"></script>

<!--Prokes Individu JS -->
<script type="text/javascript">
    var url = "https://prokes.ciamiskab.go.id/api/prokes_individu";
    $.ajax({
        data: 'json',
        method: 'get',
        url: url,
        data: {
            periode_kasus: "{{ request()->periode_kasus }}"
        },
        beforeSend: function(){
            var loading = '<div id="fountainG_1" class="fountainG"></div>';
            loading += '<div id="fountainG_1" class="fountainG"></div>';
            loading += '<div id="fountainG_2" class="fountainG"></div>';
            loading += '<div id="fountainG_3" class="fountainG"></div>';
            loading += '<div id="fountainG_4" class="fountainG"></div>';
            loading += '<div id="fountainG_5" class="fountainG"></div>';
            loading += '<div id="fountainG_6" class="fountainG"></div>';
            loading += '<div id="fountainG_7" class="fountainG"></div>';
            $('.fountainX').html(loading)
        }
    }).done(function(states) {
        const properties = []
        $.each(states.features, function(index, value){
            properties.push(value.properties)
        })
        var kecamatan = properties
        Highcharts.chart('pie', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Kepatuhan Prokes Individu'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.y} %</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.y} %'
                    }
                }
            },
            series: [{
                name: 'Level ',
                colorByPoint: true,
                data: kecamatan
            }]
        });
    })
</script>
<script>
  var map = L.map('map-prokes').setView([-7.300000, 108.400000], 10);
    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        maxZoom: 18,
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/light-v9',
        tileSize: 512,
        zoomOffset: 1
    }).addTo(map);


    // control that shows state info on hover
    var info = L.control();

    info.onAdd = function(map) {
        this._div = L.DomUtil.create('div', 'info');
        this.update();
        return this._div;
    };

    info.update = function(props) {
        var total = props ? props.total_kasus : '';
        this._div.innerHTML = '<p><strong>Presentasi Kepatuhan Prokes</strong></p>' + (props ?
            '<b>' + props.name + '</b><br /> Level : ' + props.density:
            'Gerakan Kursor Dalam Peta');
    };

    info.addTo(map);


    // get color depending on population density value
    // function getColor(d) {
    //     return d < 1.5 ? '#00ff00':
    //         d < 2.5 ? '#ffff00' :
    //         d < 3.5 ? '#ff9900' :
    //         d >= 3.5 ? '#ff3300' : '#ff3300';
    // }

    function getColor(d) {
        return d == 0 ? '#ffe6e6':
            d < 61 ? '#ff3300':
            d < 76 ? '#ff9900' :
            d < 91 ? '#ffff00' :
            d > 91 ? '#00ff00' : '#ffe6e6';
    }

    function style(feature) {
        return {
            weight: 2,
            opacity: 1,
            color: 'white',
            dashArray: '3',
            fillOpacity: 0.7,
            fillColor: getColor(feature.properties.density)
        };
    }

    function highlightFeature(e) {
        var layer = e.target;

        layer.setStyle({
            weight: 5,
            color: '#666',
            dashArray: '',
            fillOpacity: 0.7
        });

        if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
            layer.bringToFront();
        }

        info.update(layer.feature.properties);
    }

    var geojson;

    function resetHighlight(e) {
        geojson.resetStyle(e.target);
        info.update();
    }

    function zoomToFeature(e) {
        map.fitBounds(e.target.getBounds());
    }

    function onEachFeature(feature, layer) {
        layer.on({
            mouseover: highlightFeature,
            mouseout: resetHighlight,
            click: zoomToFeature
        });
    }

    var url = "https://prokes.ciamiskab.go.id/api/prokes_individu";
    $.ajax({
        data: 'json',
        method: 'get',
        url: url,
        data: {
            periode_kasus: "{{ request()->periode_kasus }}"
        },
        beforeSend: function(){
            var loading = '<div id="fountainG_1" class="fountainG"></div>';
            loading += '<div id="fountainG_1" class="fountainG"></div>';
            loading += '<div id="fountainG_2" class="fountainG"></div>';
            loading += '<div id="fountainG_3" class="fountainG"></div>';
            loading += '<div id="fountainG_4" class="fountainG"></div>';
            loading += '<div id="fountainG_5" class="fountainG"></div>';
            loading += '<div id="fountainG_6" class="fountainG"></div>';
            loading += '<div id="fountainG_7" class="fountainG"></div>';
            $('.fountainX').html(loading)
        }
    }).done(function(states) {
        $('.fountainX').html(' ')
        // console.log(states.features)
        var kecamatan = [];
        var jumlah_penduduk = [];
        var color = [];
        $.each(states.features, function(index, value){
            kecamatan.push(value.properties.name)
            jumlah_penduduk.push(value.properties.density)
            color.push('#FD8D3C')
        })
        geojson = L.geoJson(states, {
            style: style,
            onEachFeature: onEachFeature
        }).addTo(map);

        // map.attributionControl.addAttribution('Population data &copy; <a href="http://census.gov/">US Census Bureau</a>');


        var legend = L.control({
            position: 'bottomleft'
        });

        legend.onAdd = function(map) {

            var div = L.DomUtil.create('div', 'info legend'),
                grades = ["0 - 60%", "61 - 75%", "76 - 90%", "91 - 100%"],
                labels = ["Keterangan"],
                from, to;

            for (var i = 0; i < 4; i++) {
                patokan = [60, 75, 90, 100]
                to = i + 1;
                labels.push(
                    '<i style="background:' + getColor(patokan[i]) + '"></i> ' +
                    grades[i]);
            }

            div.innerHTML = labels.join('<br>');
            return div;
        };

        legend.addTo(map);
    })
</script>
<script>
  $(document).ready(function(){
      $.ajax({
          dataType: 'json',
          method : 'get',
          url : 'https://prokes.ciamiskab.go.id/api/prokes_summary_individu',
          data: {
            periode_kasus: "{{ request()->periode_kasus }}"
          },
      }).done(function(response){
            $('.kecamatan').html(response.kecamatan)
            $('.desa').html(response.desa)
            $('.pakai_masker').html(response.pakai_masker)
            $('.jaga_jarak').html(response.jaga_jarak)
            $('.kepatuhan_pakai_masker').html(response.kepatuhan_pakai_masker)
            $('.kepatuhan_jaga_jarak').html(response.kepatuhan_jaga_jarak)
            $('.kepatuhan_prokes').html(response.kepatuhan_prokes)
            $('.periode_kasus').html('Update terakhir <br />' + response.periode_kasus)
      })
  })
</script>
<script>
    $(document).ready(function () {
        // INITIALIZE DATEPICKER PLUGIN
        $('.datepicker').datepicker({
            clearBtn: true,
            format: 'yyyy-mm-dd'
        });

        // FOR DEMO PURPOSE
        $('#reservationDate').on('change', function () {
            var pickedDate = $('input').val();
            $('#pickedDate').html(pickedDate);
        });
    });
</script>

<!--Prokes Institusi JS -->
<script type="text/javascript">
    var url = "https://prokes.ciamiskab.go.id/api/prokes_institusi";
    $.ajax({
        data: 'json',
        method: 'get',
        url: url,
        data: {
            periode_kasus: "{{ request()->periode_kasus }}"
        },
        beforeSend: function(){
            var loading = '<div id="fountainG_1" class="fountainG"></div>';
            loading += '<div id="fountainG_1" class="fountainG"></div>';
            loading += '<div id="fountainG_2" class="fountainG"></div>';
            loading += '<div id="fountainG_3" class="fountainG"></div>';
            loading += '<div id="fountainG_4" class="fountainG"></div>';
            loading += '<div id="fountainG_5" class="fountainG"></div>';
            loading += '<div id="fountainG_6" class="fountainG"></div>';
            loading += '<div id="fountainG_7" class="fountainG"></div>';
            $('.fountainX').html(loading)
        }
    }).done(function(states) {
        const properties = []
        $.each(states.features, function(index, value){
            properties.push(value.properties)
        })
        var kecamatan = properties
        Highcharts.chart('pie1', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Kepatuhan Prokes Institusi'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.y} %</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.y} %'
                    }
                }
            },
            series: [{
                name: 'Level ',
                colorByPoint: true,
                data: kecamatan
            }]
        });
    })
</script>
<script>
  $(document).ready(function(){
      $.ajax({
          dataType: 'json',
          method : 'get',
          url : 'https://prokes.ciamiskab.go.id/api/prokes_summary_institusi',
          data: {
            periode_kasus: "{{ request()->periode_kasus }}"
          },
      }).done(function(response){
            $('.cuci_tangan').html(response.cuci_tangan)
            $('.sosialisasi_prokes').html(response.sosialisasi_prokes)
            $('.cek_suhu_tubuh').html(response.cek_suhu_tubuh)
            $('.petugas_pengawas_prokes').html(response.petugas_pengawas_prokes)
            $('.desinfeksi_berkala').html(response.desinfeksi_berkala)
            $('.kepatuhan_prokes_institusi').html(response.kepatuhan_prokes_institusi)
      })
  })
</script>
</script>
</body>
</html>
