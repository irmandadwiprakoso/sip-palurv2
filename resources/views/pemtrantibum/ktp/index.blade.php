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
            @if (auth()->user()->role != "struktural") 
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-default">
                                    <i class="fas fa-plus-square"></i> Add Data 
                            </button>
                        </div>
                    </div>
            @endif
            <!-- Filter Data --> 
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Filter Data Kependudukan (KTP)</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body">
                                <div class="row">
                                    @if (auth()->user()->role == "superadmin") 
                                    <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="filter-kelktp" class="form-label">Kelurahan</label>
                                        <select class="form-control filter" id="filter-kelktp" name="filter-kelktp">
                                            <option value="">-- Pilih Kelurahan --</option>
                                            @foreach ($kelbekasi as $kelbekasi)
                                                <option value="{{ $kelbekasi->id }}">{{ $kelbekasi->name }}</option>
                                            @endforeach	
                                        </select>
                                    </div>
                                    </div>
                                    @endif
                                    <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="filter-rw" class="form-label">RW</label>
                                        <select class="form-control filter" id="filter-rw" name="filter-rw">
                                            <option value="">-- Pilih RW --</option>
                                            @foreach ($rw as $erwe)
                                                <option value="{{ $erwe->id }}">{{ $erwe->rw }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    </div>

                                    <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="filter-rt" class="form-label">RT</label>
                                        <select class="form-control filter" id="filter-rt" name="filter-rt">
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
        <!-- Detail Data --> 
        <div class="row">
            @if (auth()->user()->role == "pemtrantibum" || auth()->user()->role == "struktural")
            <div class="col-lg-3 col-3">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3> {{$ktp->where('village_id', '=', auth()->user()->village_id)->count()}}</h3>
                        <p>Jumlah Penduduk</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-solid fa-users"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-3">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3> {{$ktp->where('village_id', '=', auth()->user()->village_id)->count('KK')}}</h3>
                        <p>Jumlah Kartu Keluarga</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-solid fa-users"></i>
                    </div>
                </div>
            </div>	

            <div class="col-lg-3 col-3">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3> {{$ktp
                        ->where('village_id', '=', auth()->user()->village_id)
                        ->where('jeniskelamin_id', '=', '1')->count()}}</h3>
                        <p>Jumlah Penduduk Laki-Laki</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-solid fa-users"></i>
                    </div>
                </div>
            </div>	

            <div class="col-lg-3 col-3">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3> {{$ktp
                        ->where('village_id', '=', auth()->user()->village_id)
                        ->where('jeniskelamin_id', '=', '2')->count()}}</h3>
                        <p>Jumlah Penduduk Perempuan</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-solid fa-users"></i>
                        
                    </div>
                </div>
            </div>

            @elseif (auth()->user()->role == "superadmin")
            <div class="col-lg-3 col-3">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3> {{$ktp->count()}}</h3>
                        <p>Jumlah Penduduk</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-solid fa-users"></i>
                    </div>
                </div>
            </div>	

            <div class="col-lg-3 col-3">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3> {{$ktp->count('KK')}}</h3>
                        <p>Jumlah Kartu Keluarga</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-solid fa-users"></i>
                    </div>
                </div>
            </div>	

            <div class="col-lg-3 col-3">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3> {{$ktp->where('jeniskelamin_id', '=', '1')->count()}}</h3>
                        <p>Jumlah Penduduk Laki-Laki</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-solid fa-users"></i>
                    </div>
                </div>
            </div>	

            <div class="col-lg-3 col-3">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3> {{$ktp->where('jeniskelamin_id', '=', '2')->count()}}</h3>
                        <p>Jumlah Penduduk Perempuan</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-solid fa-users"></i>
                    </div>
                </div>
            </div>
        

        @elseif (auth()->user()->role == "user")
        <div class="col-lg-3 col-3">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3> {{$ktp
                    ->where('village_id', '=', auth()->user()->village_id)
                    ->where('rw_id', '=', auth()->user()->rw_id)
                    ->count()}}</h3>
                    <p>Jumlah Penduduk</p>
                </div>
                <div class="icon">
                    <i class="fas fa-solid fa-users"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-3">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3> {{$ktp->where('village_id', '=', auth()->user()->village_id)
                    ->where('rw_id', '=', auth()->user()->rw_id)->count('KK')}}</h3>
                    <p>Jumlah Kartu Keluarga</p>
                </div>
                <div class="icon">
                    <i class="fas fa-solid fa-users"></i>
                </div>
            </div>
        </div>	

        <div class="col-lg-3 col-3">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3> {{$ktp
                    ->where('village_id', '=', auth()->user()->village_id)
                    ->where('rw_id', '=', auth()->user()->rw_id)
                    ->where('jeniskelamin_id', '=', '1')->count()}}</h3>
                    <p>Jumlah Penduduk Laki-Laki</p>
                </div>
                <div class="icon">
                    <i class="fas fa-solid fa-users"></i>
                </div>
            </div>
        </div>	

        <div class="col-lg-3 col-3">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3> {{$ktp
                    ->where('village_id', '=', auth()->user()->village_id)
                    ->where('rw_id', '=', auth()->user()->rw_id)
                    ->where('jeniskelamin_id', '=', '2')->count()}}</h3>
                    <p>Jumlah Penduduk Perempuan</p>
                </div>
                <div class="icon">
                    <i class="fas fa-solid fa-users"></i>
                    
                </div>
            </div>
        </div>
        @endif
        </div>  
        <!-- Main content / Tampilan Data -->
                            <div class="card card-danger">
                                <div class="card-header">
                                    <h3 class="card-title">Data Kependudukan (KTP)</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="dataktp" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">NIK</th>
                                                <th scope="col">KK</th>
                                                <th scope="col">Hubungan Keluarga</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Tempat Lahir</th>
                                                <th scope="col">Tanggal Lahir (YYYY-MM-DD)</th>
                                                <th scope="col">Alamat</th>
                                                <th scope="col">RT</th>
                                                <th scope="col">RW</th>
                                                <th scope="col">Provinsi</th>
                                                <th scope="col">Kota/Kab</th>
                                                <th scope="col">Kecamatan</th>
                                                <th scope="col">Kelurahan</th>
                                                <th scope="col">Agama</th>
                                                <th scope="col">Status Kawin</th>
                                                <th scope="col">Jenis Kelamin</th>
                                                <th scope="col">Pekerjaan</th>
                                                <th scope="col">Edit</th>
                                                <th scope="col">Hapus</th>
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

