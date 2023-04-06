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
            <!-- Filter Data --> 
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Filter Data Posyandu</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body">
                                <div class="row">            
                                        <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="filter-posyandukel" class="form-label">Posyandu Kelurahan</label>
                                            <select class="form-control filter" id="filter-posyandukel" name="filter-posyandukel">
                                                <option value="">-- Pilih Kelurahan --</option>
                                                @foreach ($kelbekasi as $kelbekasi)
                                                    <option value="{{ $kelbekasi->id }}">{{ $kelbekasi->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        </div>

                                        <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="filter-rwposyandu" class="form-label">RW Kelurahan</label>
                                            <select class="form-control filter" id="filter-rwposyandu" name="filter-rwposyandu">
                                                <option value="">-- Pilih RW --</option>
                                                @foreach ($rw as $rwposyandu)
                                                    <option value="{{ $rwposyandu->id }}">{{ $rwposyandu->rw }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        </div>

                                        {{-- <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="filter-rtposyandu" class="form-label">RT Kelurahan</label>
                                            <select class="form-control filter" id="filter-rtposyandu" name="filter-rtposyandu">
                                                <option value="">-- Pilih RT --</option>
                                                @foreach ($rt as $rtposyandu)
                                                    <option value="{{ $rtposyandu->id }}">{{ $rtposyandu->rt }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        </div> --}}
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
                            <h3> {{$posyandu->where('village_id', '=', auth()->user()->village_id)->count()}}</h3>
                            <p>Jumlah Kader Posyandu</p>
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
                            <h3> {{$posyandu->where('village_id', '=', auth()->user()->village_id)
                            ->where('rw_id', '=', auth()->user()->rw_id)
                            ->count()}}</h3>
                            <p>Jumlah Kader Posyandu</p>
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
                            <h3> {{$posyandu->count()}}</h3>
                            <p>Jumlah Kader Posyandu</p>
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
                        <h3 class="card-title">Data Posyandu</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="dataposyandu" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">NIK</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Jabatan</th>
                                    <th scope="col">No SK</th>
                                    <th scope="col">Nama Posyandu</th>
                                    <th scope="col">RW</th>
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
        @include('master.csidebar')
        @include('master.footer')
        @include('master.script')

<!--------------Modal Create------------------------->
<form action="/posyandu" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Data Posyandu </h4>
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
                                                    <label for="ktp_id" class="form-label">NIK Kader Posyandu</label>
                                                    <input class="form-control @error('ktp_id') is-invalid @enderror" placeholder="Ketik NIK/Nama, lalu pilih NIK/Nama sesuai yang diinginkan" list="nik_warga" id="ktp_id" name="ktp_id" value="{{ old('ktp_id') }}"> 
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
                                                    <label for="jabatan_id">Jabatan</label>
                                                    <select class="form-control @error('jabatan_id') is-invalid @enderror"
                                                        id="jabatan_id" name="jabatan_id"
                                                        value="{{ old('jabatan_id') }}">
                                                        <option selected disabled>- Pilih Jabatan-</option>
                                                        @foreach ($jabatan as $jabatan)
                                                            <option value="{{ $jabatan->id }}"
                                                                {{ old('jabatan_id') == $jabatan->id ? 'selected' : null }}>
                                                                {{ $jabatan->jabatan }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('jabatan_id') <div class="alert alert-danger">
                                                        {{ $message }} </div>@enderror
                                                </div>
                                                </div>

                                            <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="no_SK" class="form-label">Nomor SK Posyandu</label>
                                                <input type="text" 
                                                    class="form-control @error('no_SK') is-invalid @enderror" id="no_SK"
                                                    placeholder="Nomor SK Posyandu " name="no_SK"
                                                    value="{{ old('no_SK') }}">
                                                @error('no_SK') <div class="alert alert-danger">{{ $message }} </div>
                                                @enderror
                                            </div>
                                            </div>

                                        
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="nama_posyandu" class="form-label">Nama Posyandu</label>
                                                    <input type="text" onkeyup="this.value = this.value.toUpperCase()"
                                                        class="form-control @error('nama_posyandu') is-invalid @enderror"
                                                        id="nama_posyandu" placeholder="Nama Posyandu" name="nama_posyandu" value="{{ old('nama_posyandu') }}">
                                                    @error('nama_posyandu') <div class="alert alert-danger">{{ $message }} </div>
                                                    @enderror
                                                </div>
                                                </div>
                                            {{-- <div class="col-sm-6">
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
                                            </div> --}}

                                            {{-- <div class="col-sm-6">
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

<!--------------Modal View Posyandu------------------------->
    <div class="modal fade" id="modal-view">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Detail Data Posyandu </h4>
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

