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
                            <div class="card card-danger">
                                <div class="card-header">
                                    <h3 class="card-title">Update Data Kader Posyandu</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="/posyandu/{{ $posyandu->id }}" method="post" enctype="multipart/form-data">
                                    @method('patch')
                                    @csrf
                                    <div class="card-body">
                                    <form>
                                    <div class="row">
                                        <div class="col-sm-12">
                                        <div class="form-group">
                                            <h3 class="profile-username text-center">{{ $posyandu->ktp->nama }}</h3>
                                            <h3 class="profile-username text-center">{{ $posyandu->ktp->id }}</h3>
                                        </div>
                                        </div>
                                            <div class="col-sm-12">
                                              <div class="form-group">
                                                  <label for="id" class="form-label">Nama Kader Kader Posyandu</label>
                                                  <input type="text" disabled readonly
                                                      class="form-control" id="nama" value="{{ $posyandu->ktp->nama }}">
                                              </div>
                                              </div>
                                              <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="ktp_id" class="form-label">Nama/NIK Kader Kader Posyandu</label>
                                                    <input class="form-control @error('ktp_id') is-invalid @enderror" placeholder="Ketik NIK/Nama, pilih NIK/Nama sesuai yang diinginkan" list="nik_warga" id="ktp_id" name="ktp_id" value="{{$posyandu->ktp_id}}"> 
                                                        <datalist id="nik_warga" selected value="{{$posyandu->ktp_id}}" >
                                                        @foreach ($ktp as $ktp)
                                                            <option value="{{$ktp->id}}"> {{$ktp->nama}}</option>
                                                        @endforeach
                                                        </datalist>
                                                    @error ('ktp_id') <div class="alert alert-danger">{{ $message }} </div>@enderror 
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="jabatan_id" class="form-label">Jabatan</label>
                                                    <select class="form-control @error('jabatan_id') is-invalid @enderror"
                                                        aria-label="Default select example" id="jabatan_id" name="jabatan_id">
                                                        <option selected value="{{ $posyandu->jabatan_id }}">
                                                            {{ $posyandu->jabatan->jabatan }}</option>
                                                        @foreach ($jabatan as $jab)
                                                            <option value="{{ $jab->id }}">{{ $jab->jabatan }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('jabatan_id') <div class="alert alert-danger">{{ $message }}
                                                    </div>@enderror
                                                </div>
                                                </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="no_SK" class="form-label">Nomor SK Kader Posyandu</label>
                                                    <input type="text" class="form-control @error('no_SK') is-invalid @enderror"
                                                        id="no_SK" placeholder="No SK Lurah/Camat" name="no_SK"
                                                        value="{{ $posyandu->no_SK }}">
                                                    @error('no_SK') <div class="alert alert-danger">{{ $message }} </div>
                                                    @enderror
                                                </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="namaposyandu_id" class="form-label">Kader Posyandu</label>
                                                        <select class="form-control @error('namaposyandu_id') is-invalid @enderror"
                                                            aria-label="Default select example" id="namaposyandu_id" name="namaposyandu_id"
                                                            value="{{ $posyandu->namaposyandu_id }}">
                                                            <option selected value="{{ $posyandu->namaposyandu_id }}">
                                                                {{ $posyandu->namaposyandu->nama}}</option>
                                                            @foreach ($namaposyandu as $posyandu)
                                                                <option value="{{ $posyandu->id }}">{{ $posyandu->nama }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('namaposyandu_id') <div class="alert alert-danger">{{ $message }} </div>
                                                        @enderror
                                                    </div>
                                                    </div>

                                            
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <a class="btn btn-default" href="/posyandu" role="button">Close</a>
                                                    <button type="submit" class="btn btn-success">Update</button>
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
