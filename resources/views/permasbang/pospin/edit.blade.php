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
                                    <h3 class="card-title">Update Data POSPIN</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="/pospin/{{ $pospin->id }}" method="post" enctype="multipart/form-data">
                                    @method('patch')
                                    @csrf
                                    <div class="card-body">
                                    <form>
                                    <div class="row">
                                        <div class="col-sm-12">
                                        <div class="form-group">
                                            <h3 class="profile-username text-center">{{ $pospin->ktp->nama }}</h3>
                                            <h3 class="profile-username text-center">{{ $pospin->ktp->id }}</h3>
                                        </div>
                                        </div>

                                              <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="ktp_id" class="form-label">Nama/NIK Bayi</label>
                                                    <input class="form-control @error('ktp_id') is-invalid @enderror" 
                                                    placeholder="Ketik NIK/Nama, pilih NIK/Nama sesuai yang diinginkan" list="nik_warga" id="ktp_id" 
                                                    name="ktp_id" value="{{$pospin->ktp_id}}"> 
                                                        <datalist id="nik_warga" selected value="{{$pospin->ktp_id}}" >
                                                        @foreach ($ktp as $ktp)
                                                            <option value="{{$ktp->id}}"> {{$ktp->nama}}</option>
                                                        @endforeach
                                                        </datalist>
                                                    @error ('ktp_id') <div class="alert alert-danger">{{ $message }} </div>@enderror 
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="saranakesehatan_id" class="form-label">Posyandu</label>
                                                    <select class="form-control @error('saranakesehatan_id') is-invalid @enderror"
                                                        aria-label="Default select example" id="saranakesehatan_id" name="saranakesehatan_id"
                                                        value="{{ $pospin->saranakesehatan_id }}">
                                                        <option selected value="{{ $pospin->saranakesehatan_id }}">
                                                            {{ $pospin->saranakesehatan->nama}}</option>
                                                        @foreach ($saranakesehatan as $posyandu)
                                                            <option value="{{ $posyandu->id }}">{{ $posyandu->nama }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('saranakesehatan_id') <div class="alert alert-danger">{{ $message }} </div>
                                                    @enderror
                                                </div>
                                                </div>   

                                            <div class="col-sm-6">
                                                <div class="form-group"> 
                                                    <label for="pin_1" class="text-danger">PIN 1</label>
                                                        <select class="form-control @error('pin_1') is-invalid @enderror"
                                                            id="pin_1" placeholder="pin_1" name="pin_1">
                                                            <option selected value="{{ $pospin->pin_1 }}">
                                                                {{ $pospin->pin_1 }}</option>
                                                                <option value="Sudah">Sudah</option>
                                                                <option value="Belum">Belum</option>
                                                        </select>
                                                        @error('pin_1') <div class="alert alert-danger">{{ $message }}
                                                        </div>@enderror
                                                    </div>
                                                </div>    

                                            <div class="col-sm-6">
                                                <div class="form-group"> 
                                                    <label for="pin_2" class="text-danger">PIN 2</label>
                                                        <select class="form-control @error('pin_2') is-invalid @enderror"
                                                            id="pin_2" placeholder="pin_2" name="pin_2">
                                                            <option selected value="{{ $pospin->pin_2 }}">
                                                                {{ $pospin->pin_2 }}</option>
                                                                <option value="Sudah">Sudah</option>
                                                                <option value="Belum">Belum</option>
                                                        </select>
                                                        @error('pin_2') <div class="alert alert-danger">{{ $message }}
                                                        </div>@enderror
                                                    </div>
                                                </div>    

     

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <a class="btn btn-default" href="/pospin" role="button">Close</a>
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
