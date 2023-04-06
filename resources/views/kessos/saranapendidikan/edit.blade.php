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
        <div class="row mb-2">
        </div>
      </div><!-- /.container-fluid -->
    </section>

 <!-- Main content -->
 <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Update Data Sarana Pendidikan</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="/saranapendidikan/{{ $saranapendidikan->id}}" method="post" enctype="multipart/form-data">
              @method('patch')
              @csrf
                    <div class="card-body">
                      <form>
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="form-group">
                                <img class="img-fluid" alt="Responsive image" src="{{ asset('images/SaranaPendidikan/'.$saranapendidikan->foto)}}"></img>
                            </div>
                        </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                            <label for="nama" class="form-label">Nama Sarana Pendidikan</label>
                            <input type="text" onkeyup="this.value = this.value.toUpperCase()" class="form-control @error('nama') is-invalid @enderror" 
                            id="nama" placeholder="Nama Sarana Pendidikan" name="nama" value="{{ $saranapendidikan->nama }}">
                            @error('nama') <div class="alert alert-danger">{{ $message }} </div>@enderror       
                    </div>
                    </div>

                    <div class="col-sm-6">
                    <div class="form-group">
                            <label for="nama_pimpinan" class="form-label">Nama Pimpinan Sarana Pendidikan</label>
                            <input type="text" onkeyup="this.value = this.value.toUpperCase()" class="form-control @error('nama_pimpinan') is-invalid @enderror" 
                            id="nama_pimpinan" placeholder="Nama Sarana Pendidikan" name="nama_pimpinan" value="{{ $saranapendidikan->nama_pimpinan }}">
                            @error('nama_pimpinan') <div class="alert alert-danger">{{ $message }} </div>@enderror       
                    </div>
                    </div>

                      {{-- <div class="col-sm-12">
                        <div class="form-group">
                            <label for="ktp_id" class="form-label">Nama/NIK Pimpinan Sarana Pendidikan</label>
                            <input class="form-control @error('ktp_id') is-invalid @enderror" placeholder="Ketik NIK/Nama, pilih NIK/Nama sesuai yang diinginkan" list="nik_warga" id="ktp_id" name="ktp_id" value="{{$saranapendidikan->ktp_id}}"> 
                                <datalist id="nik_warga" selected value="{{$saranapendidikan->ktp_id}}" >
                                @foreach ($ktp as $ktp)
                                    <option value="{{$ktp->id}}"> {{$ktp->nama}}</option>
                                @endforeach
                                </datalist>
                            @error ('ktp_id') <div class="alert alert-danger">{{ $message }} </div>@enderror 
                        </div>
                    </div> --}}

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="tipependidikan_id" class="form-label">Tipe</label>
                        <select class="form-control @error('tipependidikan_id') is-invalid @enderror" id="tipependidikan_id" name="tipependidikan_id" value="{{ $saranapendidikan->tipependidikan_id }}">
                            <option selected value="{{ $saranapendidikan->tipependidikan_id }}">{{ $saranapendidikan->tipependidikan->tipependidikan}}</option>
                            @foreach ($tipependidikan as $tipe)
                            <option value="{{$tipe->id}}">{{$tipe->tipependidikan}}</option>
                            @endforeach
                        </select>
                        @error ('tipependidikan_id') <div class="alert alert-danger">{{ $message }} </div>@enderror 
                    </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="statustanah_id" class="form-label">Status Tanah</label>
                        <select class="form-control @error('statustanah_id') is-invalid @enderror" id="statustanah_id" name="statustanah_id" value="{{ $saranapendidikan->statustanah_id }}">
                            <option selected value="{{ $saranapendidikan->statustanah_id }}">{{ $saranapendidikan->statustanah->statustanah}}</option>
                            @foreach ($statustanah as $tipe)
                            <option value="{{$tipe->id}}">{{$tipe->statustanah}}</option>
                            @endforeach
                        </select>
                        @error ('statustanah_id') <div class="alert alert-danger">{{ $message }} </div>@enderror 
                    </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                          <label for="no_HP" class="form-label">Nomor HP</label>
                          <input type="number"
                              class="form-control @error('no_HP') is-invalid @enderror" id="no_HP"
                              placeholder="No HP" name="no_HP" value="{{ $saranapendidikan->no_HP }}">
                          @error('no_HP') <div class="alert alert-danger">{{ $message }} </div>
                          @enderror
                      </div>
                      </div>

                    <div class="col-sm-6">
                    <div class="form-group">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" onkeyup="this.value = this.value.toUpperCase()" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Alamat Sarana Pendidikan" name="alamat" value="{{ $saranapendidikan->alamat }}"></input>
                        @error('alamat') <div class="alert alert-danger">{{ $message }} </div>@enderror       
                    </div>
                    </div>
                    
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="rt_id" class="form-label">RT</label>
                        <select class="form-control @error('rt_id') is-invalid @enderror" id="rt_id" name="rt_id" value="{{ $saranapendidikan->rt_id }}"> 
                            <option selected value="{{ $saranapendidikan->rt_id }}">{{ $saranapendidikan->rt->rt}}</option>
                            @foreach ($rt as $erte)
                            <option value="{{$erte->id}}" {{old('rt_id') == $erte->id ? 'selected' : null }}>{{$erte->rt}}</option>
                            @endforeach
                        </select>
                        @error ('rt_id') <div class="alert alert-danger">{{ $message }} </div>@enderror 
                    </div>
                    </div>
            
                    {{-- <div class="col-sm-6">
                    <div class="form-group">
                      <label for="rw_id" class="form-label">RW</label>
                        <select class="form-control @error('rw_id') is-invalid @enderror" id="rw_id" name="rw_id" value="{{ $saranapendidikan->rw_id  }}"> 
                          <option selected value="{{ $saranapendidikan->rw_id }}">{{ $saranapendidikan->rw->rw}}</option>
                          @foreach ($rw as $erwe)
                          <option value="{{$erwe->id}}" {{old('rw_id') == $erwe->id ? 'selected' : null }}>{{$erwe->rw}}</option>
                          @endforeach
                        </select>
                      @error ('rw_id') <div class="alert alert-danger">{{ $message }} </div>@enderror 
                  </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                    <label for="kecamatan">Kecamatan</label>
                    <select class="form-control @error('district_id') is-invalid @enderror" id="kecamatan" name="district_id" value="{{ $saranapendidikan->district_id }}">  
                      <option selected value="{{ $saranapendidikan->district_id }}">{{ $saranapendidikan->district->name}}</option>
                      @foreach ($districts as $kecamatan)
                      <option value="{{$kecamatan->id}}">{{$kecamatan->name}}</option>
                      @endforeach
                    </select>
                    @error ('district_id') <div class="alert alert-danger">{{ $message }} </div>@enderror 
                  </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                    <label for="desa">Desa/Kelurahan</label>
                    <select class="form-control @error('village_id') is-invalid @enderror" id="desa" name="village_id" value="{{ $saranapendidikan->village_id }}">  
                      <option selected value="{{ $saranapendidikan->village_id }}">{{ $saranapendidikan->village->name}}</option>
                      @foreach ($kelbekasi as $desa)
                      <option value="{{$desa->id}}">{{$desa->name}}</option>
                      @endforeach
                    </select>
                    @error ('village_id') <div class="alert alert-danger">{{ $message }} </div>@enderror 
                  </div>
                  </div> --}}

                  <div class="col-sm-6">
                    <div class="form-group">
                    <label for="foto">Foto</label>
                    <input type="file" class="form-control @error('foto') is-invalid @enderror"
                        id="foto" name="foto" value="{{ $saranapendidikan->foto }}">
                    @error('foto') <div class="alert alert-danger">{{ $message }} </div>
                    @enderror
                </div>
                </div>

                    <div class="col-sm-6">
                    <div class="form-group">
                        <a class="btn btn-default" href="/saranapendidikan" role="button">Close</a>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                    </div>
                </div>
            </form>
          </div>
          <!-- /.card -->
        </section>
        <!-- /.content -->
      </div>
          @include('master.csidebar')
          @include('master.footer')
          @include('master.script')
        </body>
      </html>