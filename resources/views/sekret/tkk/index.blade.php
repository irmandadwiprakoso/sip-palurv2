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
            <!-- Button Tambdah Data -->    
                <div class="row mb-2">
                        <div class="col-sm-6">
                            @if (auth()->user()->role == "superadmin" || 
                                 auth()->user()->role == "sekret")
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-default">
                                    <i class="fas fa-plus-square"></i> Add Data 
                            </button>
                            @endif
                            @if (auth()->user()->role == "superadmin")
                            <a href="/trashtkk" class="btn btn-danger">
                                <i class="fas fa-trash"></i> Restore Data
                            </a>
                            @endif
                        </div>
                </div>
            <!-- Filter Data --> 
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Filter Data TKK</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body">
                                <div class="row">
                                    @if (auth()->user()->role == "superadmin")             
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="filter-tkkkel" class="form-label">Pamor Kelurahan</label>
                                            <select class="form-control filter" id="filter-tkkkel" name="filter-tkkkel">
                                                <option value="">-- Pilih Kelurahan --</option>
                                                @foreach ($kelbekasi as $kelbekasi)
                                                    <option value="{{ $kelbekasi->id }}">{{ $kelbekasi->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>									
                </div>									
            	
            <!-- Detail Data --> 
            <div class="row">
                @if (auth()->user()->role != "superadmin")
                <div class="col-lg-4 col-4">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3> {{$tkk->where('village_id', '=', auth()->user()->village_id)->count()}}</h3>
                            <p>TKK</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-thin fa-user-plus"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-4">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3> {{$tkk->where('village_id', '=', auth()->user()->village_id)->where('jabatan_id', '=', '11')->count()}}</h3>
                            <p>Pamor</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-thin fa-user-plus"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-4">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3> {{$tkk->where('village_id', '=', auth()->user()->village_id)->count() - 
                            $tkk->where('village_id', '=', auth()->user()->village_id)->where('jabatan_id', '=', '11')->count()}}</h3>
                            <p>Non Pamor/Administrasi</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-thin fa-user-plus"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-3">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3> {{$tkk->where('village_id', '=', auth()->user()->village_id)->where('seksi_id', '=', '1')->count()}}</h3>
                            <p>Sekretariat</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-thin fa-user-plus"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-3">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3> {{$tkk->where('village_id', '=', auth()->user()->village_id)->where('seksi_id', '=', '2')->count()}}</h3>
                            <p>Kessos</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-thin fa-user-plus"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-3">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3> {{$tkk->where('village_id', '=', auth()->user()->village_id)->where('seksi_id', '=', '3')->count()}}</h3>
                            <p>Pem Trantibum</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-thin fa-user-plus"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-3">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3> {{$tkk->where('village_id', '=', auth()->user()->village_id)->where('seksi_id', '=', '4')->count()}}</h3>
                            <p>Permasbang</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-thin fa-user-plus"></i>
                        </div>
                    </div>
                </div>
                @else
                <div class="col-lg-4 col-4">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3> {{$tkk->count()}}</h3>
                            <p>TKK</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-thin fa-user-plus"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-4">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3> {{$tkk->where('jabatan_id', '=', '11')->count()}}</h3>
                            <p>Pamor</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-thin fa-user-plus"></i>
                        </div>
                    </div>
                </div>	
                <div class="col-lg-4 col-4">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3> {{$tkk->count() - $tkk->where('jabatan_id', '=', '11')->count()}}</h3>
                            <p>Non Pamor/Administrasi</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-thin fa-user-plus"></i>
                        </div>
                    </div>
                </div>	
                <div class="col-lg-3 col-3">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3> {{$tkk->where('seksi_id', '=', '1')->count()}}</h3>
                            <p>Sekretariat</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-thin fa-user-plus"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-3">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3> {{$tkk->where('seksi_id', '=', '2')->count()}}</h3>
                            <p>Kessos</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-thin fa-user-plus"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-3">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3> {{$tkk->where('seksi_id', '=', '3')->count()}}</h3>
                            <p>Pem Trantibum</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-thin fa-user-plus"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-3">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3> {{$tkk->where('seksi_id', '=', '4')->count()}}</h3>
                            <p>Permasbang</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-thin fa-user-plus"></i>
                        </div>
                    </div>
                </div>
                @endif																													
            </div>			

            <!-- Main content / Tampilan Data -->
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">Data TKK</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="datatkk" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">NIK</th>
                                <th scope="col">KK</th>
                                <th scope="col">Pamor RW</th>
                                <th scope="col">Kecamatan</th>
                                <th scope="col">Kelurahan</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Detail</th>
                                <th scope="col">Delete</th>
                                <th scope="col">Tempat Lahir</th>
                                <th scope="col">Tanggal Lahir</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Agama</th>
                                <th scope="col">Pendidikan</th>
                                <th scope="col">Status Kawin</th>
                                <th scope="col">Divisi</th>
                                <th scope="col">Jabatan</th>
                                <th scope="col">SK TKK</th>
                                <th scope="col">No Rekening</th>
                                <th scope="col">NPWP</th>
                                <th scope="col">Email</th>
                                <th scope="col">No HP</th>
                                <th scope="col">Foto</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        </div>
        @include('master.csidebar')
        @include('master.footer')
        @include('master.script')

<!--------------Modal Create TKK------------------------->
<form action="/tkk" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Data TKK / PAMOR </h4>
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
                                                id="id" placeholder="NIK TKK" name="id" value="{{ old('id') }}">
                                            @error('id') <div class="alert alert-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                        </div>
                                    <div class="col-sm-6">
                                    <div class="form-group">
                                            <label for="KK">KK</label>
                                            <input type="number" class="form-control @error('KK') is-invalid @enderror"
                                                id="KK" placeholder="Kartu Keluarga TKK" name="KK" value="{{ old('KK') }}">
                                            @error('KK') <div class="alert alert-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                        </div>
                                    <div class="col-sm-6">
                                    <div class="form-group">
                                            <label for="nama">Nama</label>
                                            <input type="text" onkeyup="this.value = this.value.toUpperCase()"
                                                class="form-control @error('nama') is-invalid @enderror" id="nama"
                                                placeholder="Nama Lengkap TKK" name="nama" value="{{ old('nama') }}">
                                            @error('nama') <div class="alert alert-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                        </div>
                                    <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="npwp" class="form-label">NPWP</label>
                                        <input type="text" class="form-control @error('npwp') is-invalid @enderror"
                                            id="npwp" placeholder="NPWP TKK" name="npwp" value="{{ old('npwp') }}">
                                        @error('npwp') <div class="alert alert-danger">{{ $message }} </div>
                                        @enderror
                                        </div>
                                        </div>
                                    <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="SK_Tkk" class="form-label">SK Pengangkatan TKK</label>
                                        <input type="date"
                                            class="form-control @error('SK_Tkk') is-invalid @enderror" id="SK_Tkk"
                                            placeholder="SK TKK" name="SK_Tkk" value="{{ old('SK_Tkk') }}">
                                        @error('SK_Tkk') <div class="alert alert-danger">{{ $message }} </div>
                                        @enderror
                                        </div>
                                        </div>
                                    <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email"
                                            class="form-control @error('email') is-invalid @enderror" id="email"
                                            placeholder="Email TKK" name="email" value="{{ old('email') }}">
                                        @error('email') <div class="alert alert-danger">{{ $message }} </div>
                                        @enderror
                                        </div>
                                        </div>
                                    <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="no_rek" class="form-label">Nomor Rekening BJB</label>
                                        <input type="number"
                                            class="form-control @error('no_rek') is-invalid @enderror" id="no_rek"
                                            placeholder="Nomor Rekening BJB TKK" name="no_rek"
                                            value="{{ old('no_rek') }}">
                                        @error('no_rek') <div class="alert alert-danger">{{ $message }} </div>
                                        @enderror
                                        </div>
                                        </div>
                                    <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="no_HP" class="form-label">Nomor Handphone</label>
                                        <input type="number"
                                            class="form-control @error('no_HP') is-invalid @enderror" id="no_HP"
                                            placeholder="Nomor HP TKK" name="no_HP" value="{{ old('no_HP') }}">
                                        @error('no_HP') <div class="alert alert-danger">{{ $message }} </div>
                                        @enderror
                                        </div>
                                        </div>
                                    <div class="col-sm-6">
                                    <div class="form-group">
                                            <label for="tempat_lahir">Tempat Lahir</label>
                                            <input type="text" onkeyup="this.value = this.value.toUpperCase()"
                                                class="form-control @error('tempat_lahir') is-invalid @enderror"
                                                id="tempat_lahir" placeholder="Tempat Lahir TKK" name="tempat_lahir"
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
                                                id="alamat" placeholder="Alamat Lengkap (Jl. Patriot Raya RW.001 Kel.Jakasampurna Kec.Bekasi Barat Kota Bekasi Prov.Jawa Barat)" name="alamat"
                                                value="{{ old('alamat') }}">
                                            @error('alamat') <div class="alert alert-danger">{{ $message }}
                                            </div>@enderror
                                        </div>
                                        </div>
                                    <div class="col-sm-6">
                                    <div class="form-group">
                                            <label for="rw_id" class="form-label">Pamor RW</label>
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
                                            <label for="pendidikan_id">Pendidikan</label>
                                            <select class="form-control @error('pendidikan_id') is-invalid @enderror"
                                                id="pendidikan_id" name="pendidikan_id"
                                                value="{{ old('pendidikan_id') }}">
                                                <option selected disabled>- Pilih Pendidikan-</option>
                                                @foreach ($pendidikan as $pendidikan)
                                                    <option value="{{ $pendidikan->id }}"
                                                        {{ old('pendidikan_id') == $pendidikan->id ? 'selected' : null }}>
                                                        {{ $pendidikan->pendidikan }}</option>
                                                @endforeach
                                            </select>
                                            @error('pendidikan_id') <div class="alert alert-danger">
                                                {{ $message }} </div>@enderror
                                        </div>
                                        </div>

                                    <div class="col-sm-6">
                                    <div class="form-group">
                                            <label for="seksi_id">Divisi</label>
                                            <select class="form-control @error('seksi_id') is-invalid @enderror"
                                                id="seksi_id" name="seksi_id"
                                                value="{{ old('seksi_id') }}">
                                                <option selected disabled>- Pilih Divisi-</option>
                                                @foreach ($seksi as $seksi)
                                                    <option value="{{ $seksi->id }}"
                                                        {{ old('seksi_id') == $seksi->id ? 'selected' : null }}>
                                                        {{ $seksi->seksi }}</option>
                                                @endforeach
                                            </select>
                                            @error('seksi_id') <div class="alert alert-danger">
                                                {{ $message }} </div>@enderror
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
                                            <label for="kecamatan">Kecamatan</label>
                                            <select class="form-control @error('district_id') is-invalid @enderror"
                                                id="kecamatan" name="district_id" value="{{ old('district_id') }}">
                                                <option selected disabled>-Pilih Kecamatan-</option>
                                                @foreach ($kecbekasi as $kecbekasi)
                                                <option value="{{ $kecbekasi->id }}">{{ $kecbekasi->name }}</option>
                                            @endforeach
                                            </select>
                                            @error('district_id') <div class="alert alert-danger">{{ $message }}
                                            </div>@enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="desa">Kelurahan</label>
                                            <select class="form-control @error('village_id') is-invalid @enderror"
                                                id="desa" name="village_id" value="{{ old('village_id') }}">
                                                <option selected disabled>-Pilih Kelurahan-</option>
                                                @foreach ($villages as $desa)
                                                    <option value="{{ $desa->id }}">{{ $desa->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('village_id') <div class="alert alert-danger">{{ $message }}
                                            </div>@enderror
                                        </div>
                                    </div>
                                    

                                    <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="foto" value="{{ old('foto') }}">Foto Profile</label>
                                        <input type="file" class="form-control @error('foto') is-invalid @enderror"
                                            id="foto" name="foto">
                                        @error('foto') <div class="alert alert-danger">{{ $message }} </div>
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

<!--------------Modal View TKK------------------------->
    <div class="modal fade" id="modal-view">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Detail Data TKK / PAMOR </h4>
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

