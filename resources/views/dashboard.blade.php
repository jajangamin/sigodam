@extends('master')

@section('dashboard')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
<style>
    #map-prokes{
        width: 100%;
        height: 400px;
    }
    .info {
        padding: 6px 8px;
        font: 14px/16px Arial, Helvetica, sans-serif;
        /* background: white;
        background: rgba(255, 255, 255, 0.8);
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        border-radius: 5px; */
    }
    
    .info h4 {
        margin: 0 0 5px;
        color: #777;
    }
    
    .legend {
        text-align: left;
        line-height: 20px;
        color: #555;
    }
    
    .legend i {
        width: 18px;
        height: 18px;
        float: left;
        margin-right: 8px;
        opacity: 0.7;
    }

    .datepicker td, .datepicker th {
        width: 2.5rem;
        height: 2.5rem;
        font-size: 0.85rem;
    }

    .datepicker {
        margin-bottom: 3rem;
    }

    /*
    *
    * ==========================================
    * FOR DEMO PURPOSES
    * ==========================================
    *
    */

    .input-group {
        border-radius: 30rem;
    }

    input.form-control {
        border-radius: 30rem 0 0 30rem;
        border: none;
    }

    input.form-control:focus {
        box-shadow: none;
    }

    input.form-control::placeholder {
        font-style: italic;
    }

    .input-group-text {
        border-radius: 0 30rem 30rem 0;
        border: none;
    }

    .datepicker-dropdown {
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css"/>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    @include('kumulatif.data-pikcovid')
    @include('kumulatif.data-jdih')
    @include('kumulatif.data-kepegawaian')

    <!-- Kepatuhan Prokes Individu -->
    <div class="row" style="margin-top: 20px; margin-left: 20px;">
        <h3 class="m-0 font-weight-bold">Kepatuhan Protokol Kesehatan (INDIVIDU) <br />Covid 19 Kabupaten Ciamis</h3>
    </div>
    <div class="row" style="margin-top: 20px; margin-left: 20px;">
        <div class="col-md-6">
          
        <h5 class="m-0 font-weight-bold periode_kasus"></h5>
        </div>
        <div class="col-lg-6" style="margin-top: 25px;">
        <form action='#' method="get">
            <div class="datepicker date input-group p-0 shadow-sm">
                <input type="text" name="periode_kasus" placeholder="Pilih Tanggal Pantau" class="form-control py-4 px-4" id="reservationDate" value="{{ request()->periode_kasus }}">
                <div class="input-group-append">
                    <button class="input-group-text px-4 btn-warning" type="submit"><i class="fa fa-search"></i>&nbsp;Cari</button>
                </div>
            </div>
        </form>
    </div>
    </div>
    <div class="row" style="margin-top: 20px; margin-left: 10px;">
        <div class="col-md-3 mb-3">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-center text-uppercase mb-1 text-card-color">
                                JUMLAH WILAYAH</div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800 total-upload text-card-color"></div>
                        </div>
                        <div class="col-auto">
                            <!-- <img height='100' width="100" src="https://image.freepik.com/free-vector/coughing-person-with-coronavirus_23-2148485525.jpg"> -->
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col mr-2 text-center">
                            <span class="text-card-color">KECAMATAN</span>
                            <div class="h3 mb-0 font-weight-bold text-gray-800 total-upload text-card-color kecamatan"></div>
                        </div>
                        <div class="col mr-2 text-center">
                            <span class="text-card-color">DESA</span>
                            <div class="h3 mb-0 font-weight-bold text-gray-800 total-upload text-card-color desa">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-center text-xs font-weight-bold text-uppercase mb-1 text-card-color">
                                JUMLAH SAMPEL</div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800 total-upload text-card-color"></div>
                        </div>
                        <div class="col-auto">
                            <!-- <img height='100' width="100" src="https://image.freepik.com/free-vector/strong-man-with-good-immune-system-against-viruses_23-2148568830.jpg"> -->
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col mr-2 text-center">
                            <span class="text-card-color">PAKAI MASKER</span>
                            <div class="h3 mb-0 font-weight-bold text-gray-800 total-upload text-card-color pakai_masker"></div>
                        </div>
                        <div class="col mr-2 text-center">
                            <span class="text-card-color">JAGA JARAK</span>
                            <div class="h3 mb-0 font-weight-bold text-gray-800 total-upload text-card-color jaga_jarak"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-center text-xs font-weight-bold text-uppercase mb-1 text-card-color">
                                TINGKAT KEPATUHAN</div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800 total-upload text-card-color"></div>
                        </div>
                        <div class="col-auto">
                            <!-- <img height='100' width="100" src="https://image.flaticon.com/icons/png/512/595/595812.png"> -->
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col mr-2 text-center">
                            <span class="text-card-color">PAKAI MASKER</span>
                            <div class="h3 mb-0 font-weight-bold text-gray-800 total-upload text-card-color kepatuhan_pakai_masker"></div>
                        </div>
                        <div class="col mr-2 text-center">
                            <span class="text-card-color">JAGA JARAK</span>
                            <div class="h3 mb-0 font-weight-bold text-gray-800 total-upload text-card-color kepatuhan_jaga_jarak"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-center text-xs font-weight-bold text-uppercase mb-1 text-card-color">
                                KEPATUHAN PROKES</div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800 total-upload text-card-color"></div>
                        </div>
                        <div class="col-auto">
                            <!-- <img height='100' width="100" src="https://image.flaticon.com/icons/png/512/595/595812.png"> -->
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col mr-2 text-center">
                            <span class="text-card-color">MASKER &amp; JAGA JARAK</span>
                            <div class="h3 mb-0 font-weight-bold text-gray-800 total-upload text-card-color kepatuhan_prokes"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="margin-top: 20px; margin-left: 10px;">
      <div class="col-md-6">
          <div class="fountainX"></div>
            <figure class="highcharts-figure">
                <div id="pie"></div>
            </figure>
          </div>
      </div>
      <div class="col-md-6" style="margin-left: 10px;">
          <div id="map-prokes">
      </div>
    </div>

    <!-- Kepatuhan Prokes Individu -->
    <div class="row" style="margin-top: 20px; margin-left: 20px;">
        <h3 class="m-0 font-weight-bold">Kepatuhan Protokol Kesehatan (INSTITUSI) <br />Covid 19 Kabupaten Ciamis</h3>
    </div>
    <div class="row" style="margin-top: 20px; margin-left: 10px;">
      <div class="col-md-9 mb-3">
          <div class="card border-left-primary shadow h-100 py-2">
              <div class="card-body">
                  <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                          <div class="text-center text-xs font-weight-bold text-uppercase mb-1 text-card-color">
                              TINGKAT KEPATUHAN</div>
                          <div class="h3 mb-0 font-weight-bold text-gray-800 total-upload text-card-color"></div>
                      </div>
                      <div class="col-auto">
                          <!-- <img height='100' width="100" src="https://image.freepik.com/free-vector/strong-man-with-good-immune-system-against-viruses_23-2148568830.jpg"> -->
                      </div>
                  </div>
                  <div class="row mt-3">
                      <div class="col mr-2 text-center">
                          <span class="text-card-color">CUCI TANGAN</span>
                          <div class="h3 mb-0 font-weight-bold text-gray-800 total-upload text-card-color cuci_tangan">
                          </div>
                      </div>
                      <div class="col mr-2 text-center">
                          <span class="text-card-color">SOSIALISASI PROKES</span>
                          <div class="h3 mb-0 font-weight-bold text-gray-800 total-upload text-card-color sosialisasi_prokes">
                          </div>
                      </div>
                      <div class="col mr-2 text-center">
                          <span class="text-card-color">CEK SUHU TUBUH</span>
                          <div class="h3 mb-0 font-weight-bold text-gray-800 total-upload text-card-color cek_suhu_tubuh">
                          </div>
                      </div>
                      <div class="col mr-2 text-center">
                          <span class="text-card-color">PETUGAS PENGAWAS PROKES</span>
                          <div class="h3 mb-0 font-weight-bold text-gray-800 total-upload text-card-color petugas_pengawas_prokes">
                          </div>
                      </div>
                      <div class="col mr-2 text-center">
                          <span class="text-card-color">DESINFEKSI BERKALA</span>
                          <div class="h3 mb-0 font-weight-bold text-gray-800 total-upload text-card-color desinfeksi_berkala">
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-md-3 mb-3">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-center text-xs font-weight-bold text-uppercase mb-1 text-card-color">
                            KEPATUHAN PROKES <br> INSTITUSI</div>
                        <div class="h3 mb-0 font-weight-bold text-gray-800 total-upload text-card-color"></div>
                    </div>
                    <div class="col-auto">
                        <!-- <img height='100' width="100" src="https://image.flaticon.com/icons/png/512/595/595812.png"> -->
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col mr-2 text-center">
                        <span class="text-card-color font-weight-bold"></span>
                        <div class="h3 mb-0 font-weight-bold text-gray-800 total-upload text-card-color kepatuhan_prokes_institusi">
                        </div>
                    </div>
                </div>
            </div>
        </div>
      <div>
    </div>
      </div>
    </div>
    <div class="row" style="margin-top: 20px; margin-left: 10px;">
      <div class="col-md-6">
          <div class="fountainX"></div>
            <figure class="highcharts-figure">
                <div id="pie1"></div>
            </figure>
          </div>
      </div>
    </div>
</div>
<!-- /.content-wrapper -->
@stop

@section('onpage-js')
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
@stop