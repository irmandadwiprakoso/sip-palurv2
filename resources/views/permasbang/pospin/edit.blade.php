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
                                            <h3 class="profile-username text-center">{{ $pospin->nama }}</h3>
                                            <h3 class="profile-username text-center">{{ $pospin->NIK }}</h3>
                                        </div>
                                        </div>

                                              {{-- <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="ktp_id" class="form-label">Nama/id Bayi</label>
                                                    <input class="form-control @error('ktp_id') is-invalid @enderror" 
                                                    placeholder="Ketik id/Nama, pilih id/Nama sesuai yang diinginkan" list="nik_warga" id="ktp_id" 
                                                    name="ktp_id" value="{{$pospin->ktp_id}}"> 
                                                        <datalist id="nik_warga" selected value="{{$pospin->ktp_id}}" >
                                                        @foreach ($ktp as $ktp)
                                                            <option value="{{$ktp->id}}"> {{$ktp->nama}}</option>
                                                        @endforeach
                                                        </datalist>
                                                    @error ('ktp_id') <div class="alert alert-danger">{{ $message }} </div>@enderror 
                                                </div>
                                            </div> --}}

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="NIK" class="form-label">NIK Bayi</label>
                                                    <input type="number" class="form-control @error('NIK') is-invalid @enderror"
                                                        id="NIK" placeholder="NIK Bayi" name="NIK"
                                                        value="{{ $pospin->NIK }}">
                                                    @error('NIK') <div class="alert alert-danger">{{ $message }} </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="nama" class="form-label">Nama Bayi</label>
                                                    <input type="nama" class="form-control @error('nama') is-invalid @enderror"
                                                        id="nama" placeholder="nama Bayi" name="nama"
                                                        value="{{ $pospin->nama }}">
                                                    @error('nama') <div class="alert alert-danger">{{ $message }} </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                                                    <input type="date"
                                                        class="form-control @error('tgl_lahir') is-invalid @enderror"
                                                        id="tgl_lahir" placeholder="Tanggal Lahir" name="tgl_lahir"
                                                        value="{{ $pospin->tgl_lahir }}">
                                                    @error('tgl_lahir') <div class="alert alert-danger">{{ $message }}
                                                    </div>@enderror
                                                </div>
                                                </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="nama_ortu" class="form-label">Nama Orang Tua</label>
                                                    <input type="text" onkeyup="this.value = this.value.toUpperCase()" class="form-control @error('nama_ortu') is-invalid @enderror"
                                                        id="nama_ortu" placeholder="Ibu/Bapak" name="nama_ortu"
                                                        value="{{ $pospin->nama_ortu }}">
                                                    @error('nama_ortu') <div class="alert alert-danger">{{ $message }} </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="jeniskelamin_id" class="form-label">Jenis Kelamin</label>
                                                    <select class="form-control @error('jeniskelamin_id') is-invalid @enderror"
                                                        aria-label="Default select example" id="jeniskelamin_id" name="jeniskelamin_id"
                                                        value="{{ $pospin->jeniskelamin_id }}">
                                                        <option selected value="{{ $pospin->jeniskelamin_id }}">
                                                            {{ $pospin->jeniskelamin->jeniskelamin}}</option>
                                                        @foreach ($jeniskelamin as $jeniskelamin)
                                                            <option value="{{ $jeniskelamin->id }}">{{ $jeniskelamin->jeniskelamin }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('jeniskelamin_id') <div class="alert alert-danger">{{ $message }} </div>
                                                    @enderror
                                                </div>
                                                </div>   

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="namaposyandu_id" class="form-label">Posyandu</label>
                                                    <select class="form-control @error('namaposyandu_id') is-invalid @enderror"
                                                        aria-label="Default select example" id="namaposyandu_id" name="namaposyandu_id"
                                                        value="{{ $pospin->namaposyandu_id }}">
                                                        <option selected value="{{ $pospin->namaposyandu_id }}">
                                                            {{ $pospin->namaposyandu->nama}}</option>
                                                        @foreach ($namaposyandu as $posyandu)
                                                            <option value="{{ $posyandu->id }}">{{ $posyandu->nama }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('namaposyandu_id') <div class="alert alert-danger">{{ $message }} </div>
                                                    @enderror
                                                </div>
                                                </div>   

                                            <div class="col-sm-3">
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

                                            <div class="col-sm-3">
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
