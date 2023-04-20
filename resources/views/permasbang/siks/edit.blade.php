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
                                    <h3 class="card-title">Update Data DTKS</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="/siks/{{ $siks->id }}" method="post">
                                    @method('patch')
                                    @csrf
                                    <div class="card-body">
                                    <form>
                                    <div class="row">
                                        {{-- <div class="col-sm-12">
                                        <div class="form-group">
                                            <h3 class="profile-username text-center">{{ $siks->ktp->nama }}</h3>
                                            <h3 class="profile-username text-center">{{ $siks->ktp->id }}</h3>
                                        </div>
                                        </div>

                                              <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="ktp_id" class="form-label">Nama/NIK DTKS</label>
                                                    <input class="form-control @error('ktp_id') is-invalid @enderror" 
                                                    placeholder="Ketik NIK/Nama, pilih NIK/Nama sesuai yang diinginkan" list="nik_warga" id="ktp_id" 
                                                    name="ktp_id" value="{{$siks->ktp_id}}"> 
                                                        <datalist id="nik_warga" selected value="{{$siks->ktp_id}}" >
                                                        @foreach ($ktp as $ktp)
                                                            <option value="{{$ktp->id}}"> {{$ktp->nama}}</option>
                                                        @endforeach
                                                        </datalist>
                                                    @error ('ktp_id') <div class="alert alert-danger">{{ $message }} </div>@enderror 
                                                </div>
                                            </div> --}}

                                            {{-- <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="statusdtks_id" class="form-label">Status DTKS</label>
                                                    <select class="form-control @error('statusdtks_id') is-invalid @enderror"
                                                        aria-label="Default select example" id="statusdtks_id" name="statusdtks_id"
                                                        value="{{ $siks->statusdtks_id }}">
                                                        <option selected value="{{ $siks->statusdtks_id }}">{{ $siks->statusdtks->statusdtks }}
                                                        </option>
                                                        @foreach ($statusdtks as $statusdtks)
                                                            <option value="{{ $statusdtks->id }}">{{ $statusdtks->statusdtks }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('statusdtks_id') <div class="alert alert-danger">{{ $message }} </div>
                                                    @enderror
                                                </div>
                                                </div> --}}

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                <label for="keterangan" class="form-label">Keterangan</label>
                                                <select class="form-control @error('keterangan') is-invalid @enderror" id="keterangan"
                                                name="keterangan" placeholder="Keterangan">
                                                <option selected value="{{ $siks->keterangan}}">
                                                    {{ $siks->keterangan }}</option>
                                                    <option value="KPM">Keluarga Penerima Manfaat</option>
                                                    <option value="Pindah">Pindah</option>
                                                    <option value="Meninggal">Meninggal</option>
                                                    <option value="Tidak Diketahui">Tidak Diketahui</option>
                                                    <option value="Non DTKS">Non DTKS</option>
                                                </select>
                                                @error('keterangan') <div class="alert alert-danger">{{ $message }} </div>
                                                @enderror
                                            </div>
                                            </div>

                                        {{-- <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="rt_id" class="form-label">RT</label>
                                            <select class="form-control @error('rt_id') is-invalid @enderror"
                                                aria-label="Default select example" id="rt_id" name="rt_id"
                                                value="{{ $siks->rt_id }}">
                                                <option selected value="{{ $siks->rt_id }}">{{ $siks->rt->rt }}
                                                </option>
                                                @foreach ($rt as $erte)
                                                    <option value="{{ $erte->id }}">{{ $erte->rt }}</option>
                                                @endforeach
                                            </select>
                                            @error('rt_id') <div class="alert alert-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                        </div> --}}

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <a class="btn btn-default" href="/siks" role="button">Close</a>
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
