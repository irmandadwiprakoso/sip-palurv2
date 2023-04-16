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
            
            <!-- Chart Data --> 
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Chart</h3>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-body">
                            <div class="row">  
                                <div class="col-sm-12">
                                    <div class="form-group">            
                                    {!! $chart->container() !!}
                            </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <!-- Filter Data --> 
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Filter Data POSPIN</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body">
                                <div class="row">  
                                        <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="filter-pospinkel" class="form-label">POSPIN Kelurahan</label>
                                            <select class="form-control filter" id="filter-pospinkel" name="filter-pospinkel">
                                                <option value="">-- Pilih Kelurahan --</option>
                                                @foreach ($kelbekasi as $kelbekasi)
                                                    <option value="{{ $kelbekasi->id }}">{{ $kelbekasi->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        </div>

                                        <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="filter-rwpospin" class="form-label">RW Kelurahan</label>
                                            <select class="form-control filter" id="filter-rwpospin" name="filter-rwpospin">
                                                <option value="">-- Pilih RW --</option>
                                                @foreach ($rw as $rwpospin)
                                                    <option value="{{ $rwpospin->id }}">{{ $rwpospin->rw }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>									
                </div>									
             
            <!-- Detail Data --> 
            <div class="row">
                @if (auth()->user()->role == "permasbang" || auth()->user()->role == "struktural")
                <div class="col-lg-4 col-4">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3> {{$pospin->where('village_id', '=', auth()->user()->village_id)->count()}}</h3>
                            <p>Jumlah Bayi</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-thin fa-user-plus"></i>
                        </div>
                    </div>
                </div>
                @elseif (auth()->user()->role == "user")
                <div class="col-lg-4 col-4">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3> {{$pospin->where('village_id', '=', auth()->user()->village_id)
                            ->where('rw_id', '=', auth()->user()->rw_id)
                            ->count()}}</h3>
                            <p>Jumlah Bayi</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-thin fa-user-plus"></i>
                        </div>
                    </div>
                </div>
                @elseif (auth()->user()->role == "superadmin")
                <div class="col-lg-4 col-4">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3> {{$pospin->count()}}</h3>
                            <p>Jumlah Bayi</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-thin fa-user-plus"></i>
                        </div>
                    </div>
                </div>
                @endif																													
            </div>

            <!-- Main content / Tampilan Data -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Detail Data POSPIN</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="datapospin" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">NIK</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">JK</th>
                                                <th scope="col">Tgl Lahir</th>
                                                <th scope="col">Posyandu</th>
                                                <th scope="col">RW</th>
                                                <th scope="col">PIN 1</th>
                                                <th scope="col">PIN 2</th>
                                                <th scope="col">Kelurahan</th>
                                                <th scope="col">Kecamatan</th>
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
        @include('master.csidebar')
        @include('master.footer')
        @include('master.script')
        <script src="{{ $chart->cdn() }}"></script>
        {{ $chart->script() }}

<!--------------Modal Create------------------------->
<form action="/pospin" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Data POSPIN </h4>
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
                                                    <label for="ktp_id" class="form-label">NIK/Nama POSPIN</label>
                                                    <input class="form-control @error('ktp_id') is-invalid @enderror" 
                                                    placeholder="Ketik NIK/Nama, lalu pilih NIK/Nama sesuai yang diinginkan" list="nik_warga" id="ktp_id" name="ktp_id" value="{{ old('ktp_id') }}"> 
                                                        <datalist id="nik_warga">
                                                        @foreach ($ktp as $ktp)
                                                            <option value="{{$ktp->id}}"> {{$ktp->nama}}</option>
                                                            <!-- <option value="{{$ktp->id}}" {{old('ktp_id') == $ktp->id ? 'selected' : null }}>{{$ktp->NIK}}</option> -->
                                                        @endforeach
                                                        </datalist>
                                                    @error ('ktp_id') <div class="alert alert-danger">{{ $message }} </div>@enderror 
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="saranakesehatan_id">Posyandu</label>
                                                    <select class="form-control @error('saranakesehatan_id') is-invalid @enderror"
                                                        id="saranakesehatan_id" name="saranakesehatan_id"
                                                        value="{{ old('saranakesehatan_id') }}">
                                                        <option selected disabled>- Pilih Posyandu-</option>
                                                        @foreach ($saranakesehatan as $saranakesehatan)
                                                            <option value="{{ $saranakesehatan->id}}"
                                                                {{ old('saranakesehatan_id') == $saranakesehatan->id ? 'selected' : null }}>
                                                                {{ $saranakesehatan->nama }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('saranakesehatan_id') <div class="alert alert-danger">
                                                        {{ $message }} </div>@enderror
                                                </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                    <label for="pin_1" class="form-label">PIN 1</label>
                                                    <select class="form-control @error('pin_1') is-invalid @enderror" id="pin_1" name="pin_1">
                                                        <option selected disabled>-- Pilih Keterangan --</option>
                                                        <option value="Sudah">Sudah</option>
                                                        <option value="Belum">Belum</option>
                                                    </select>
                                                    @error('pin_1') <div class="alert alert-danger">{{ $message }} </div>
                                                    @enderror
                                                </div>
                                                </div>      

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                    <label for="pin_2" class="form-label">PIN 2</label>
                                                    <select class="form-control @error('pin_2') is-invalid @enderror" id="pin_2" name="pin_2">
                                                        <option selected disabled>-- Pilih Keterangan --</option>
                                                        <option value="Sudah">Sudah</option>
                                                        <option value="Belum">Belum</option>
                                                    </select>
                                                    @error('pin_2') <div class="alert alert-danger">{{ $message }} </div>
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

<!--------------Modal View POSPIN------------------------->
    <div class="modal fade" id="modal-view">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Detail Data POSPIN </h4>
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

