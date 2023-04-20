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
                                    <h3 class="card-title">Update Data DTKS</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="/pkh/{{ $pkh->id }}" method="post">
                                    @method('patch')
                                    @csrf
                                    <div class="card-body">
                                    <form>
                                    <div class="row">
                                        <div class="col-sm-12">
                                        <div class="form-group">
                                            <h3 class="profile-username text-center">{{ $pkh->ktp->nama }}</h3>
                                            <h3 class="profile-username text-center">{{ $pkh->ktp->id }}</h3>
                                        </div>
                                        </div>

                                              <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="ktp_id" class="form-label">Nama/NIK DTKS</label>
                                                    <input class="form-control @error('ktp_id') is-invalid @enderror" 
                                                    placeholder="Ketik NIK/Nama, pilih NIK/Nama sesuai yang diinginkan" list="nik_warga" id="ktp_id" 
                                                    name="ktp_id" value="{{$pkh->ktp_id}}"> 
                                                        <datalist id="nik_warga" selected value="{{$pkh->ktp_id}}" >
                                                        @foreach ($ktp as $ktp)
                                                            <option value="{{$ktp->id}}"> {{$ktp->nama}}</option>
                                                        @endforeach
                                                        </datalist>
                                                    @error ('ktp_id') <div class="alert alert-danger">{{ $message }} </div>@enderror 
                                                </div>
                                            </div>

                                            {{-- <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="statusdtks_id" class="form-label">Status DTKS</label>
                                                    <select class="form-control @error('statusdtks_id') is-invalid @enderror"
                                                        aria-label="Default select example" id="statusdtks_id" name="statusdtks_id"
                                                        value="{{ $pkh->statusdtks_id }}">
                                                        <option selected value="{{ $pkh->statusdtks_id }}">{{ $pkh->statusdtks->statusdtks }}
                                                        </option>
                                                        @foreach ($statusdtks as $statusdtks)
                                                            <option value="{{ $statusdtks->id }}">{{ $statusdtks->statusdtks }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('statusdtks_id') <div class="alert alert-danger">{{ $message }} </div>
                                                    @enderror
                                                </div>
                                                </div> --}}

                                            <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="pkh" class="form-label">Status PKH</label>
                                                <select class="form-control @error('pkh') is-invalid @enderror" id="pkh"
                                                name="pkh" placeholder="Keterangan">
                                                <option selected value="{{ $pkh->pkh}}">
                                                    {{ $pkh->pkh }}</option>
                                                    <option value="PKH">PKH</option>
                                                    <option value="-">-</option>
                                                </select>
                                                @error('pkh') <div class="alert alert-danger">{{ $message }} </div>
                                                @enderror
                                            </div>
                                            </div>
                                            <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="bpnt" class="form-label">Status BPNT</label>
                                                <select class="form-control @error('bpnt') is-invalid @enderror" id="bpnt"
                                                name="bpnt" placeholder="Keterangan">
                                                <option selected value="{{ $pkh->bpnt}}">
                                                    {{ $pkh->bpnt }}</option>
                                                    <option value="BPNT">BPNT</option>
                                                    <option value="-">-</option>
                                                </select>
                                                @error('bpnt') <div class="alert alert-danger">{{ $message }} </div>
                                                @enderror
                                            </div>
                                            </div>
                                            <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="pbi" class="form-label">Status PBI</label>
                                                <select class="form-control @error('pbi') is-invalid @enderror" id="pbi"
                                                name="pbi" placeholder="Keterangan">
                                                <option selected value="{{ $pkh->pbi}}">
                                                    {{ $pkh->pbi }}</option>
                                                    <option value="PBI">PBI</option>
                                                    <option value="-">-</option>
                                                </select>
                                                @error('pbi') <div class="alert alert-danger">{{ $message }} </div>
                                                @enderror
                                            </div>
                                            </div>
                                            <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="non_bansos" class="form-label">Status NON BANSOS</label>
                                                <select class="form-control @error('non_bansos') is-invalid @enderror" id="non_bansos"
                                                name="non_bansos" placeholder="Keterangan">
                                                <option selected value="{{ $pkh->non_bansos}}">
                                                    {{ $pkh->non_bansos }}</option>
                                                    <option value="NON BANSOS">NON BANSOS</option>
                                                    <option value="-">-</option>
                                                </select>
                                                @error('non_bansos') <div class="alert alert-danger">{{ $message }} </div>
                                                @enderror
                                            </div>
                                            </div>
                                            
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                <label for="keterangan" class="form-label">Keterangan</label>
                                                <select class="form-control @error('keterangan') is-invalid @enderror" id="keterangan"
                                                name="keterangan" placeholder="Keterangan">
                                                <option selected value="{{ $pkh->keterangan}}">
                                                    {{ $pkh->keterangan }}</option>
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

                                        <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="rt_id" class="form-label">RT</label>
                                            <select class="form-control @error('rt_id') is-invalid @enderror"
                                                aria-label="Default select example" id="rt_id" name="rt_id"
                                                value="{{ $pkh->rt_id }}">
                                                <option selected value="{{ $pkh->rt_id }}">{{ $pkh->rt->rt }}
                                                </option>
                                                @foreach ($rt as $erte)
                                                    <option value="{{ $erte->id }}">{{ $erte->rt }}</option>
                                                @endforeach
                                            </select>
                                            @error('rt_id') <div class="alert alert-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                        </div>

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <a class="btn btn-default" href="/pkh" role="button">Close</a>
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
