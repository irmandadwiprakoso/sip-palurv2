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
                              <h3>{{$dtks->count()}}</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-solid fa-user"></i>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3 col-xs-6">
                          <div class="small-box bg-danger">
                            <div class="inner">
                              <p> Jumlah PKH</p>
                              <h3>{{$dtks->where('PKH', '=', 'PKH')->count()}}</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-solid fa-user"></i>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3 col-xs-6">
                          <div class="small-box bg-danger">
                            <div class="inner">
                              <p> Jumlah BPNT</p>
                              <h3>{{$dtks->where('BPNT', '=', 'BPNT')->count()}}</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-solid fa-user"></i>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3 col-xs-6">
                          <div class="small-box bg-danger">
                            <div class="inner">
                              <p> Jumlah PBI</p>
                              <h3>{{$dtks->where('PBI', '=', 'PBI')->count()}}</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-solid fa-user"></i>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3 col-xs-6">
                          <div class="small-box bg-danger">
                            <div class="inner">
                              <p> Jumlah NON_BANSOS</p>
                              <h3>{{$dtks->where('NON_BANSOS', '=', 'NON_BANSOS')->count()}}</h3>
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
                              <h3>{{$dtks->where('village_id', '=', auth()->user()->village_id)->count()}}</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-solid fa-user"></i>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3 col-xs-6">
                          <div class="small-box bg-danger">
                            <div class="inner">
                              <p> Jumlah PKH</p>
                              <h3>{{$dtks->where('village_id', '=', auth()->user()->village_id)->where('PKH', '=', 'PKH')->count()}}</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-solid fa-user"></i>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3 col-xs-6">
                          <div class="small-box bg-danger">
                            <div class="inner">
                              <p> Jumlah BPNT</p>
                              <h3>{{$dtks->where('village_id', '=', auth()->user()->village_id)->where('BPNT', '=', 'BPNT')->count()}}</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-solid fa-user"></i>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3 col-xs-6">
                          <div class="small-box bg-danger">
                            <div class="inner">
                              <p> Jumlah PBI</p>
                              <h3>{{$dtks->where('village_id', '=', auth()->user()->village_id)->where('PBI', '=', 'PBI')->count()}}</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-solid fa-user"></i>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3 col-xs-6">
                          <div class="small-box bg-danger">
                            <div class="inner">
                              <p> Jumlah NON_BANSOS</p>
                              <h3>{{$dtks->where('village_id', '=', auth()->user()->village_id)->where('NON_BANSOS', '=', 'NON_BANSOS')->count()}}</h3>
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
                              <h3>{{$dtks->where('village_id', '=', auth()->user()->village_id)->where('rw_id', '=', auth()->user()->rw_id)->count()}}</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-solid fa-user"></i>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3 col-xs-6">
                          <div class="small-box bg-danger">
                            <div class="inner">
                              <p> Jumlah PKH</p>
                              <h3>{{$dtks->where('village_id', '=', auth()->user()->village_id)->where('rw_id', '=', auth()->user()->rw_id)->where('PKH', '=', 'PKH')->count()}}</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-solid fa-user"></i>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3 col-xs-6">
                          <div class="small-box bg-danger">
                            <div class="inner">
                              <p> Jumlah BPNT</p>
                              <h3>{{$dtks->where('village_id', '=', auth()->user()->village_id)->where('rw_id', '=', auth()->user()->rw_id)->where('BPNT', '=', 'BPNT')->count()}}</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-solid fa-user"></i>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3 col-xs-6">
                          <div class="small-box bg-danger">
                            <div class="inner">
                              <p> Jumlah PBI</p>
                              <h3>{{$dtks->where('village_id', '=', auth()->user()->village_id)->where('rw_id', '=', auth()->user()->rw_id)->where('PBI', '=', 'PBI')->count()}}</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-solid fa-user"></i>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3 col-xs-6">
                          <div class="small-box bg-danger">
                            <div class="inner">
                              <p> Jumlah NON_BANSOS</p>
                              <h3>{{$dtks->where('village_id', '=', auth()->user()->village_id)->where('rw_id', '=', auth()->user()->rw_id)->where('NON_BANSOS', '=', 'NON_BANSOS')->count()}}</h3>
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
                                            <label for="filter-dtkskel" class="form-label">Kelurahan</label>
                                            <select class="form-control filter" id="filter-dtkskel" name="filter-dtkskel">
                                                <option value="">-- Pilih Kelurahan --</option>
                                                @foreach ($kelbekasi as $kelbekasi)
                                                    <option value="{{ $kelbekasi->id }}">{{ $kelbekasi->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="filter-rwdtks" class="form-label">RW</label>
                                                <select class="form-control filter" id="filter-rwdtks" name="filter-rwdtks">
                                                    <option value="">-- Pilih RW --</option>
                                                    @foreach ($rw as $erwe)
                                                        <option value="{{ $erwe->id }}">{{ $erwe->rw }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="filter-rtdtks" class="form-label">RT</label>
                                                <select class="form-control filter" id="filter-rtdtks" name="filter-rtdtks">
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
                                    <table id="datadtks" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">NIK</th>
                                                <th scope="col">PKH</th>
                                                <th scope="col">BPNT</th>
                                                <th scope="col">PBI</th>
                                                <th scope="col">NON_BANSOS</th>
                                                <th scope="col">RT</th>
                                                <th scope="col">RW</th>
                                                <th scope="col">Kecamatan</th>
                                                <th scope="col">Kelurahan</th>
                                                <th scope="col">Keterangan</th>
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
<form action="/dtks" method="post" enctype="multipart/form-data">
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
                                                <input class="form-check-input" type="checkbox" id="BPNT" value="BPNT" name="BPNT">
                                                <label class="form-check-label" for="BPNT">BPNT</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="PBI" value="PBI" name="PBI">
                                                <label class="form-check-label" for="PBI">PBI</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="PKH" value="PKH" name="PKH">
                                                <label class="form-check-label" for="PKH">PKH</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="NON_BANSOS" value="NON_BANSOS" name="NON_BANSOS">
                                                <label class="form-check-label" for="NON_BANSOS">NON BANSOS</label>
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

                                    {{-- <div class="col-sm-3">
                                    <div class="form-group">
                                            <label for="rw_id" class="form-label">RW</label>
                                            <select class="form-control @error('rw_id') is-invalid @enderror" id="rw_id"
                                                name="rw_id" value="{{ old('rw_id') }}">
                                                <option selected disabled>- Pilih RW-</option>
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
                                        </div> --}}

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

