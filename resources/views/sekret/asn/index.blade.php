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
            <!-- Button Tambah dan Restore Data -->    
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-default">
                                <i class="fas fa-plus-square"></i> Add Data 
                            </button>
                            @if (auth()->user()->role == "superadmin")
                            <a href="/trashasn" class="btn btn-danger">
                                <i class="fas fa-trash"></i> Restore Data
                            </a>
                            @endif
                        </div>
                    </div>									               
            <!-- Filter Data --> 
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">Filter Data ASN</h3>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="filter-asnkel" class="form-label">Kelurahan</label>
                                        <select class="form-control filter" id="filter-asnkel" name="filter-asnkel">
                                            <option value="">-- Pilih Kelurahan --</option>
                                            @foreach ($kelbekasi as $kelbekasi)
                                                <option value="{{ $kelbekasi->id }}">{{ $kelbekasi->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    </div>

                                    <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="filter-jabatanasn" class="form-label">Jabatan</label>
                                        <select class="form-control filter" id="filter-jabatanasn" name="filter-jabatanasn">
                                            <option value="">-- Pilih Jabatan --</option>
                                            @foreach ($jabatan as $jabatanasn)
                                                <option value="{{ $jabatanasn->id }}">{{ $jabatanasn->jabatan }}</option>
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
                @if (auth()->user()->role != "superadmin")
                <div class="col-lg-4 col-4">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3> {{$asn->where('village_id', '=', auth()->user()->village_id)->count()}}</h3>
                            <p>Jumlah ASN</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-thin fa-user-plus"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-4">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3> {{$asn->where('village_id', '=', auth()->user()->village_id)->where('tipe_pns', '=', 'Struktural')->count()}}</h3>
                            <p>Struktural</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-thin fa-user-plus"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-4">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3> {{$asn->where('village_id', '=', auth()->user()->village_id)->where('tipe_pns', '=', 'Pelaksana')->count()}}</h3>
                            <p>Pelaksana</p>
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
                            <h3> {{$asn->count()}}</h3>
                            <p>Jumlah ASN</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-thin fa-user-plus"></i>
                            
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-4">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3> {{$asn->where('tipe_pns', '=', 'Struktural')->count()}}</h3>
                            <p>Struktural</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-thin fa-user-plus"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-4">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3> {{$asn->where('tipe_pns', '=', 'Pelaksana')->count()}}</h3>
                            <p>Pelaksana</p>
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
                    <h3 class="card-title">Data ASN</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="dataasn" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">NIP</th>
                                <th scope="col">NIK</th>
                                <th scope="col">Pangkat</th>
                                <th scope="col">Golongan</th>
                                <th scope="col">Jabatan</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Detail</th>
                                <th scope="col">Delete</th>
                                <th scope="col">Kecamatan</th>
                                <th scope="col">Kelurahan</th>
                                <th scope="col">Tempat Lahir</th>
                                <th scope="col">Tanggal Lahir</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Agama</th>
                                <th scope="col">Pendidikan</th>
                                <th scope="col">Status Kawin</th>
                                <th scope="col">SK Jabatan</th>
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
            <!-- /.card -->
        </div>
        </div>

        @include('master.csidebar')
        @include('master.footer')
        @include('master.script')

<!--------------Modal Create asn------------------------->
<form action="/asn" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Data ASN</h4>
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
                                            <label for="id">NIP</label>
                                            <input type="number" class="form-control @error('id') is-invalid @enderror"
                                                id="id" placeholder="NIP ASN" name="id" value="{{ old('id') }}">
                                            @error('id') <div class="alert alert-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                        </div>

                                        <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="NIK">NIK</label>
                                            <input type="number" class="form-control @error('NIK') is-invalid @enderror"
                                                id="NIK" placeholder="NIK ASN" name="NIK" value="{{ old('NIK') }}">
                                            @error('NIK') <div class="alert alert-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                        </div>
                                    
                                        <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="nama">Nama</label>
                                            <input type="text" onkeyup="this.value = this.value.toUpperCase()"
                                                class="form-control @error('nama') is-invalid @enderror" id="nama"
                                                placeholder="Nama Lengkap ASN" name="nama" value="{{ old('nama') }}">
                                            @error('nama') <div class="alert alert-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                        </div>

                                    <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="npwp" class="form-label">NPWP</label>
                                        <input type="text" class="form-control @error('npwp') is-invalid @enderror"
                                            id="npwp" placeholder="NPWP ASN" name="npwp" value="{{ old('npwp') }}">
                                        @error('npwp') <div class="alert alert-danger">{{ $message }} </div>
                                        @enderror
                                    </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                                <label for="pangkat_id">Pangkat</label>
                                                <select class="form-control @error('pangkat_id') is-invalid @enderror"
                                                    id="pangkat_id" name="pangkat_id"
                                                    value="{{ old('pangkat_id') }}">
                                                    <option selected disabled>- Pilih Pangkat-</option>
                                                    @foreach ($pangkat as $pangkat)
                                                        <option value="{{ $pangkat->id }}"
                                                            {{ old('pangkat_id') == $pangkat->id ? 'selected' : null }}>
                                                            {{ $pangkat->pangkat }}</option>
                                                    @endforeach
                                                </select>
                                                @error('pangkat_id') <div class="alert alert-danger">
                                                    {{ $message }} </div>@enderror
                                        </div>
                                        </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                                <label for="golongan_id">Golongan</label>
                                                <select class="form-control @error('golongan_id') is-invalid @enderror"
                                                    id="golongan_id" name="golongan_id" value="{{ old('golongan_id') }}">
                                                    <option selected disabled>- Pilih Golongan-</option>
                                                    @foreach ($golongan as $golongan)
                                                        <option value="{{ $golongan->id }}"
                                                            {{ old('golongan_id') == $golongan->id ? 'selected' : null }}>
                                                            {{ $golongan->golongan }}</option>
                                                    @endforeach
                                                </select>
                                                @error('golongan_id') <div class="alert alert-danger">
                                                    {{ $message }} </div>@enderror
                                        </div>
                                        </div>

                                            <div class="col-sm-6">
                                            <div class="form-group">
                                                    <label for="jabatan_id">Jabatan</label>
                                                    <select class="form-control @error('jabatan_id') is-invalid @enderror"
                                                        id="jabatan_id" name="jabatan_id" value="{{ old('jabatan_id') }}">
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

                                                {{-- <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="provinsi">Provinsi</label>
                                                        <select class="form-control @error('province_id') is-invalid @enderror"
                                                            id="provinsi" name="province_id" value="{{ old('province_id') }}">
                                                            <option selected disabled>- Pilih Provinsi-</option>
                                                            @foreach ($provinces as $provinsi)
                                                            <option value="{{ $provinsi->id }}"
                                                                {{ old('provinsi_id') == $provinsi->id ? 'selected' : null }}>
                                                                {{ $provinsi->name }}</option>
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

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="SK_Jabatan" class="form-label">SK Jabatan</label>
                                            <input type="date"
                                                class="form-control @error('SK_Jabatan') is-invalid @enderror" id="SK_Jabatan"
                                                placeholder="SK asn" name="SK_Jabatan" value="{{ old('SK_Jabatan') }}">
                                            @error('SK_Jabatan') <div class="alert alert-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email"
                                                class="form-control @error('email') is-invalid @enderror" id="email"
                                                placeholder="Email ASN" name="email" value="{{ old('email') }}">
                                            @error('email') <div class="alert alert-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="no_HP" class="form-label">Nomor Handphone</label>
                                            <input type="number"
                                                class="form-control @error('no_HP') is-invalid @enderror" id="no_HP"
                                                placeholder="Nomor HP ASN" name="no_HP" value="{{ old('no_HP') }}">
                                            @error('no_HP') <div class="alert alert-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="tempat_lahir">Tempat Lahir</label>
                                            <input type="text" onkeyup="this.value = this.value.toUpperCase()"
                                                class="form-control @error('tempat_lahir') is-invalid @enderror"
                                                id="tempat_lahir" placeholder="Tempat Lahir ASN" name="tempat_lahir"
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
                                                id="alamat" placeholder="Alamat Lengkap (Jl. KH.Noer Ali Kel. Jakasampurna Kec. Bekasi Barat Kota Bekasi Prov. Jawa Barat)" name="alamat"
                                                value="{{ old('alamat') }}">
                                            @error('alamat') <div class="alert alert-danger">{{ $message }}
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
                                                <label for="no_rek" class="form-label">Nomor Rekening BJB</label>
                                                <input type="number"
                                                    class="form-control @error('no_rek') is-invalid @enderror" id="no_rek"
                                                    placeholder="Nomor Rekening BJB " name="no_rek"
                                                    value="{{ old('no_rek') }}">
                                                @error('no_rek') <div class="alert alert-danger">{{ $message }} </div>
                                                @enderror
                                            </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="tipe_pns" class="form-label">Tipe ASN</label>
                                                    <select class="form-control @error('tipe_pns') is-invalid @enderror" id="tipe_pns" name="tipe_pns">
                                                        <option selected disabled>- Pilih Tipe ASN -</option>
                                                        <option value="Struktural">Struktural</option>
                                                        <option value="Pelaksana">Pelaksana</option>
                                                    </select>
                                                    @error('tipe_pns') <div class="alert alert-danger">{{ $message }} </div>
                                                    @enderror
                                                </div>
                                            </div>

                                        <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="foto" value="{{ old('foto') }}">Foto Profile</label>
                                            <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto">
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

<!--------------Modal View asn------------------------->
    <div class="modal fade" id="modal-viewasn">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Detail Data ASN </h4>
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

