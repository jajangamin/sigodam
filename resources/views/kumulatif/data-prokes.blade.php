
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 font-weight-bold">Statistik Protokol Kesehatan Kabupaten Ciamis</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Data Prokes</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
 <!-- Kepatuhan Prokes Individu -->
    <div class="container-fluid">
        <div class="container-fluid">
        <div class="row">
        <div class="col-lg-6">
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
    </div>
    <div class="row" >
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
    <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6">
      <figure class="highcharts-figure">
                <div id="pie"></div>
            </figure>
      </div>
      <div class="col-lg-6">
          <div id="map-prokes">
      </div>
    </div>
    </div>

    <!-- Kepatuhan Prokes Individu -->
    <div class="row" >
        <div class="col-md-9 mb-3">
            <div class="card border-left-primary shadow h-100">
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
            <div class="card border-left-primary shadow h-100">
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
        <!-- <div class="row" >
        <div class="col-md-6">
            <div class="fountainX"></div>
                <figure class="highcharts-figure">
                    <div id="pie1"></div>
                </figure>
            </div>
        </div>
    </div> -->
    </div>
    </div>
</div>
<!-- jQuery -->
@section('onpage-js')

@endsection
