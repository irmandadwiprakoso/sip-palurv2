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
            <!-- DetailData -->           
                    <div class="row">
                        @if (auth()->user()->role == "superadmin")
                        <div class="col-lg-3 col-xs-6">
                            <div class="small-box bg-danger">
                              <div class="inner">
                                <p>Jumlah Sarana Pendidikan</p>
                                <h3> {{ $saranapendidikan->count() }}</h3>
                              </div>
                              <div class="icon">
                                  <i class="fas fa-solid fa-school"></i>
                              </div>
                            </div>
                          </div>

                        <div class="col-lg-3 col-xs-6">
                          <div class="small-box bg-danger">
                            <div class="inner">
                              <p>PAUD</p>
                              <h3> {{ $saranapendidikan->where('tipependidikan_id', '=', '1')->count() }}</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-solid fa-school"></i>
                            </div>
                          </div>
                        </div>
                       
                        <div class="col-lg-3 col-xs-6">
                          <div class="small-box bg-danger">
                            <div class="inner">
                              <p>TK</p>
                              <h3> {{ $saranapendidikan->where('tipependidikan_id', '=', '2')->count() }}</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-solid fa-school"></i>
                            </div>
                          </div>
                        </div>
                
                        <div class="col-lg-3 col-xs-6">
                          <div class="small-box bg-danger">
                            <div class="inner">
                              <p>SD</p>
                              <h3> {{ $saranapendidikan->where('tipependidikan_id', '=', '3')->count() }}</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-solid fa-school"></i>
                            </div>
                          </div>
                        </div>
                
                        <div class="col-lg-3 col-xs-6">
                          <div class="small-box bg-danger">
                            <div class="inner">
                              <p>SMP</p>
                              <h3> {{ $saranapendidikan->where('tipependidikan_id', '=', '4')->count() }}</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-solid fa-school"></i>
                            </div>
                          </div>
                        </div>
                
                       
                        <div class="col-lg-3 col-xs-6">
                          <div class="small-box bg-danger">
                            <div class="inner">
                              <p>SMA</p>
                              <h3> {{ $saranapendidikan->where('tipependidikan_id', '=', '5')->count() }}</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-solid fa-school"></i>
                            </div>
                          </div>
                        </div>
                        
                        <div class="col-lg-3 col-xs-6">
                          <div class="small-box bg-danger">
                            <div class="inner">
                              <p>SMK</p>
                              <h3> {{ $saranapendidikan->where('tipependidikan_id', '=', '6')->count() }}</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-solid fa-school"></i>
                            </div>
                          </div>
                        </div>
                     
                        <div class="col-lg-3 col-xs-6">
                          <div class="small-box bg-danger">
                            <div class="inner">
                              <p>MI</p>
                              <h3> {{ $saranapendidikan->where('tipependidikan_id', '=', '7')->count() }}</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-solid fa-school"></i>
                            </div>
                          </div>
                        </div>
                       
                        <div class="col-lg-3 col-xs-6">
                          <div class="small-box bg-danger">
                            <div class="inner">
                              <p>MTs</p>
                              <h3> {{ $saranapendidikan->where('tipependidikan_id', '=', '8')->count() }}</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-solid fa-school"></i>
                            </div>
                          </div>
                        </div>
                       
                        <div class="col-lg-3 col-xs-6">
                          <div class="small-box bg-danger">
                            <div class="inner">
                              <p>MA</p>
                              <h3> {{ $saranapendidikan->where('tipependidikan_id', '=', '9')->count() }}</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-solid fa-school"></i>
                            </div>
                          </div>
                        </div>
                
                        <div class="col-lg-3 col-xs-6">
                          <div class="small-box bg-danger">
                            <div class="inner">
                              <p>Universitas/Sekolah Tinggi</p>
                              <h3> {{ $saranapendidikan->where('tipependidikan_id', '=', '10')->count() }}</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-solid fa-school"></i>
                            </div>
                          </div>
                        </div>

                        @elseif (auth()->user()->role == "kessos" || auth()->user()->role == "struktural")
                        <div class="col-lg-3 col-xs-6">
                            <div class="small-box bg-danger">
                              <div class="inner">
                                <p>Jumlah Sarana Pendidikan</p>
                                <h3> {{ $saranapendidikan->where('village_id', '=', auth()->user()->village_id)->count() }}</h3>
                              </div>
                              <div class="icon">
                                  <i class="fas fa-solid fa-school"></i>
                              </div>
                            </div>
                          </div>

                        <div class="col-lg-3 col-xs-6">
                          <div class="small-box bg-danger">
                            <div class="inner">
                              <p>PAUD</p>
                              <h3> {{ $saranapendidikan->where('village_id', '=', auth()->user()->village_id)->where('tipependidikan_id', '=', '1')->count() }}</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-solid fa-school"></i>
                            </div>
                          </div>
                        </div>
                       
                        <div class="col-lg-3 col-xs-6">
                          <div class="small-box bg-danger">
                            <div class="inner">
                              <p>TK</p>
                              <h3> {{ $saranapendidikan->where('village_id', '=', auth()->user()->village_id)->where('tipependidikan_id', '=', '2')->count() }}</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-solid fa-school"></i>
                            </div>
                          </div>
                        </div>
                
                        <div class="col-lg-3 col-xs-6">
                          <div class="small-box bg-danger">
                            <div class="inner">
                              <p>SD</p>
                              <h3> {{ $saranapendidikan->where('village_id', '=', auth()->user()->village_id)->where('tipependidikan_id', '=', '3')->count() }}</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-solid fa-school"></i>
                            </div>
                          </div>
                        </div>
                
                        <div class="col-lg-3 col-xs-6">
                          <div class="small-box bg-danger">
                            <div class="inner">
                              <p>SMP</p>
                              <h3> {{ $saranapendidikan->where('village_id', '=', auth()->user()->village_id)->where('tipependidikan_id', '=', '4')->count() }}</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-solid fa-school"></i>
                            </div>
                          </div>
                        </div>
                   
                        <div class="col-lg-3 col-xs-6">
                          <div class="small-box bg-danger">
                            <div class="inner">
                              <p>SMA</p>
                              <h3> {{ $saranapendidikan->where('village_id', '=', auth()->user()->village_id)->where('tipependidikan_id', '=', '5')->count() }}</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-solid fa-school"></i>
                            </div>
                          </div>
                        </div>
                        
                        <div class="col-lg-3 col-xs-6">
                          <div class="small-box bg-danger">
                            <div class="inner">
                              <p>SMK</p>
                              <h3> {{ $saranapendidikan->where('village_id', '=', auth()->user()->village_id)->where('tipependidikan_id', '=', '6')->count() }}</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-solid fa-school"></i>
                            </div>
                          </div>
                        </div>
                     
                        <div class="col-lg-3 col-xs-6">
                          <div class="small-box bg-danger">
                            <div class="inner">
                              <p>MI</p>
                              <h3> {{ $saranapendidikan->where('village_id', '=', auth()->user()->village_id)->where('tipependidikan_id', '=', '7')->count() }}</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-solid fa-school"></i>
                            </div>
                          </div>
                        </div>
                       
                        <div class="col-lg-3 col-xs-6">
                          <div class="small-box bg-danger">
                            <div class="inner">
                              <p>MTs</p>
                              <h3> {{ $saranapendidikan->where('village_id', '=', auth()->user()->village_id)->where('tipependidikan_id', '=', '8')->count() }}</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-solid fa-school"></i>
                            </div>
                          </div>
                        </div>
                       
                        <div class="col-lg-3 col-xs-6">
                          <div class="small-box bg-danger">
                            <div class="inner">
                              <p>MA</p>
                              <h3> {{ $saranapendidikan->where('village_id', '=', auth()->user()->village_id)->where('tipependidikan_id', '=', '9')->count() }}</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-solid fa-school"></i>
                            </div>
                          </div>
                        </div>
                
                        <div class="col-lg-3 col-xs-6">
                          <div class="small-box bg-danger">
                            <div class="inner">
                              <p>Universitas/Sekolah Tinggi</p>
                              <h3> {{ $saranapendidikan->where('village_id', '=', auth()->user()->village_id)->where('tipependidikan_id', '=', '10')->count() }}</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-solid fa-school"></i>
                            </div>
                          </div>
                        </div>

                        @elseif (auth()->user()->role == "user")
                        <div class="col-lg-3 col-xs-6">
                            <div class="small-box bg-danger">
                              <div class="inner">
                                <p>Jumlah Sarana Pendidikan</p>
                                <h3> {{ $saranapendidikan->where('village_id', '=', auth()->user()->village_id)->where('rw_id', '=', auth()->user()->rw_id)->count() }}</h3>
                              </div>
                              <div class="icon">
                                  <i class="fas fa-solid fa-school"></i>
                              </div>
                            </div>
                          </div>
                          
                        <div class="col-lg-3 col-xs-6">
                          <div class="small-box bg-danger">
                            <div class="inner">
                              <p>PAUD</p>
                              <h3> {{ $saranapendidikan->where('village_id', '=', auth()->user()->village_id)->where('rw_id', '=', auth()->user()->rw_id)->where('tipependidikan_id', '=', '1')->count() }}</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-solid fa-school"></i>
                            </div>
                          </div>
                        </div>
                       
                        <div class="col-lg-3 col-xs-6">
                          <div class="small-box bg-danger">
                            <div class="inner">
                              <p>TK</p>
                              <h3> {{ $saranapendidikan->where('village_id', '=', auth()->user()->village_id)->where('rw_id', '=', auth()->user()->rw_id)->where('tipependidikan_id', '=', '2')->count() }}</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-solid fa-school"></i>
                            </div>
                          </div>
                        </div>
                
                        <div class="col-lg-3 col-xs-6">
                          <div class="small-box bg-danger">
                            <div class="inner">
                              <p>SD</p>
                              <h3> {{ $saranapendidikan->where('village_id', '=', auth()->user()->village_id)->where('rw_id', '=', auth()->user()->rw_id)->where('tipependidikan_id', '=', '3')->count() }}</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-solid fa-school"></i>
                            </div>
                          </div>
                        </div>
                
                        <div class="col-lg-3 col-xs-6">
                          <div class="small-box bg-danger">
                            <div class="inner">
                              <p>SMP</p>
                              <h3> {{ $saranapendidikan->where('village_id', '=', auth()->user()->village_id)->where('rw_id', '=', auth()->user()->rw_id)->where('tipependidikan_id', '=', '4')->count() }}</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-solid fa-school"></i>
                            </div>
                          </div>
                        </div>
                
                       
                        <div class="col-lg-3 col-xs-6">
                          <div class="small-box bg-danger">
                            <div class="inner">
                              <p>SMA</p>
                              <h3> {{ $saranapendidikan->where('village_id', '=', auth()->user()->village_id)->where('rw_id', '=', auth()->user()->rw_id)->where('tipependidikan_id', '=', '5')->count() }}</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-solid fa-school"></i>
                            </div>
                          </div>
                        </div>
                        
                        <div class="col-lg-3 col-xs-6">
                          <div class="small-box bg-danger">
                            <div class="inner">
                              <p>SMK</p>
                              <h3> {{ $saranapendidikan->where('village_id', '=', auth()->user()->village_id)->where('rw_id', '=', auth()->user()->rw_id)->where('tipependidikan_id', '=', '6')->count() }}</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-solid fa-school"></i>
                            </div>
                          </div>
                        </div>
                     
                        <div class="col-lg-3 col-xs-6">
                          <div class="small-box bg-danger">
                            <div class="inner">
                              <p>MI</p>
                              <h3> {{ $saranapendidikan->where('village_id', '=', auth()->user()->village_id)->where('rw_id', '=', auth()->user()->rw_id)->where('tipependidikan_id', '=', '7')->count() }}</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-solid fa-school"></i>
                            </div>
                          </div>
                        </div>
                       
                        <div class="col-lg-3 col-xs-6">
                          <div class="small-box bg-danger">
                            <div class="inner">
                              <p>MTs</p>
                              <h3> {{ $saranapendidikan->where('village_id', '=', auth()->user()->village_id)->where('rw_id', '=', auth()->user()->rw_id)->where('tipependidikan_id', '=', '8')->count() }}</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-solid fa-school"></i>
                            </div>
                          </div>
                        </div>
                       
                        <div class="col-lg-3 col-xs-6">
                          <div class="small-box bg-danger">
                            <div class="inner">
                              <p>MA</p>
                              <h3> {{ $saranapendidikan->where('village_id', '=', auth()->user()->village_id)->where('rw_id', '=', auth()->user()->rw_id)->where('tipependidikan_id', '=', '9')->count() }}</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-solid fa-school"></i>
                            </div>
                          </div>
                        </div>
                
                        <div class="col-lg-3 col-xs-6">
                          <div class="small-box bg-danger">
                            <div class="inner">
                              <p>Universitas/Sekolah Tinggi</p>
                              <h3> {{ $saranapendidikan->where('village_id', '=', auth()->user()->village_id)->where('rw_id', '=', auth()->user()->rw_id)->where('tipependidikan_id', '=', '10')->count() }}</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-solid fa-school"></i>
                            </div>
                          </div>
                        </div>
                        @endif
                    </div>

                <!-- Filter Data --> 
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Filter Data Sarana Pendidikan</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body">
                                <div class="row">            
                                        <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="filter-saranapendidikankel" class="form-label">Kelurahan</label>
                                            <select class="form-control filter" id="filter-saranapendidikankel" name="filter-saranapendidikankel">
                                                <option value="">-- Pilih Kelurahan --</option>
                                                @foreach ($kelbekasi as $kelbekasi)
                                                    <option value="{{ $kelbekasi->id }}">{{ $kelbekasi->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="filter-rwsaranapendidikan" class="form-label">RW</label>
                                                <select class="form-control filter" id="filter-rwsaranapendidikan" name="filter-rwsaranapendidikan">
                                                    <option value="">-- Pilih RW --</option>
                                                    @foreach ($rw as $erwe)
                                                        <option value="{{ $erwe->id }}">{{ $erwe->rw }}</option>
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
                                    <h3 class="card-title">Data Sarana Pendidikan</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="datasaranapendidikan" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Tipe Sarana Pendidikan</th>
                                                <th scope="col">Status Tanah</th>
                                                <th scope="col">Nama Pimpinan</th>
                                                <th scope="col">Alamat</th>
                                                <th scope="col">RT</th>
                                                <th scope="col">RW</th>
                                                <th scope="col">Kecamatan</th>
                                                <th scope="col">Kelurahan</th>
                                                <th scope="col">Kontak PIC</th>
                                                <th scope="col">Foto</th>
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

<!--------------Modal Create SaranaPendidikan------------------------->
<form action="/saranapendidikan" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Data Sarana Pendidikan</h4>
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
                                                <label for="nama">Nama Sarana Pendidikan</label>
                                                <input type="text" onkeyup="this.value = this.value.toUpperCase()"
                                                    class="form-control @error('nama') is-invalid @enderror"
                                                    id="nama" placeholder="Nama Sarana Pendidikan" name="nama"
                                                    value="{{ old('nama') }}">
                                                @error('nama') <div class="alert alert-danger">{{ $message }}
                                                </div>@enderror
                                            </div>
                                            </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                                <label for="nama_pimpinan">Nama Pimpinan Sarana Pendidikan</label>
                                                <input type="text" onkeyup="this.value = this.value.toUpperCase()"
                                                    class="form-control @error('nama_pimpinan') is-invalid @enderror"
                                                    id="nama_pimpinan" placeholder="Nama Pimpinan Sarana Pendidikan" name="nama_pimpinan"
                                                    value="{{ old('nama_pimpinan') }}">
                                                @error('nama') <div class="alert alert-danger">{{ $message }}
                                                </div>@enderror
                                            </div>
                                            </div>
{{-- 
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="ktp_id" class="form-label">Nama/NIK Pimpinan Sarana Pendidikan</label>
                                            <input class="form-control @error('ktp_id') is-invalid @enderror" placeholder="Ketik NIK/Nama, pilih NIK/Nama sesuai yang diinginkan" list="nik_warga" id="ktp_id" name="ktp_id" value="{{ old('ktp_id') }}"> 
                                                <datalist id="nik_warga">
                                                @foreach ($ktp as $ktp)
                                                    <option value="{{$ktp->id}}"> {{$ktp->nama}}</option>
                                                    <!-- <option value="{{$ktp->id}}" {{old('ktp_id') == $ktp->id ? 'selected' : null }}>{{$ktp->NIK}}</option> -->
                                                @endforeach
                                                </datalist>
                                            @error ('ktp_id') <div class="alert alert-danger">{{ $message }} </div>@enderror 
                                        </div>
                                    </div> --}}

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                                <label for="statustanah_id">Status Tanah</label>
                                                <select class="form-control @error('statustanah_id') is-invalid @enderror"
                                                    id="statustanah_id" name="statustanah_id"
                                                    value="{{ old('statustanah_id') }}">
                                                    <option selected disabled>- Pilih Status Tanah-</option>
                                                    @foreach ($statustanah as $statustanah)
                                                        <option value="{{ $statustanah->id }}"
                                                            {{ old('statustanah_id') == $statustanah->id ? 'selected' : null }}>
                                                            {{ $statustanah->statustanah }}</option>
                                                    @endforeach
                                                </select>
                                                @error('statustanah_id') <div class="alert alert-danger">
                                                    {{ $message }} </div>@enderror
                                            </div>
                                            </div>
    
                                        <div class="col-sm-6">
                                        <div class="form-group">
                                                <label for="tipependidikan_id">Tipe Sarana Pendidikan</label>
                                                <select class="form-control @error('tipependidikan_id') is-invalid @enderror"
                                                    id="tipependidikan_id" name="tipependidikan_id"
                                                    value="{{ old('tipependidikan_id') }}">
                                                    <option selected disabled>- Pilih Tipe Sarana Pendidikan-</option>
                                                    @foreach ($tipependidikan as $tipependidikan)
                                                        <option value="{{ $tipependidikan->id }}"
                                                            {{ old('tipependidikan_id') == $tipependidikan->id ? 'selected' : null }}>
                                                            {{ $tipependidikan->tipependidikan }}</option>
                                                    @endforeach
                                                </select>
                                                @error('tipependidikan_id') <div class="alert alert-danger">
                                                    {{ $message }} </div>@enderror
                                            </div>
                                            </div>

                                    <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="no_HP" class="form-label">Kontak PIC</label>
                                        <input type="number"
                                            class="form-control @error('no_HP') is-invalid @enderror" id="no_HP"
                                            placeholder="Kontak PIC" name="no_HP" value="{{ old('no_HP') }}">
                                        @error('no_HP') <div class="alert alert-danger">{{ $message }} </div>
                                        @enderror
                                        </div>
                                        </div>

                                    <div class="col-sm-6">
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

                                    {{-- <div class="col-sm-6">
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
                                   
                                    <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="foto" value="{{ old('foto') }}">Foto Sarana Pendidikan</label>
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

<!--------------Modal View Sarana Pendidikan------------------------->
    <div class="modal fade" id="modal-view">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Detail Data Sarana Pendidikan </h4>
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

