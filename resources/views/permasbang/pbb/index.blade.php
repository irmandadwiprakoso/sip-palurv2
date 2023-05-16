<!DOCTYPE html>
<html lang="en">

<head>
    @include ('master.header')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        @include('master.navbar')
        @include('master.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
            <!-- Button Tambah Data -->
            @if (auth()->user()->role == "superadmin") 
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-default">
                              <i class="fas fa-plus-square"></i> Add Data
                            </button>
                        </div>
                    </div>
            @endif

            <!-- Chart Data --> 
            <div class="card card-danger">
              <div class="card-header">
                  <h3 class="card-title">PBB Chart</h3>
                  <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                  </div>
              </div>
            <div class="card-body" >
                {!! $chart->container() !!}
            </div>
            </div>

            <!-- Detail Data -->
            @if (auth()->user()->role == "superadmin") 
                    <div class="row">
                        <div class="col-lg-6 col-xs-6">
                          <div class="small-box bg-orange">
                            <div class="inner">
                              <p>JUMLAH SPPT</p>
                              <h3> {{ $pbb->where('TAHUN_SPPT', '=', date('Y'))->count() }}</h3>
                            </div>
                            <div class="icon">
                              <i class="fas fa-solid fa-coins"></i>
                            </div>
                          </div>
                        </div>
            
                        <div class="col-lg-6 col-xs-6">
                          <div class="small-box bg-grey">
                            <div class="inner">
                              <p>TARGET BAPENDA</p>
                              <h3> Rp. {{ number_format ($pbb->where('TAHUN_SPPT', '=', date('Y'))->sum('PBB_TERHUTANG_SPPT') ) }}</h3>
                            </div>
                            <div class="icon">
                              <i class="fas fa-solid fa-coins"></i>
                            </div>
                          </div>
                        </div>
            
                        <div class="col-lg-3 col-xs-6">
                          <div class="small-box bg-green">
                            <div class="inner">
                              <p>TIDAK DIKETAHUI</p>
                              <h3> {{ $pbb->where('TAHUN_SPPT', '=', date('Y'))->where('KETERANGAN', '=', 'OP TIDAK DIKETAHUI')->count() }}</h3>
                            </div>
                            <div class="icon">
                              <i class="fas fa-solid fa-coins"></i>
                            </div>
                          </div>
                        </div>
            
                        <div class="col-lg-3 col-xs-6">
                          <div class="small-box bg-black">
                            <div class="inner">
                              <p>TIDAK ADA FISIK</p>
                              <h3> {{ $pbb->where('TAHUN_SPPT', '=', date('Y'))->where('KETERANGAN', '=', 'OP TIDAK ADA FISIK')->count() }}</h3>
                            </div>
                            <div class="icon">
                              <i class="fas fa-solid fa-coins"></i>
                            </div>
                          </div>
                        </div>
            
                        <div class="col-lg-3 col-xs-6">
                          <div class="small-box bg-aqua">
                            <div class="inner">
                              <p>DOUBLE</p>
                              <h3> {{ $pbb->where('TAHUN_SPPT', '=', date('Y'))->where('KETERANGAN', '=', 'WP DOUBLE')->count() }}</h3>
                            </div>
                            <div class="icon">
                              <i class="fas fa-solid fa-coins"></i>
                            </div>
                          </div>
                        </div>
            
                        <div class="col-lg-3 col-xs-6">
                          <div class="small-box bg-maroon">
                            <div class="inner">
                              <p>5 TAHUN</p>
                              <h3> {{ $pbb->where('TAHUN_SPPT', '=', date('Y'))->where('KETERANGAN', '=', '5 TAHUN')->count() }}</h3>
                            </div>
                            <div class="icon">
                              <i class="fas fa-solid fa-coins"></i>
                            </div>
                          </div>
                        </div>
            
                        <div class="col-lg-2 col-xs-6">
                          <div class="small-box bg-red">
                            <div class="inner">
                              <p>WP TERHUTANG</p>
                              <h3>  {{ $pbb->where('TAHUN_SPPT', '=', date('Y'))->where('KETERANGAN', '=', 'TERHUTANG')->count() }}</h3>
                            </div>
                            <div class="icon">
                              <i class="fas fa-solid fa-coins"></i>
                            </div>
                          </div>
                        </div>
            
                        <div class="col-lg-5 col-xs-6">
                          <div class="small-box bg-red">
                            <div class="inner">
                              <p>TOTAL PBB TERHUTANG</p>
                              <h3> Rp. {{ number_format ($pbb->where('TAHUN_SPPT', '=', date('Y'))->where('KETERANGAN', '=', 'TERHUTANG')->sum('PBB_TERHUTANG_SPPT') ) }}</h3>
                            </div>
                            <div class="icon">
                              <i class="fas fa-solid fa-coins"></i>
                            </div>
                          </div>
                        </div>
            
                            <div class="col-lg-5 col-xs-6">
                          <div class="small-box bg-red">
                            <div class="inner">
                              <p>PERSENTASE PBB TERHUTANG</p>
                              <h3> {{ ($pbb->where('TAHUN_SPPT', '=', date('Y'))->where('KETERANGAN', '=', 'TERHUTANG')->count() / $pbb->where('TAHUN_SPPT', '=', date('Y'))->count()) * 100 }} %</h3>
                            </div>
                            <div class="icon">
                              <i class="fas fa-solid fa-coins"></i>
                            </div>
                          </div>
                        </div>
            
                        <div class="col-lg-2 col-xs-6">
                          <div class="small-box bg-blue">
                            <div class="inner">
                              <p>WP LUNAS</p>
                              <h3> {{ $pbb->where('TAHUN_SPPT', '=', date('Y'))->where('KETERANGAN', '=', 'LUNAS')->count() }}</h3>
                            </div>
                            <div class="icon">
                              <i class="fas fa-solid fa-coins"></i>
                            </div>
                          </div>
                        </div>
            
                        <div class="col-lg-5 col-xs-6">
                          <div class="small-box bg-blue">
                            <div class="inner">
                              <p>TOTAL PBB LUNAS</p>
                              <h3> Rp. {{ number_format ($pbb->where('TAHUN_SPPT', '=', date('Y'))->where('KETERANGAN', '=', 'LUNAS')->sum('PBB_TERHUTANG_SPPT') )}}</h3>
                            </div>
                            <div class="icon">
                              <i class="fas fa-solid fa-coins"></i>
                            </div>
                          </div>
                        </div>
            
                        <div class="col-lg-5 col-xs-6">
                          <div class="small-box bg-blue">
                            <div class="inner">
                              <p>PERSENTASE PBB LUNAS</p>
                              <h3> {{ ($pbb->where('TAHUN_SPPT', '=', date('Y'))->where('KETERANGAN', '=', 'LUNAS')->count() / $pbb->where('TAHUN_SPPT', '=', date('Y'))->count()) * 100 }} %</h3>
                            </div>
                            <div class="icon">
                              <i class="fas fa-solid fa-coins"></i>
                            </div>
                          </div>
                        </div>
                  </div>
            @endif

            @if (auth()->user()->role == "permasbang" || auth()->user()->role == "struktural") 
            <div class="row">
                <div class="col-lg-6 col-xs-6">
                  <div class="small-box bg-orange">
                    <div class="inner">
                      <p>JUMLAH SPPT</p>
                      <h3> {{ $pbb->where('TAHUN_SPPT', '=', date('Y'))->where('village_id', '=', auth()->user()->village_id)->count() }}</h3>
                    </div>
                    <div class="icon">
                      <i class="fas fa-solid fa-coins"></i>
                    </div>
                  </div>
                </div>
    
                <div class="col-lg-6 col-xs-6">
                  <div class="small-box bg-grey">
                    <div class="inner">
                      <p>TARGET BAPENDA</p>
                      <h3> Rp. {{ number_format ($pbb->where('TAHUN_SPPT', '=', date('Y'))->where('village_id', '=', auth()->user()->village_id)->sum('PBB_TERHUTANG_SPPT') ) }}</h3>
                    </div>
                    <div class="icon">
                      <i class="fas fa-solid fa-coins"></i>
                    </div>
                  </div>
                </div>
    
                <div class="col-lg-3 col-xs-6">
                  <div class="small-box bg-green">
                    <div class="inner">
                      <p>TIDAK DIKETAHUI</p>
                      <h3> {{ $pbb->where('TAHUN_SPPT', '=', date('Y'))->where('village_id', '=', auth()->user()->village_id)->where('KETERANGAN', '=', 'OP TIDAK DIKETAHUI')->count() }}</h3>
                    </div>
                    <div class="icon">
                      <i class="fas fa-solid fa-coins"></i>
                    </div>
                  </div>
                </div>
    
                <div class="col-lg-3 col-xs-6">
                  <div class="small-box bg-black">
                    <div class="inner">
                      <p>TIDAK ADA FISIK</p>
                      <h3> {{ $pbb->where('TAHUN_SPPT', '=', date('Y'))->where('village_id', '=', auth()->user()->village_id)->where('KETERANGAN', '=', 'OP TIDAK ADA FISIK')->count() }}</h3>
                    </div>
                    <div class="icon">
                      <i class="fas fa-solid fa-coins"></i>
                    </div>
                  </div>
                </div>
    
                <div class="col-lg-3 col-xs-6">
                  <div class="small-box bg-aqua">
                    <div class="inner">
                      <p>DOUBLE</p>
                      <h3> {{ $pbb->where('TAHUN_SPPT', '=', date('Y'))->where('village_id', '=', auth()->user()->village_id)->where('KETERANGAN', '=', 'WP DOUBLE')->count() }}</h3>
                    </div>
                    <div class="icon">
                      <i class="fas fa-solid fa-coins"></i>
                    </div>
                  </div>
                </div>
    
                <div class="col-lg-3 col-xs-6">
                  <div class="small-box bg-maroon">
                    <div class="inner">
                      <p>5 TAHUN</p>
                      <h3> {{ $pbb->where('TAHUN_SPPT', '=', date('Y'))->where('village_id', '=', auth()->user()->village_id)->where('KETERANGAN', '=', '5 TAHUN')->count() }}</h3>
                    </div>
                    <div class="icon">
                      <i class="fas fa-solid fa-coins"></i>
                    </div>
                  </div>
                </div>
    
                <div class="col-lg-2 col-xs-6">
                  <div class="small-box bg-red">
                    <div class="inner">
                      <p>WP TERHUTANG</p>
                      <h3>  {{ $pbb->where('TAHUN_SPPT', '=', date('Y'))->where('village_id', '=', auth()->user()->village_id)->where('KETERANGAN', '=', 'TERHUTANG')->count() }}</h3>
                    </div>
                    <div class="icon">
                      <i class="fas fa-solid fa-coins"></i>
                    </div>
                  </div>
                </div>
    
                <div class="col-lg-5 col-xs-6">
                  <div class="small-box bg-red">
                    <div class="inner">
                      <p>TOTAL PBB TERHUTANG</p>
                      <h3> Rp. {{ number_format ($pbb->where('TAHUN_SPPT', '=', date('Y'))->where('village_id', '=', auth()->user()->village_id)->where('KETERANGAN', '=', 'TERHUTANG')->sum('PBB_TERHUTANG_SPPT') ) }}</h3>
                    </div>
                    <div class="icon">
                      <i class="fas fa-solid fa-coins"></i>
                    </div>
                  </div>
                </div>
    
                    <div class="col-lg-5 col-xs-6">
                  <div class="small-box bg-red">
                    <div class="inner">
                      <p>PERSENTASE PBB TERHUTANG</p>
                      <h3> {{ ($pbb->where('TAHUN_SPPT', '=', date('Y'))->where('village_id', '=', auth()->user()->village_id)->where('KETERANGAN', '=', 'TERHUTANG')->count() / $pbb->where('TAHUN_SPPT', '=', date('Y'))->count()) * 100 }} %</h3>
                    </div>
                    <div class="icon">
                      <i class="fas fa-solid fa-coins"></i>
                    </div>
                  </div>
                </div>
    
                <div class="col-lg-2 col-xs-6">
                  <div class="small-box bg-blue">
                    <div class="inner">
                      <p>WP LUNAS</p>
                      <h3> {{ $pbb->where('TAHUN_SPPT', '=', date('Y'))->where('village_id', '=', auth()->user()->village_id)->where('KETERANGAN', '=', 'LUNAS')->count() }}</h3>
                    </div>
                    <div class="icon">
                      <i class="fas fa-solid fa-coins"></i>
                    </div>
                  </div>
                </div>
    
                <div class="col-lg-5 col-xs-6">
                  <div class="small-box bg-blue">
                    <div class="inner">
                      <p>TOTAL PBB LUNAS</p>
                      <h3> Rp. {{ number_format ($pbb->where('TAHUN_SPPT', '=', date('Y'))->where('village_id', '=', auth()->user()->village_id)->where('KETERANGAN', '=', 'LUNAS')->sum('PBB_TERHUTANG_SPPT') )}}</h3>
                    </div>
                    <div class="icon">
                      <i class="fas fa-solid fa-coins"></i>
                    </div>
                  </div>
                </div>
    
                <div class="col-lg-5 col-xs-6">
                  <div class="small-box bg-blue">
                    <div class="inner">
                      <p>PERSENTASE PBB LUNAS</p>
                      <h3> {{ ($pbb->where('TAHUN_SPPT', '=', date('Y'))->where('village_id', '=', auth()->user()->village_id)->where('KETERANGAN', '=', 'LUNAS')->count() / $pbb->where('TAHUN_SPPT', '=', date('Y'))->count()) * 100 }} %</h3>
                    </div>
                    <div class="icon">
                      <i class="fas fa-solid fa-coins"></i>
                    </div>
                  </div>
                </div>
            </div>
            @endif

            @if (auth()->user()->role == "user") 
            <div class="row">
                <div class="col-lg-6 col-xs-6">
                  <div class="small-box bg-orange">
                    <div class="inner">
                      <p>JUMLAH SPPT</p>
                      <h3> {{ $pbb->where('TAHUN_SPPT', '=', date('Y'))
                      ->where('village_id', '=', auth()->user()->village_id)
                      ->where('rw_id', '=', auth()->user()->rw_id)
                      ->count() }}</h3>
                    </div>
                    <div class="icon">
                      <i class="fas fa-solid fa-coins"></i>
                    </div>
                  </div>
                </div>
    
                <div class="col-lg-6 col-xs-6">
                  <div class="small-box bg-grey">
                    <div class="inner">
                      <p>TARGET BAPENDA</p>
                      <h3> Rp. {{ number_format ($pbb->where('TAHUN_SPPT', '=', date('Y'))
                      ->where('village_id', '=', auth()->user()->village_id)
                      ->where('rw_id', '=', auth()->user()->rw_id)
                      ->sum('PBB_TERHUTANG_SPPT') ) }}</h3>
                    </div>
                    <div class="icon">
                      <i class="fas fa-solid fa-coins"></i>
                    </div>
                  </div>
                </div>
    
                <div class="col-lg-3 col-xs-6">
                  <div class="small-box bg-green">
                    <div class="inner">
                      <p>TIDAK DIKETAHUI</p>
                      <h3> {{ $pbb->where('TAHUN_SPPT', '=', date('Y'))
                      ->where('village_id', '=', auth()->user()->village_id)
                      ->where('rw_id', '=', auth()->user()->rw_id)
                      ->where('KETERANGAN', '=', 'OP TIDAK DIKETAHUI')->count() }}</h3>
                    </div>
                    <div class="icon">
                      <i class="fas fa-solid fa-coins"></i>
                    </div>
                  </div>
                </div>
    
                <div class="col-lg-3 col-xs-6">
                  <div class="small-box bg-black">
                    <div class="inner">
                      <p>TIDAK ADA FISIK</p>
                      <h3> {{ $pbb->where('TAHUN_SPPT', '=', date('Y'))
                      ->where('village_id', '=', auth()->user()->village_id)
                      ->where('rw_id', '=', auth()->user()->rw_id)
                      ->where('KETERANGAN', '=', 'OP TIDAK ADA FISIK')->count() }}</h3>
                    </div>
                    <div class="icon">
                      <i class="fas fa-solid fa-coins"></i>
                    </div>
                  </div>
                </div>
    
                <div class="col-lg-3 col-xs-6">
                  <div class="small-box bg-aqua">
                    <div class="inner">
                      <p>DOUBLE</p>
                      <h3> {{ $pbb->where('TAHUN_SPPT', '=', date('Y'))
                      ->where('village_id', '=', auth()->user()->village_id)
                      ->where('rw_id', '=', auth()->user()->rw_id)
                      ->where('KETERANGAN', '=', 'WP DOUBLE')->count() }}</h3>
                    </div>
                    <div class="icon">
                      <i class="fas fa-solid fa-coins"></i>
                    </div>
                  </div>
                </div>
    
                <div class="col-lg-3 col-xs-6">
                  <div class="small-box bg-maroon">
                    <div class="inner">
                      <p>5 TAHUN</p>
                      <h3> {{ $pbb->where('TAHUN_SPPT', '=', date('Y'))
                      ->where('village_id', '=', auth()->user()->village_id)
                      ->where('rw_id', '=', auth()->user()->rw_id)
                      ->where('KETERANGAN', '=', '5 TAHUN')->count() }}</h3>
                    </div>
                    <div class="icon">
                      <i class="fas fa-solid fa-coins"></i>
                    </div>
                  </div>
                </div>
    
                <div class="col-lg-2 col-xs-6">
                  <div class="small-box bg-red">
                    <div class="inner">
                      <p>WP TERHUTANG</p>
                      <h3>  {{ $pbb->where('TAHUN_SPPT', '=', date('Y'))
                      ->where('village_id', '=', auth()->user()->village_id)
                      ->where('rw_id', '=', auth()->user()->rw_id)
                      ->where('KETERANGAN', '=', 'TERHUTANG')->count() }}</h3>
                    </div>
                    <div class="icon">
                      <i class="fas fa-solid fa-coins"></i>
                    </div>
                  </div>
                </div>
    
                <div class="col-lg-5 col-xs-6">
                  <div class="small-box bg-red">
                    <div class="inner">
                      <p>TOTAL PBB TERHUTANG</p>
                      <h3> Rp. {{ number_format ($pbb->where('TAHUN_SPPT', '=', date('Y'))
                      ->where('village_id', '=', auth()->user()->village_id)
                      ->where('rw_id', '=', auth()->user()->rw_id)
                      ->where('KETERANGAN', '=', 'TERHUTANG')->sum('PBB_TERHUTANG_SPPT') ) }}</h3>
                    </div>
                    <div class="icon">
                      <i class="fas fa-solid fa-coins"></i>
                    </div>
                  </div>
                </div>
    
                    <div class="col-lg-5 col-xs-6">
                  <div class="small-box bg-red">
                    <div class="inner">
                      <p>PERSENTASE PBB TERHUTANG</p>
                      <h3> {{ ($pbb->where('TAHUN_SPPT', '=', date('Y'))
                      ->where('village_id', '=', auth()->user()->village_id)
                      ->where('rw_id', '=', auth()->user()->rw_id)
                      ->where('KETERANGAN', '=', 'TERHUTANG')->count() / $pbb->where('village_id', '=', auth()->user()->village_id)
                      ->where('rw_id', '=', auth()->user()->rw_id)->where('TAHUN_SPPT', '=', date('Y'))->count()) * 100}} %</h3>
                    </div>
                    <div class="icon">
                      <i class="fas fa-solid fa-coins"></i>
                    </div>
                  </div>
                </div>
    
                <div class="col-lg-2 col-xs-6">
                  <div class="small-box bg-blue">
                    <div class="inner">
                      <p>WP LUNAS</p>
                      <h3> {{ $pbb->where('TAHUN_SPPT', '=', date('Y'))
                      ->where('village_id', '=', auth()->user()->village_id)
                      ->where('rw_id', '=', auth()->user()->rw_id)
                      ->where('KETERANGAN', '=', 'LUNAS')->count() }}</h3>
                    </div>
                    <div class="icon">
                      <i class="fas fa-solid fa-coins"></i>
                    </div>
                  </div>
                </div>
    
                <div class="col-lg-5 col-xs-6">
                  <div class="small-box bg-blue">
                    <div class="inner">
                      <p>TOTAL PBB LUNAS</p>
                      <h3> Rp. {{ number_format ($pbb->where('TAHUN_SPPT', '=', date('Y'))
                      ->where('village_id', '=', auth()->user()->village_id)
                      ->where('rw_id', '=', auth()->user()->rw_id)
                      ->where('KETERANGAN', '=', 'LUNAS')->sum('PBB_LUNAS_SPPT') )}}</h3>
                    </div>
                    <div class="icon">
                      <i class="fas fa-solid fa-coins"></i>
                    </div>
                  </div>
                </div>
    
                <div class="col-lg-5 col-xs-6">
                  <div class="small-box bg-blue">
                    <div class="inner">
                      <p>PERSENTASE PBB LUNAS</p>
                      <h3> {{ ($pbb->where('TAHUN_SPPT', '=', date('Y'))
                      ->where('village_id', '=', auth()->user()->village_id)
                      ->where('rw_id', '=', auth()->user()->rw_id)
                      ->where('KETERANGAN', '=', 'LUNAS')->count() / $pbb->where('village_id', '=', auth()->user()->village_id)
                      ->where('rw_id', '=', auth()->user()->rw_id)->where('TAHUN_SPPT', '=', date('Y'))->count()) * 100}} %</h3>
                    </div>
                    <div class="icon">
                      <i class="fas fa-solid fa-coins"></i>
                    </div>
                  </div>
                </div>
            </div>
            @endif							
            
            <!-- Filter Data --> 
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Filter Data SPPT PBB</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body">
                                <div class="row">            
                                        <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="filter-rwpbb" class="form-label">RW</label>
                                            <select class="form-control filter" id="filter-rwpbb" name="filter-rwpbb">
                                                <option value="">-- Pilih RW --</option>
                                                @foreach ($rw as $erwe)
                                                    <option value="{{ $erwe->id }}">{{ $erwe->rw }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        </div>

                                        <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="filter-rtpbb" class="form-label">RT</label>
                                            <select class="form-control filter" id="filter-rtpbb" name="filter-rtpbb">
                                                <option value="">-- Pilih RT --</option>
                                                @foreach ($rt as $erte)
                                                    <option value="{{ $erte->id }}">{{ $erte->rt }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        </div>
            
                                        <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="filter-pbbkel" class="form-label">Kelurahan</label>
                                            <select class="form-control filter" id="filter-pbbkel" name="filter-pbbkel">
                                                <option value="">-- Pilih Kelurahan --</option>
                                                @foreach ($kelbekasi as $kelbekasi)
                                                    <option value="{{ $kelbekasi->id }}">{{ $kelbekasi->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        </div>
            
                                        <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="filter-tahunpbb" class="form-label">Tahun</label>
                                                <input class="form-control filter" id="filter-tahunpbb" 
                                                type="text" name="filter-tahunpbb" value="{{ date('Y') }}">
                                        </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>									
                </div>									

            <!-- Main content / Tampilan Data -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-danger">
                                <div class="card-header">
                                    <h3 class="card-title">Data SPPT PBB</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="datapbb" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>NOP</th>
                                                <th>NAMA WAJIB PAJAK</th>
                                                <th>TOTAL LUAS BUMI</th>
												                        <th>ALAMAT OBJEK PAJAK</th>
                                                <th>PBB TERHUTANG SPPT</th>
												                        <th>RT</th>
                                                <th>RW</th>
												                        <th>EDIT</th>
                                                <th>DELETE</th>
                                                <th>KETERANGAN</th>
                                                <th>NJOP BUMI SPPT</th>
                                                <th>TOTAL LUAS BANGUNAN</th>
                                                <th>NJOP BANGUNAN SPPT</th>
                                                <th>ALAMAT WAJIB PAJAK</th>
                                                <th>TAHUN SPPT</th>
												                        <th>KECAMATAN</th>
												                        <th>KELURAHAN</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
        </div>
        </div>
        @include('master.csidebar')
        @include('master.footer')
        @include('master.script')
        <script src="{{ $chart->cdn() }}"></script>
        {{ $chart->script() }}

<!--------------Modal Create SPPT PBB------------------------->
<form action="/pbb" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data SPPT PBB </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <div class="card-body">
                            <form>
                                <div class="row">

                                    <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="NOP" class="text-danger">NOP*</label>
                                        <input type="text" class="form-control @error('NOP') is-invalid @enderror"
                                            id="NOP" name="NOP" placeholder="32.75.060......"
                                            value="{{ old('NOP') }}">
                                        @error('NOP') <div class="alert alert-danger">{{ $message }} </div>
                                        @enderror
                                    </div>
                                    </div>

                                    <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="NM_WP_SPPT" class="text-danger">NAMA WP*</label>
                                        <input type="text" onkeyup="this.value = this.value.toUpperCase()"
                                            class="form-control @error('NM_WP_SPPT') is-invalid @enderror"
                                            id="NM_WP_SPPT" placeholder="NAMA WAJIB PAJAK" name="NM_WP_SPPT"
                                            value="{{ old('NM_WP_SPPT') }}">
                                        @error('NM_WP_SPPT') <div class="alert alert-danger">{{ $message }}
                                        </div>@enderror
                                    </div>
                                    </div>

                                    <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="TOTAL_LUAS_BUMI" class="text-danger">TOTAL LUAS BUMI*</label>
                                        <input type="number"
                                            class="form-control @error('TOTAL_LUAS_BUMI') is-invalid @enderror"
                                            id="TOTAL_LUAS_BUMI" placeholder="TOTAL LUAS BUMI"
                                            name="TOTAL_LUAS_BUMI" value="{{ old('TOTAL_LUAS_BUMI') }}">
                                        @error('TOTAL_LUAS_BUMI') <div class="alert alert-danger">
                                            {{ $message }} </div>@enderror
                                    </div>
                                    </div>

                                    <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="NJOP_BUMI_SPPT" class="text-danger">NJOP BUMI SPPT*</label>
                                        <input type="number"
                                            class="form-control @error('NJOP_BUMI_SPPT') is-invalid @enderror"
                                            id="NJOP_BUMI_SPPT" placeholder="NJOP LUAS BUMI" name="NJOP_BUMI_SPPT"
                                            value="{{ old('NJOP_BUMI_SPPT') }}">
                                        @error('NJOP_BUMI_SPPT') <div class="alert alert-danger">{{ $message }}
                                        </div>@enderror
                                    </div>
                                    </div>

                                    <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="TOTAL_LUAS_BNG" class="text-danger">TOTAL LUAS BNG*</label>
                                        <input type="number"
                                            class="form-control @error('TOTAL_LUAS_BNG') is-invalid @enderror"
                                            id="TOTAL_LUAS_BNG" placeholder="TOTAL LUAS BANGUNAN"
                                            name="TOTAL_LUAS_BNG" value="{{ old('TOTAL_LUAS_BNG') }}">
                                        @error('TOTAL_LUAS_BNG') <div class="alert alert-danger">{{ $message }}
                                        </div>@enderror
                                    </div>
                                    </div>

                                    <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="NJOP_BNG_SPPT" class="text-danger">NJOP BNG SPPT*</label>
                                        <input type="number"
                                            class="form-control @error('NJOP_BNG_SPPT') is-invalid @enderror"
                                            id="NJOP_BNG_SPPT" placeholder="NJOP LUAS BANGUNAN" name="NJOP_BNG_SPPT"
                                            value="{{ old('NJOP_BNG_SPPT') }}">
                                        @error('NJOP_BNG_SPPT') <div class="alert alert-danger">{{ $message }}
                                        </div>@enderror
                                    </div>
                                    </div>

                                    <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="ALM_OP" class="text-danger">ALAMAT OP*</label>
                                        <input type="text" onkeyup="this.value = this.value.toUpperCase()"
                                            class="form-control @error('ALM_OP') is-invalid @enderror" id="ALM_OP"
                                            placeholder="ALAMAT OBJEK PAJAK" name="ALM_OP"
                                            value="{{ old('ALM_OP') }}">
                                        @error('ALM_OP') <div class="alert alert-danger">{{ $message }} </div>
                                        @enderror
                                    </div>
                                    </div>

                                    <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="rt_id" class="text-danger">RT*</label>
                                        <select class="form-control @error('rt_id') is-invalid @enderror" id="rt_id"
                                            name="rt_id" value="{{ old('rt_id') }}">
                                            <option selected disabled>- Pilih -</option>
                                            @foreach ($rt as $erte)
                                                <option value="{{ $erte->id }}"
                                                    {{ old('rt_id') == $erte->id ? 'selected' : null }}>
                                                    {{ $erte->rt }}</option>
                                            @endforeach
                                        </select>
                                        @error('rt_id') <div class="alert alert-danger">{{ $message }} </div>
                                        @enderror
                                    </div>
                                    </div>

                                    <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="rw_id" class="text-danger">RW*</label>
                                        <select class="form-control @error('rw_id') is-invalid @enderror" id="rw_id"
                                            name="rw_id" value="{{ old('rw_id') }}">
                                            <option selected disabled>- Pilih -</option>
                                            @foreach ($rw as $erwe)
                                                <option value="{{ $erwe->id }}"
                                                    {{ old('rw_id') == $erwe->id ? 'selected' : null }}>
                                                    {{ $erwe->rw }}</option>
                                            @endforeach
                                        </select>
                                        @error('rw_id') <div class="alert alert-danger">{{ $message }} </div>
                                        @enderror
                                    </div>
                                    </div>

                                    <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="ALM_WP" class="text-danger">ALAMAT WAJIB PAJAK*</label>
                                        <input type="text" onkeyup="this.value = this.value.toUpperCase()"
                                            class="form-control @error('ALM_WP') is-invalid @enderror" id="ALM_WP"
                                            placeholder="ALAMAT WAJIB PAJAK" name="ALM_WP"
                                            value="{{ old('ALM_WP') }}">
                                        @error('ALM_WP') <div class="alert alert-danger">{{ $message }} </div>
                                        @enderror
                                    </div>
                                    </div>

                                    <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="PBB_TERHUTANG_SPPT" class="text-danger">PBB TERHUTANG*</label>
                                        <input type="number"
                                            class="form-control @error('PBB_TERHUTANG_SPPT') is-invalid @enderror"
                                            id="PBB_TERHUTANG_SPPT" placeholder="PBB TERHUTANG"
                                            name="PBB_TERHUTANG_SPPT" value="{{ old('PBB_TERHUTANG_SPPT') }}">
                                        @error('PBB_TERHUTANG_SPPT') <div class="alert alert-danger">
                                            {{ $message }} </div>@enderror
                                    </div>
                                    </div>

                                    <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="TAHUN_SPPT" class="text-danger">TAHUN SPPT*</label>
                                        <input type="number"
                                            class="form-control @error('TAHUN_SPPT') is-invalid @enderror"
                                            id="TAHUN_SPPT" placeholder="TAHUN SPPT" name="TAHUN_SPPT"
                                            value="{{ old('TAHUN_SPPT') }}">
                                        @error('TAHUN_SPPT') <div class="alert alert-danger">{{ $message }}
                                        </div>@enderror
                                    </div>
                                    </div>

                                    <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="KETERANGAN" class="text-danger">KETERANGAN*</label>
                                        <select class="form-control @error('KETERANGAN') is-invalid @enderror"
                                            id="KETERANGAN" placeholder="KETERANGAN" name="KETERANGAN">
                                            <option selected>{{ old('KETERANGAN') }}</option>
                                            <option value="TERHUTANG">TERHUTANG</option>
                                            <option value="LUNAS">LUNAS</option>
                                            <option value="WP DOUBLE">WAJIB PAJAK DOUBLE</option>
                                            <option value="OP TIDAK DIKETAHUI">OBJEK PAJAK TIDAK DIKETAHUI</option>
                                            <option value="OP TIDAK ADA FISIK">TIDAK ADA FISIK OBJEK PAJAK</option>
                                            <option value="5 TAHUN">5 TAHUN TIDAK ADA PEMBAYARAN</option>
                                        </select>
                                        @error('KETERANGAN') <div class="alert alert-danger">{{ $message }}
                                        </div>@enderror
                                    </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                                <label for="provinsi">Provinsi</label>
                                                <select class="form-control @error('province_id') is-invalid @enderror"
                                                    id="provinsi" name="province_id" value="{{ old('province_id') }}">
                                                    <option selected disabled>- Pilih Provinsi-</option>
                                                    @foreach ($provinces as $provinsi)
                                                        <option value="{{ $provinsi->id }}">{{ $provinsi->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('province_id') <div class="alert alert-danger">{{ $message }}
                                                </div>@enderror
                                            </div>
                                            </div>
                                        <div class="col-sm-6">
                                        <div class="form-group">
                                                <label for="kabupaten">Kota/Kabupaten</label>
                                                <select class="form-control @error('regency_id') is-invalid @enderror"
                                                    id="kabupaten" name="regency_id" value="{{ old('regency_id') }}">
                                                    <option selected disabled>- Pilih Kota/Kabupaten-</option>
                                                    @foreach ($regencies as $kabupaten)
                                                        <option value="{{ $kabupaten->id }}">{{ $kabupaten->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('regency_id') <div class="alert alert-danger">{{ $message }}
                                                </div>@enderror
                                            </div>
                                            </div>
                                <div class="col-sm-6">
                                <div class="form-group">
                                        <label for="kecamatan">Kecamatan</label>
                                        <select class="form-control @error('district_id') is-invalid @enderror"
                                            id="kecamatan" name="district_id" value="{{ old('district_id') }}">
                                            <option selected disabled>- Pilih Kecamatan-</option>
                                            @foreach ($districts as $kecamatan)
                                                <option value="{{ $kecamatan->id }}">{{ $kecamatan->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('district_id') <div class="alert alert-danger">{{ $message }}
                                        </div>@enderror
                                    </div>
                                    </div>
                                <div class="col-sm-6">
                                <div class="form-group">
                                        <label for="desa">Desa/Kelurahan</label>
                                        <select class="form-control @error('village_id') is-invalid @enderror"
                                            id="desa" name="village_id" value="{{ old('village_id') }}">
                                            <option selected disabled>- Pilih Desa/Kelurahan-</option>
                                            @foreach ($villages as $desa)
                                                <option value="{{ $desa->id }}">{{ $desa->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('village_id') <div class="alert alert-danger">{{ $message }}
                                        </div>@enderror
                                    </div>
                                    </div>

                                    </div>
                                </form>
                            </div>    
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
    <!-- /.endmodal -->
</form>

<!--------------Modal View SPPT PBB------------------------->
    <div class="modal fade" id="modal-view">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Detail Data SPPT PBB</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
  
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
    <!-- /.endmodal -->
</body>
</html>

