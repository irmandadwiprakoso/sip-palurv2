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
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                                <i class="fas fa-plus-square"></i> Add Data
                            </button>
                        </div>
                    </div>
            <!-- Detail Data -->  
                    <div class="row">
                        @if (auth()->user()->role == "superadmin")
                        <div class="col-lg-3 col-xs-6">
                          <div class="small-box bg-danger">
                            <div class="inner">
                              <p> Jumlah DTKS</p>
                              <h3>{{$detekaes->count()}}</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-solid fa-user"></i>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3 col-xs-6">
                          <div class="small-box bg-danger">
                            <div class="inner">
                              <p> Jumlah pkh</p>
                              <h3>{{$detekaes->where('pkh', '=', 'pkh')->count()}}</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-solid fa-user"></i>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3 col-xs-6">
                          <div class="small-box bg-danger">
                            <div class="inner">
                              <p> Jumlah bpnt</p>
                              <h3>{{$detekaes->where('bpnt', '=', 'bpnt')->count()}}</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-solid fa-user"></i>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3 col-xs-6">
                          <div class="small-box bg-danger">
                            <div class="inner">
                              <p> Jumlah pbi</p>
                              <h3>{{$detekaes->where('pbi', '=', 'pbi')->count()}}</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-solid fa-user"></i>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3 col-xs-6">
                          <div class="small-box bg-danger">
                            <div class="inner">
                              <p> Jumlah non_bansos</p>
                              <h3>{{$detekaes->where('non_bansos', '=', 'non_bansos')->count()}}</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-solid fa-user"></i>
                            </div>
                          </div>
                        </div>
                        @elseif (auth()->user()->role == "kessos" || auth()->user()->role == "struktural" )
                        <div class="col-lg-3 col-xs-6">
                          <div class="small-box bg-danger">
                            <div class="inner">
                              <p> Jumlah DTKS</p>
                              <h3>{{$detekaes->where('village_id', '=', auth()->user()->village_id)->count()}}</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-solid fa-user"></i>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3 col-xs-6">
                          <div class="small-box bg-danger">
                            <div class="inner">
                              <p> Jumlah pkh</p>
                              <h3>{{$detekaes->where('village_id', '=', auth()->user()->village_id)->where('pkh', '=', 'pkh')->count()}}</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-solid fa-user"></i>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3 col-xs-6">
                          <div class="small-box bg-danger">
                            <div class="inner">
                              <p> Jumlah bpnt</p>
                              <h3>{{$detekaes->where('village_id', '=', auth()->user()->village_id)->where('bpnt', '=', 'bpnt')->count()}}</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-solid fa-user"></i>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3 col-xs-6">
                          <div class="small-box bg-danger">
                            <div class="inner">
                              <p> Jumlah pbi</p>
                              <h3>{{$detekaes->where('village_id', '=', auth()->user()->village_id)->where('pbi', '=', 'pbi')->count()}}</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-solid fa-user"></i>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3 col-xs-6">
                          <div class="small-box bg-danger">
                            <div class="inner">
                              <p> Jumlah non_bansos</p>
                              <h3>{{$detekaes->where('village_id', '=', auth()->user()->village_id)->where('non_bansos', '=', 'non_bansos')->count()}}</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-solid fa-user"></i>
                            </div>
                          </div>
                        </div>
                        @elseif (auth()->user()->role == "user" )
                        <div class="col-lg-3 col-xs-6">
                          <div class="small-box bg-danger">
                            <div class="inner">
                              <p> Jumlah DTKS</p>
                              <h3>{{$detekaes->where('village_id', '=', auth()->user()->village_id)->where('rw_id', '=', auth()->user()->rw_id)->count()}}</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-solid fa-user"></i>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3 col-xs-6">
                          <div class="small-box bg-danger">
                            <div class="inner">
                              <p> Jumlah pkh</p>
                              <h3>{{$detekaes->where('village_id', '=', auth()->user()->village_id)->where('rw_id', '=', auth()->user()->rw_id)->where('pkh', '=', 'pkh')->count()}}</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-solid fa-user"></i>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3 col-xs-6">
                          <div class="small-box bg-danger">
                            <div class="inner">
                              <p> Jumlah bpnt</p>
                              <h3>{{$detekaes->where('village_id', '=', auth()->user()->village_id)->where('rw_id', '=', auth()->user()->rw_id)->where('bpnt', '=', 'bpnt')->count()}}</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-solid fa-user"></i>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3 col-xs-6">
                          <div class="small-box bg-danger">
                            <div class="inner">
                              <p> Jumlah pbi</p>
                              <h3>{{$detekaes->where('village_id', '=', auth()->user()->village_id)->where('rw_id', '=', auth()->user()->rw_id)->where('pbi', '=', 'pbi')->count()}}</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-solid fa-user"></i>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3 col-xs-6">
                          <div class="small-box bg-danger">
                            <div class="inner">
                              <p> Jumlah non_bansos</p>
                              <h3>{{$detekaes->where('village_id', '=', auth()->user()->village_id)->where('rw_id', '=', auth()->user()->rw_id)->where('non_bansos', '=', 'non_bansos')->count()}}</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-solid fa-user"></i>
                            </div>
                          </div>
                        </div>
                        @endif
                    </div>

            <!-- Filter Data --> 
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Filter Data Dtks</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body">
                                <div class="row">            
                                        <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="filter-detekaeskel" class="form-label">Kelurahan</label>
                                            <select class="form-control filter" id="filter-detekaeskel" name="filter-detekaeskel">
                                                <option value="">-- Pilih Kelurahan --</option>
                                                @foreach ($kelbekasi as $kelbekasi)
                                                    <option value="{{ $kelbekasi->id }}">{{ $kelbekasi->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="filter-rwdetekaes" class="form-label">RW</label>
                                                <select class="form-control filter" id="filter-rwdetekaes" name="filter-rwdetekaes">
                                                    <option value="">-- Pilih RW --</option>
                                                    @foreach ($rw as $erwe)
                                                        <option value="{{ $erwe->id }}">{{ $erwe->rw }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="filter-rtdetekaes" class="form-label">RT</label>
                                                <select class="form-control filter" id="filter-rtdetekaes" name="filter-rtdetekaes">
                                                    <option value="">-- Pilih RT --</option>
                                                    @foreach ($rt as $erte)
                                                        <option value="{{ $erte->id }}">{{ $erte->rt }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
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
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Data Dtks</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="datadetekaes" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">NIK</th>
                                                <th scope="col">pkh</th>
                                                <th scope="col">bpnt</th>
                                                <th scope="col">pbi</th>
                                                <th scope="col">non_bansos</th>
                                                <th scope="col">RT</th>
                                                <th scope="col">RW</th>
                                                <th scope="col">Keterangan</th>
                                                <th scope="col">Kecamatan</th>
                                                <th scope="col">Kelurahan</th>
                                                <th scope="col">Edit</th>
                                                <th scope="col">Detail</th>
                                                <th scope="col">Delete</th>
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
        @include('master.csidebar')
        @include('master.footer')
        @include('master.script')

<!--------------Modal Create Dtks------------------------->
<form action="/detekaes" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Data Dtks</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <div class="card-body">
                            <form>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="ktp_id" class="form-label">Nama/NIK PKM</label>
                                            <input class="form-control @error('ktp_id') is-invalid @enderror" placeholder="Ketik NIK/Nama, pilih NIK/Nama sesuai yang diinginkan" list="nik_warga" id="ktp_id" name="ktp_id" value="{{ old('ktp_id') }}"> 
                                                <datalist id="nik_warga">
                                                @foreach ($ktp as $ktp)
                                                    <option value="{{$ktp->id}}"> {{$ktp->nama}}</option>
                                                    <!-- <option value="{{$ktp->id}}" {{old('ktp_id') == $ktp->id ? 'selected' : null }}>{{$ktp->NIK}}</option> -->
                                                @endforeach
                                                </datalist>
                                            @error ('ktp_id') <div class="alert alert-danger">{{ $message }} </div>@enderror 
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="" class="form-label">Status DTKS</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="stts_bpnt" value="bpnt" name="stts_bpnt">
                                                <label class="form-check-label" for="stts_bpnt">bpnt</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="stts_pbi" value="pbi" name="stts_pbi">
                                                <label class="form-check-label" for="stts_pbi">pbi</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="stts_pkh" value="pkh" name="stts_pkh">
                                                <label class="form-check-label" for="stts_pkh">pkh</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="stts_non_bansos" value="non_bansos" name="stts_non_bansos">
                                                <label class="form-check-label" for="stts_non_bansos">NON BANSOS</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                        <label for="keterangan" class="form-label">Keterangan</label>
                                        <select class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan">
                                            <option selected disabled>-- Pilih Keterangan --</option>
                                            <option value="KPM">Keluarga Penerima Manfaat</option>
                                            <option value="Pindah">Pindah</option>
                                            <option value="Meninggal">Meninggal</option>
                                            <option value="Tidak Diketahui">Tidak Diketahui</option>
                                            <option value="Non DTKS">Non DTKS</option>
                                        </select>
                                        @error('keterangan') <div class="alert alert-danger">{{ $message }} </div>
                                        @enderror
                                    </div>
                                    </div>

                                    <div class="col-sm-6">
                                    <div class="form-group">
                                            <label for="rt_id" class="form-label">RT</label>
                                            <select class="form-control @error('rt_id') is-invalid @enderror" id="rt_id"
                                                name="rt_id" value="{{ old('rt_id') }}">
                                                <option selected disabled>- Pilih RT-</option>
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
                                    </div>
                                </form>
                            </div>    
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
    <!-- /.endmodal -->
</form>

<!--------------Modal View Dtks------------------------->
    <div class="modal fade" id="modal-view">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Detail Data Dtks </h4>
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