<!--------------Modal Create User------------------------->
<form action="/ktp" method="post">
    @csrf
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Data Kependudukan</h4>
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
                                            <label for="id">NIK</label>
                                            <input type="number" class="form-control @error('id') is-invalid @enderror"
                                                id="id" placeholder="NIK" name="id" value="{{ old('id') }}">
                                            @error('id') <div class="alert alert-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                        </div>
                                    <div class="col-sm-6">
                                    <div class="form-group">
                                            <label for="KK">KK</label>
                                            <input type="number" class="form-control @error('KK') is-invalid @enderror"
                                                id="KK" placeholder="KK " name="KK" value="{{ old('KK') }}">
                                            @error('KK') <div class="alert alert-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                        </div>
                                    <div class="col-sm-6">
                                    <div class="form-group">
                                            <label for="nama">Nama</label>
                                            <input type="text" onkeyup="this.value = this.value.toUpperCase()"
                                                class="form-control @error('nama') is-invalid @enderror" id="nama"
                                                placeholder="Nama Lengkap" name="nama" value="{{ old('nama') }}">
                                            @error('nama') <div class="alert alert-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                        </div>
                                    <div class="col-sm-6">
                                    <div class="form-group"> 
                                            <label for="hubkeluarga_id" class="form-label">Hubungan Keluarga</label>
                                            <select class="form-control @error('hubkeluarga_id') is-invalid @enderror" id="hubkeluarga_id"
                                                name="hubkeluarga_id" value="{{ old('hubkeluarga_id') }}">
                                                <option selected disabled>- Pilih Hubungan Keluarga -</option>
                                                @foreach ($hubkeluarga as $hub)
                                                    <option value="{{ $hub->id }}"
                                                        {{ old('hubkeluarga_id') == $hub->id ? 'selected' : null }}>
                                                        {{ $hub->hubkeluarga }}</option>
                                                @endforeach
                                            </select>
                                            @error('hubkeluarga_id') <div class="alert alert-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                        </div>
                                    <div class="col-sm-6">
                                    <div class="form-group">
                                            <label for="tempat_lahir">Tempat Lahir</label>
                                            <input type="text" onkeyup="this.value = this.value.toUpperCase()"
                                                class="form-control @error('tempat_lahir') is-invalid @enderror"
                                                id="tempat_lahir" placeholder="Tempat Lahir" name="tempat_lahir"
                                                value="{{ old('tempat_lahir') }}">
                                            @error('tempat_lahir') <div class="alert alert-danger">{{ $message }}
                                            </div>@enderror
                                        </div>
                                        </div>
                                    <div class="col-sm-6">
                                    <div class="form-group">
                                            <label for="tanggal_lahir">Tanggal Lahir</label>
                                            <input type="date"
                                                class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                                id="tanggal_lahir" placeholder="Tanggal Lahir" name="tanggal_lahir"
                                                value="{{ old('tanggal_lahir') }}">
                                            @error('tanggal_lahir') <div class="alert alert-danger">{{ $message }}
                                            </div>@enderror
                                        </div>
                                        </div>
                                    <div class="col-sm-12">
                                    <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <input type="text" onkeyup="this.value = this.value.toUpperCase()"
                                                class="form-control @error('alamat') is-invalid @enderror"
                                                id="alamat" placeholder="Alamat" name="alamat"
                                                value="{{ old('alamat') }}">
                                            @error('alamat') <div class="alert alert-danger">{{ $message }}
                                            </div>@enderror
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
                                    <div class="col-sm-6">
                                    <div class="form-group">
                                            <label for="rw_id" class="form-label">RW</label>
                                            <select class="form-control @error('rw_id') is-invalid @enderror" id="rw_id"
                                                name="rw_id" value="{{ old('rw_id') }}">
                                                <option selected disabled>- Pilih RW -</option>
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
                                            <select class="form-control @error('province_id') is-invalid @enderror" id="provinsi"
                                                name="province_id" value="{{ old('province_id') }}">
                                                <option selected disabled>- Pilih Provinsi-</option>
                                                @foreach ($provinces as $provinsi)
                                                    <option value="{{ $provinsi->id }}"
                                                        {{ old('province_id') == $provinsi->id ? 'selected' : null}}>
                                                        {{ $provinsi->name }} </option>
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
                                                    <option value="{{ $kabupaten->id }}"
                                                        {{ old('regency_id') == $kabupaten->id ? 'selected' : null}}>
                                                        {{ $kabupaten->name }}</option>
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
                                                    <option value="{{ $kecamatan->id }}"
                                                        {{ old('district_id') == $kecamatan->id ? 'selected' : null }}>
                                                        {{ $kecamatan->name }}
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
                                                    <option value="{{ $desa->id }}"
                                                        {{ old('village_id') == $desa->id ? 'selected' : null }}>
                                                        {{ $desa->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('village_id') <div class="alert alert-danger">{{ $message }}
                                            </div>@enderror
                                    </div>
                                    </div>
                                    <div class="col-sm-6">
                                    <div class="form-group">        
                                            <label for="agama_id">Agama</label>
                                            <select class="form-control @error('agama_id') is-invalid @enderror"
                                                id="agama_id" name="agama_id" value="{{ old('agama_id') }}">
                                                <option selected disabled>- Pilih Agama -</option>
                                                @foreach ($agama as $agamadia)
                                                    <option value="{{ $agamadia->id }}"
                                                        {{ old('agama_id') == $agamadia->id ? 'selected' : null }}>
                                                        {{ $agamadia->agama }}</option>
                                                @endforeach
                                            </select>
                                            @error('agama_id') <div class="alert alert-danger">{{ $message }}
                                            </div>@enderror
                                        </div>
                                        </div>
                                    <div class="col-sm-6">
                                    <div class="form-group">
                                            <label for="statuskawin_id">Status Perkawinan</label>
                                            <select class="form-control @error('statuskawin_id') is-invalid @enderror"
                                                id="statuskawin_id" name="statuskawin_id"
                                                value="{{ old('statuskawin_id') }}">
                                                <option selected disabled>- Pilih Status Perkawinan -</option>
                                                @foreach ($statuskawin as $kawin)
                                                    <option value="{{ $kawin->id }}"
                                                        {{ old('statuskawin_id') == $kawin->id ? 'selected' : null }}>
                                                        {{ $kawin->statuskawin }}</option>
                                                @endforeach
                                            </select>
                                            @error('statuskawin_id') <div class="alert alert-danger">
                                                {{ $message }} </div>@enderror
                                        </div>
                                        </div>
                                    <div class="col-sm-6">
                                    <div class="form-group">
                                            <label for="jeniskelamin_id">Jenis Kelamin</label>
                                            <select class="form-control @error('jeniskelamin_id') is-invalid @enderror"
                                                id="jeniskelamin_id" name="jeniskelamin_id"
                                                value="{{ old('jeniskelamin_id') }}">
                                                <option selected disabled>- Pilih Jenis Kelamin -</option>
                                                @foreach ($jeniskelamin as $jk)
                                                    <option value="{{ $jk->id }}"
                                                        {{ old('jeniskelamin_id') == $jk->id ? 'selected' : null }}>
                                                        {{ $jk->jeniskelamin }}</option>
                                                @endforeach
                                            </select>
                                            @error('jeniskelamin_id') <div class="alert alert-danger">
                                                {{ $message }} </div>@enderror
                                        </div>
                                        </div>
                                    <div class="col-sm-6">
                                    <div class="form-group">
                                            <label for="pekerjaan_id">Pekerjaan</label>
                                            <select class="form-control @error('pekerjaan_id') is-invalid @enderror"
                                                id="pekerjaan_id" name="pekerjaan_id"
                                                value="{{ old('pekerjaan_id') }}">
                                                <option selected disabled>- Pilih Pekerjaan-</option>
                                                @foreach ($pekerjaan as $pekerjaan)
                                                    <option value="{{ $pekerjaan->id }}"
                                                        {{ old('pekerjaan_id') == $pekerjaan->id ? 'selected' : null }}>
                                                        {{ $pekerjaan->pekerjaan }}</option>
                                                @endforeach
                                            </select>
                                            @error('pekerjaan_id') <div class="alert alert-danger">
                                                {{ $message }} </div>@enderror
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
    <!-- /.modal -->
</form>

</body>
</html>

