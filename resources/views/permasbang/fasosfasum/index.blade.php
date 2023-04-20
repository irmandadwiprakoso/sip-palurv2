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
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-default">
                                <i class="fas fa-plus-square"></i> Add Data
                            </button>
                        </div>
                    </div>
            <!-- Filter Data --> 
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Filter Data PSU</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body">
                                <div class="row">            
                                        <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="filter-fasosfasumkel" class="form-label">Kelurahan</label>
                                            <select class="form-control filter" id="filter-fasosfasumkel" name="filter-fasosfasumkel">
                                                <option value="">-- Pilih Kelurahan --</option>
                                                @foreach ($kelbekasi as $kelbekasi)
                                                    <option value="{{ $kelbekasi->id }}">{{ $kelbekasi->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="filter-rwfasosfasum" class="form-label">RW</label>
                                                <select class="form-control filter" id="filter-rwfasosfasum" name="filter-rwfasosfasum">
                                                    <option value="">-- Pilih RW --</option>
                                                    @foreach ($rw as $erwe)
                                                        <option value="{{ $erwe->id }}">{{ $erwe->rw }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            </div>
    
                                            <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="filter-rtfasosfasum" class="form-label">RT</label>
                                                <select class="form-control filter" id="filter-rtfasosfasum" name="filter-rtfasosfasum">
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
            									
            <!-- Main content / Tampilan Data -->
                            <div class="card card-danger">
                                <div class="card-header">
                                    <h3 class="card-title">Data Fasos Fasum</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="datafasosfasum" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Alamat</th>
                                                <th scope="col">RT</th>
                                                <th scope="col">RW</th>
                                                <th scope="col">Edit</th>
                                                <th scope="col">Detail</th>
                                                <th scope="col">Delete</th>
                                                <th scope="col">Kecamatan</th>
                                                <th scope="col">Kelurahan</th>
                                                <th scope="col">Koordinat</th>
                                                <th scope="col">Luas</th>
                                                <th scope="col">Pemanfaatan</th>
                                                <th scope="col">Nama Pengembang</th>
                                                <th scope="col">Nama Perumahan</th>
                                                <th scope="col">Foto</th>
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

<!--------------Modal Create PSU------------------------->
<form action="/fasosfasum" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Data Fasos Fasum </h4>
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
                                        <label for="nama" class="form-label">Nama</label>
                                        <input type="text" onkeyup="this.value = this.value.toUpperCase()"
                                            class="form-control @error('nama') is-invalid @enderror" id="nama"
                                            placeholder="Nama FASOS/FASUM" name="nama" value="{{ old('nama') }}">
                                        @error('nama') <div class="alert alert-danger">{{ $message }} </div>
                                        @enderror
                                    </div>
                                    </div>

                                    <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="alamat" class="form-label">Alamat</label>
                                        <input type="text" onkeyup="this.value = this.value.toUpperCase()"
                                            class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                                            placeholder="Alamat FASOS/FASUM" name="alamat"
                                            value="{{ old('alamat') }}">
                                        @error('alamat') <div class="alert alert-danger">{{ $message }} </div>
                                        @enderror
                                    </div>
                                    </div>

                                    <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="rt_id" class="form-label">RT</label>
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

                                    {{-- <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="rw_id" class="form-label">RW</label>
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
                                    </div> --}}

                                    <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="koordinat" class="form-label">Koordinat Lokasi</label>
                                        <input type="text" onkeyup="this.value = this.value.toUpperCase()"
                                            class="form-control @error('koordinat') is-invalid @enderror"
                                            id="koordinat" placeholder="Koordinat Lokasi" name="koordinat"
                                            value="{{ old('koordinat') }}">
                                        @error('koordinat') <div class="alert alert-danger">{{ $message }}
                                        </div>@enderror
                                    </div>
                                    </div>

                                    <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="luas" class="form-label">Luas Lokasi</label>
                                        <input type="number"
                                            class="form-control @error('luas') is-invalid @enderror" id="luas"
                                            placeholder="Luas Lokasi" name="luas" value="{{ old('luas') }}">
                                        @error('luas') <div class="alert alert-danger">{{ $message }} </div>
                                        @enderror
                                    </div>
                                    </div>

                                    <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="pemanfaatan" class="form-label">Pemanfaatan Lokasi</label>
                                        <input type="text" onkeyup="this.value = this.value.toUpperCase()"
                                            class="form-control @error('pemanfaatan') is-invalid @enderror"
                                            id="pemanfaatan" placeholder="Pemanfaatan Lokasi" name="pemanfaatan"
                                            value="{{ old('pemanfaatan') }}">
                                        @error('pemanfaatan') <div class="alert alert-danger">{{ $message }}
                                        </div>@enderror
                                    </div>
                                    </div>

                                    <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="nama_pengembang" class="form-label">Nama Pengembang</label>
                                        <input type="text" onkeyup="this.value = this.value.toUpperCase()"
                                            class="form-control @error('nama_pengembang') is-invalid @enderror"
                                            id="nama_pengembang" placeholder="Nama Pengembang"
                                            name="nama_pengembang" value="{{ old('nama_pengembang') }}">
                                        @error('nama_pengembang') <div class="alert alert-danger">
                                            {{ $message }} </div>@enderror
                                    </div>
                                    </div>

                                    <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="nama_perumahan" class="form-label">Nama Perumahan</label>
                                        <input type="text" onkeyup="this.value = this.value.toUpperCase()"
                                            class="form-control @error('nama_perumahan') is-invalid @enderror"
                                            id="nama_perumahan" placeholder="Nama Perumahan" name="nama_perumahan"
                                            value="{{ old('nama_perumahan') }}">
                                        @error('nama_perumahan') <div class="alert alert-danger">
                                            {{ $message }} </div>@enderror
                                    </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                        <label for="foto" value="{{ old('foto') }}" class="form-label">Foto
                                            Objek</label>
                                        <input type="file" class="form-control @error('foto') is-invalid @enderror"
                                            id="foto" name="foto">
                                        @error('foto') <div class="alert alert-danger">{{ $message }} </div>
                                        @enderror
                                    </div>
                                    </div>

                                    {{-- <div class="col-sm-6">
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
<!--------------Modal View PSU------------------------->
<div class="modal fade" id="modal-view">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Data Fasos Fasum </h4>
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

