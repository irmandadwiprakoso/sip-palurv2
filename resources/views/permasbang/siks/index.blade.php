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

            <!-- Filter Data --> 
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Filter Data DTKS</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body">
                                <div class="row">  
                                        <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="filter-sikskel" class="form-label">DTKS Kelurahan</label>
                                            <select class="form-control filter" id="filter-sikskel" name="filter-sikskel">
                                                <option value="">-- Pilih Kelurahan --</option>
                                                @foreach ($kelbekasi as $kelbekasi)
                                                    <option value="{{ $kelbekasi->id }}">{{ $kelbekasi->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        </div>

                                        <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="filter-rwsiks" class="form-label">RW Kelurahan</label>
                                            <select class="form-control filter" id="filter-rwsiks" name="filter-rwsiks">
                                                <option value="">-- Pilih RW --</option>
                                                @foreach ($rw as $rwsiks)
                                                    <option value="{{ $rwsiks->id }}">{{ $rwsiks->rw }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        </div>

                                        <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="filter-rtsiks" class="form-label">RT Kelurahan</label>
                                            <select class="form-control filter" id="filter-rtsiks" name="filter-rtsiks">
                                                <option value="">-- Pilih RT --</option>
                                                @foreach ($rt as $rtsiks)
                                                    <option value="{{ $rtsiks->id }}">{{ $rtsiks->rt }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>									
                </div>									

                <!-- Main content / Tampilan Data -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Detail Data DTKS</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="datasiks" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">NIK</th>
                                <th scope="col">Nama</th>
                                <th scope="col">DTKS</th>
                                <th scope="col">KETERANGAN</th>
                                <th scope="col">RT</th>
                                <th scope="col">RW</th>
                                <th scope="col">Kecamatan</th>
                                <th scope="col">Kelurahan</th>
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

        @include('master.csidebar')
        @include('master.footer')
        @include('master.script')

<!--------------Modal Create------------------------->
<form action="/siks" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Data DTKS </h4>
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
                                                    <label for="ktp_id" class="form-label">NIK/Nama DTKS</label>
                                                    <input class="form-control @error('ktp_id') is-invalid @enderror" 
                                                    placeholder="Ketik NIK/Nama, lalu pilih NIK/Nama sesuai yang diinginkan" list="nik_warga" id="ktp_id" name="ktp_id" value="{{ old('ktp_id') }}"> 
                                                        <datalist id="nik_warga">
                                                        @foreach ($ktp as $ktp)
                                                            <option value="{{$ktp->id}}"> {{$ktp->nama}}</option>
                                                            <!-- <option value="{{$ktp->id}}" {{old('ktp_id') == $ktp->id ? 'selected' : null }}>{{$ktp->NIK}}</option> -->
                                                        @endforeach
                                                        </datalist>
                                                    @error ('ktp_id') <div class="alert alert-danger">{{ $message }} </div>@enderror 
                                                </div>
                                            </div>

                                            {{-- <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="" class="form-label">Status DTKS</label>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="bpnt" value="BPNT" name="bpnt">
                                                        <label class="form-check-label" for="bpnt">BPNT</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="pbi" value="PBI" name="pbi">
                                                        <label class="form-check-label" for="pbi">PBI</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="pkh" value="PKH" name="pkh">
                                                        <label class="form-check-label" for="pkh">PKH</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="non_bansos" value="NON BANSOS" name="non_bansos">
                                                        <label class="form-check-label" for="non_bansos">NON BANSOS</label>
                                                    </div>
                                                </div>
                                            </div> --}}

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                        <label for="statusdtks_id" class="form-label">DTKS</label>
                                                        <select class="form-control @error('statusdtks_id') is-invalid @enderror" id="statusdtks_id"
                                                            name="statusdtks_id" value="{{ old('statusdtks_id') }}">
                                                            <option selected disabled>- Pilih DTKS-</option>
                                                            @foreach ($statusdtks as $statusdtks)
                                                                <option value="{{ $statusdtks->id }}"
                                                                    {{ old('statusdtks_id') == $statusdtks->id ? 'selected' : null }}>
                                                                    {{ $statusdtks->statusdtks }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('statusdtks_id') <div class="alert alert-danger">{{ $message }} </div>
                                                        @enderror
                                                    </div>
                                                    </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                <label for="keterangan" class="form-label">Keterangan</label>
                                                <select class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan">
                                                    <option selected disabled>-- Pilih Keterangan --</option>
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

<!--------------Modal View DTKS------------------------->
    <div class="modal fade" id="modal-view">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Detail Data DTKS </h4>
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

