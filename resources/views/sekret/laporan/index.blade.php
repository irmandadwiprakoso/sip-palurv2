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
            @if (auth()->user()->role == "superadmin" || auth()->user()->role == "user")
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
                    <h3 class="card-title">Filter Data Laporan Harian Pamor</h3>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-body">

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="filter-pamorkel" class="form-label">Pamor Kelurahan</label>
                                    <select class="form-control filter" id="filter-pamorkel" name="filter-pamorkel">
                                        <option value="">-- Pilih Kelurahan --</option>
                                        @foreach ($kelbekasi as $kelbekasi)
                                            <option value="{{ $kelbekasi->id }}">{{ $kelbekasi->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                </div>

                            <div class="col-sm-6">
                            <div class="form-group">
                                <label for="filter-rwpamor" class="form-label">Pamor RW</label>
                                <select class="form-control filter" id="filter-rwpamor" name="filter-rwpamor">
                                    <option value="">-- Pilih RW --</option>
                                    @foreach ($rw as $erwe)
                                        <option value="{{ $erwe->id }}">{{ $erwe->rw }}</option>
                                    @endforeach
                                </select>
                            </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="filter-tahun" class="form-label">Tahun</label>
                                        <input class="form-control filter" id="filter-tahun" 
                                        type="text" name="filter-tahun" value="{{ date('Y') }}">
                                </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="startdatepamor">Start Date:</label>
                                        <input type="date" class="form-control filter" 
                                        id="filter-startdatepamor" name="filter-startdatepamor">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="enddatepamor">End Date:</label>
                                        <input type="date" class="form-control filter" 
                                        id="filter-enddatepamor" name="filter-enddatepamor">
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
                            <div class="card card-danger">
                                <div class="card-header">
                                    <h3 class="card-title">Data Laporan Harian Pamor</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="datalaporanpamor" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Tanggal Kegiatan</th>
                                                <th scope="col">Uraian Kegiatan</th>
                                                <th scope="col">Jumlah Kegiatan</th>
                                                <th scope="col">Bidang Kegiatan</th>
                                                <th scope="col">Keterangan</th>
                                                <th scope="col">Tindak Lanjut Kegiatan</th>
                                                <th scope="col">RT</th>
                                                <th scope="col">RW</th>
                                                <th scope="col">Kelurahan</th>
                                                <th scope="col">Edit</th>
                                                <th scope="col">Detail</th>
                                                <th scope="col">Delete</th>
                                                <th scope="col">Foto Kegiatan</th>
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

<!--------------Modal Create laporanharian------------------------->
<form action="/laporanpamor" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Data Laporan Harian Pamor</h4>
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
                                            <label for="tanggal">Tanggal Kegiatan</label>
                                            <input type="date"
                                                class="form-control @error('tanggal') is-invalid @enderror"
                                                id="tanggal" name="tanggal"
                                                value="{{ old('tanggal') }}">
                                            @error('tanggal') <div class="alert alert-danger">{{ $message }}
                                            </div>@enderror
                                    </div>
                                    </div>

                                    <div class="col-sm-12">
                                    <div class="form-group">
                                            <label for="kegiatan">Kegiatan Pamor</label>
                                            <input type="text" onkeyup="this.value = this.value.toUpperCase()"
                                                class="form-control @error('kegiatan') is-invalid @enderror"
                                                id="kegiatan" placeholder="Uraian kegiatan Pamor" name="kegiatan"
                                                value="{{ old('kegiatan') }}">
                                            @error('kegiatan') <div class="alert alert-danger">{{ $message }}
                                            </div>@enderror
                                    </div>
                                    </div>
                                    
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="jumlah">Jumlah Kegiatan</label>
                                                <input type="number"
                                                    class="form-control @error('jumlah') is-invalid @enderror" id="jumlah"
                                                    placeholder="Jumlah Kegiatan Pamor" name="jumlah"
                                                    value="{{ old('jumlah') }}">
                                                @error('jumlah') <div class="alert alert-danger">{{ $message }} </div>
                                                @enderror
                                            </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                        <label for="seksi_id">Bidang</label>
                                                        <select class="form-control @error('seksi_id') is-invalid @enderror"
                                                            id="seksi_id" name="seksi_id"
                                                            value="{{ old('seksi_id') }}">
                                                            <option selected disabled>- Pilih Bidang-</option>
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

                                        <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="tinjut">Tindak Lanjut</label>
                                            <input type="text" onkeyup="this.value = this.value.toUpperCase()"
                                                class="form-control @error('tinjut') is-invalid @enderror" id="tinjut"
                                                placeholder="Tindak Lanjut Dari Kegiatan Pamor" name="tinjut"
                                                value="{{ old('tinjut') }}">
                                            @error('tinjut') <div class="alert alert-danger">{{ $message }} </div>
                                            @enderror
                                            </div>
                                            </div>

                                            <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="keterangan">Keterangan</label>
                                                <input type=" text" onkeyup="this.value = this.value.toUpperCase()"
                                                    class="form-control @error('keterangan') is-invalid @enderror"
                                                    id="keterangan" placeholder="Hasil Dari Kegiatan Pamor" name="keterangan"
                                                    value="{{ old('keterangan') }}">
                                                    @error('keterangan') <div class="alert alert-danger">
                                                        {{ $message }} </div>@enderror    
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                            <label for="rt_id">RT</label>
                                            <select class="form-control @error('rt_id') is-invalid @enderror" id="rt_id"
                                                name="rt_id" value="{{ old('rt_id') }}">
                                                <option selected disabled>- Pilih RT -</option>
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
                                            <label for="rw_id">RW</label>
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
                                            
                                        {{-- <div class="col-sm-6">
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
                                            </div> --}}

                                        <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="foto" value="{{ old('foto') }}">Foto Kegiatan</label>
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

<!--------------Modal View laporanharian------------------------->
    <div class="modal fade" id="modal-viewlaporanpamor">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Detail Data Laporan Pamor </h4>
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

