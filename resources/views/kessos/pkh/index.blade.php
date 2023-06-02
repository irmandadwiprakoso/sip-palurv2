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

            <!-- Chart Data --> 
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">Chart DTKS</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    </div>
                </div>
            <div class="card-body" >
                {!! $chart->container() !!}
            </div>
            </div>

            <!-- Filter Data --> 
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Filter Data DTKS</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body">
                                <div class="row">  
                                    @if (auth()->user()->role == "superadmin") 
                                        <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="filter-pkhkel" class="form-label">DTKS Kelurahan</label>
                                            <select class="form-control filter" id="filter-pkhkel" name="filter-pkhkel">
                                                <option value="">-- Pilih Kelurahan --</option>
                                                @foreach ($kelbekasi as $kelbekasi)
                                                    <option value="{{ $kelbekasi->id }}">{{ $kelbekasi->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        </div>
                                        @endif
                                        <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="filter-rwpkh" class="form-label">RW Kelurahan</label>
                                            <select class="form-control filter" id="filter-rwpkh" name="filter-rwpkh">
                                                <option value="">-- Pilih RW --</option>
                                                @foreach ($rw as $rwpkh)
                                                    <option value="{{ $rwpkh->id }}">{{ $rwpkh->rw }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        </div>

                                        <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="filter-rtpkh" class="form-label">RT Kelurahan</label>
                                            <select class="form-control filter" id="filter-rtpkh" name="filter-rtpkh">
                                                <option value="">-- Pilih RT --</option>
                                                @foreach ($rt as $rtpkh)
                                                    <option value="{{ $rtpkh->id }}">{{ $rtpkh->rt }}</option>
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
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">Detail Data DTKS</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="datapkh" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">NIK</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">PKH</th>
                                <th scope="col">BPNT</th>
                                <th scope="col">PBI</th>
                                <th scope="col">NON BANSOS</th>
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
        <script src="{{ $chart->cdn() }}"></script>
        {{ $chart->script() }}
<!--------------Modal Create------------------------->
<form action="/pkh" method="post" enctype="multipart/form-data">
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

                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="pkh" class="form-label">Status PKH</label>
                                                    <select class="form-control @error('pkh') is-invalid @enderror" id="pkh" name="pkh">
                                                        <option selected disabled>-- Pilih Status --</option>
                                                        <option value="PKH">PKH</option>
                                                        <option value="-">-</option>
                                                    </select>
                                                    @error('pkh') <div class="alert alert-danger">{{ $message }} </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="bpnt" class="form-label">Status BPNT</label>
                                                    <select class="form-control @error('bpnt') is-invalid @enderror" id="bpnt" name="bpnt">
                                                        <option selected disabled>-- Pilih Status --</option>
                                                        <option value="BPNT">BPNT</option>
                                                        <option value="-">-</option>
                                                    </select>
                                                    @error('bpnt') <div class="alert alert-danger">{{ $message }} </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="pbi" class="form-label">Status PBI</label>
                                                    <select class="form-control @error('pbi') is-invalid @enderror" id="pbi" name="pbi">
                                                        <option selected disabled>-- Pilih Status --</option>
                                                        <option value="PBI">PBI</option>
                                                        <option value="-">-</option>
                                                    </select>
                                                    @error('pbi') <div class="alert alert-danger">{{ $message }} </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="non_bansos" class="form-label">Status NON BANSOS</label>
                                                    <select class="form-control @error('non_bansos') is-invalid @enderror" id="non_bansos" name="non_bansos">
                                                        <option selected disabled>-- Pilih Status --</option>
                                                        <option value="NON BANSOS">NON BANSOS</option>
                                                        <option value="-">-</option>
                                                    </select>
                                                    @error('non_bansos') <div class="alert alert-danger">{{ $message }} </div>
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

