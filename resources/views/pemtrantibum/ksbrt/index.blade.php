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
                        <h3 class="card-title">Filter Data KSB RT</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body">
                                <div class="row">            
                                        <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="filter-ksbrtkel" class="form-label">KSB RT Kelurahan</label>
                                            <select class="form-control filter" id="filter-ksbrtkel" name="filter-ksbrtkel">
                                                <option value="">-- Pilih Kelurahan --</option>
                                                @foreach ($kelbekasi as $kelbekasi)
                                                    <option value="{{ $kelbekasi->id }}">{{ $kelbekasi->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        </div>

                                        <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="filter-rwksbrt" class="form-label">RW Kelurahan</label>
                                            <select class="form-control filter" id="filter-rwksbrt" name="filter-rwksbrt">
                                                <option value="">-- Pilih RW --</option>
                                                @foreach ($rw as $rwksbrt)
                                                    <option value="{{ $rwksbrt->id }}">{{ $rwksbrt->rw }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        </div>

                                        <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="filter-rtksbrt" class="form-label">RT Kelurahan</label>
                                            <select class="form-control filter" id="filter-rtksbrt" name="filter-rtksbrt">
                                                <option value="">-- Pilih RT --</option>
                                                @foreach ($rt as $rtksbrt)
                                                    <option value="{{ $rtksbrt->id }}">{{ $rtksbrt->rt }}</option>
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
                @if (auth()->user()->role == "pemtrantibum")
                <div class="col-lg-4 col-3">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3> {{$ksbrt
                            ->where('village_id', '=', auth()->user()->village_id)
                            ->where('jabatan_id', '=', '13')->count()}}</h3>
                            <p>Ketua RT</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-solid fa-user"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-3">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3> {{$ksbrt
                            ->where('village_id', '=', auth()->user()->village_id)
                            ->where('jabatan_id', '=', '14')->count()}}</h3>
                            <p>Sekretaris RT</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-solid fa-user"></i>
                        </div>
                    </div>
                </div>	

                <div class="col-lg-4 col-3">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3> {{$ksbrt
                            ->where('village_id', '=', auth()->user()->village_id)
                            ->where('jabatan_id', '=', '15')->count()}}</h3>
                            <p>Bendahara RT</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-solid fa-user"></i>
                        </div>
                    </div>
                </div>

                @elseif (auth()->user()->role == "superadmin")
                <div class="col-lg-4 col-3">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3> {{$ksbrt
                            ->where('jabatan_id', '=', '13')->count()}}</h3>
                            <p>Ketua RT</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-solid fa-user"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-3">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3> {{$ksbrt
                            ->where('jabatan_id', '=', '14')->count()}}</h3>
                            <p>Sekretaris RT</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-solid fa-user"></i>
                        </div>
                    </div>
                </div>	

                <div class="col-lg-4 col-3">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3> {{$ksbrt
                            ->where('jabatan_id', '=', '15')->count()}}</h3>
                            <p>Bendahara RT</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-solid fa-user"></i>
                        </div>
                    </div>
                </div>

                @elseif (auth()->user()->role == "user")
                <div class="col-lg-4 col-3">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3> {{$ksbrt
                            ->where('village_id', '=', auth()->user()->village_id)
                            ->where('rw_id', '=', auth()->user()->rw_id)
                            ->where('jabatan_id', '=', '13')->count()}}</h3>
                            <p>Ketua RT</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-solid fa-user"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-3">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3> {{$ksbrt
                            ->where('village_id', '=', auth()->user()->village_id)
                            ->where('rw_id', '=', auth()->user()->rw_id)
                            ->where('jabatan_id', '=', '14')->count()}}</h3>
                            <p>Sekretaris RT</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-solid fa-user"></i>
                        </div>
                    </div>
                </div>	

                <div class="col-lg-4 col-3">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3> {{$ksbrt
                            ->where('village_id', '=', auth()->user()->village_id)
                            ->where('rw_id', '=', auth()->user()->rw_id)
                            ->where('jabatan_id', '=', '15')->count()}}</h3>
                            <p>Bendahara RT</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-solid fa-user"></i>
                        </div>
                    </div>
                </div>
            @endif
            </div>  							
            <!-- Main content / Tampilan Data -->
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Data KSB RT</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="dataksbrt" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">NIK</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Jabatan</th>
                                    <th scope="col">RT</th>
                                    <th scope="col">RW</th>
                                    <th scope="col">Kelurahan</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Detail</th>
                                    <th scope="col">Delete</th>
                                    <th scope="col">No SK</th>
                                    <th scope="col">TMT Mulai</th>
                                    <th scope="col">TMT Akhir</th>
                                    <th scope="col">NPWP</th>
                                    <th scope="col">No Rekening</th>
                                    <th scope="col">No Handphone</th>
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

<!--------------Modal Create KSB RT------------------------->
<form action="/ksbrt" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Data KSB RT </h4>
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
                                                    <label for="ktp_id" class="form-label">NIK Warga</label>
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
                                                <label for="no_sk" class="form-label">Nomor SK KSBRT</label>
                                                <input type="text" class="form-control @error('no_sk') is-invalid @enderror"
                                                    id="no_sk" placeholder="Nomor SK " name="no_sk" value="{{ old('no_sk') }}">
                                                @error('no_sk') <div class="alert alert-danger">{{ $message }} </div>
                                                @enderror
                                            </div>
                                            </div>

                                            <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="tmt_mulai" class="form-label">TMT Mulai</label>
                                                <input type="date"
                                                    class="form-control @error('tmt_mulai') is-invalid @enderror" id="tmt_mulai"
                                                    placeholder="SK TKK" name="tmt_mulai" value="{{ old('tmt_mulai') }}">
                                                @error('tmt_mulai') <div class="alert alert-danger">{{ $message }} </div>
                                                @enderror
                                            </div>
                                            </div>

                                            <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="tmt_akhir" class="form-label">TMT Akhir</label>
                                                <input type="date"
                                                    class="form-control @error('tmt_akhir') is-invalid @enderror" id="tmt_akhir"
                                                    placeholder="SK TKK" name="tmt_akhir" value="{{ old('tmt_akhir') }}">
                                                @error('tmt_akhir') <div class="alert alert-danger">{{ $message }} </div>
                                                @enderror
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
                                                <label for="no_hp" class="form-label">Nomor Handphone</label>
                                                <input type="number"
                                                    class="form-control @error('no_hp') is-invalid @enderror" id="no_hp"
                                                    placeholder="Nomor hp " name="no_hp" value="{{ old('no_hp') }}">
                                                @error('no_hp') <div class="alert alert-danger">{{ $message }} </div>
                                                @enderror
                                            </div>
                                            </div>
                                        
                                            <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="npwp" class="form-label">NPWP</label>
                                                <input type="text" class="form-control @error('npwp') is-invalid @enderror"
                                                    id="npwp" placeholder="NPWP " name="npwp" value="{{ old('npwp') }}">
                                                @error('npwp') <div class="alert alert-danger">{{ $message }} </div>
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

                                            {{-- <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="rw_id" class="form-label">RT</label>
                                                <select class="form-control @error('rw_id') is-invalid @enderror" id="rw_id"
                                                    name="rw_id" value="{{ old('rw_id') }}">
                                                    <option selected disabled>- Pilih RT-</option>
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

<!--------------Modal View KSB RT------------------------->
    <div class="modal fade" id="modal-view">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Detail Data KSBRT </h4>
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

