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
            <!-- Button Tambah dan Restore Data -->    
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <a href="/deletetkk/" class="btn btn-danger" onclick="return confirm('yakin dihapus Permanent?')">
                                <i class="fa fa-trash"></i> Delete All</a>
                            <a href="/restoretkk/" class="btn btn-info">
                                <i class="fa fa-undo"></i> Restore All</a>
                            <a href="/tkk" class="btn btn-secondary">
                                <i class="fa fa-chevron-left"></i> Back</a>
                        </div>
                    </div>									               								
            <!-- Detail Data --> 
            <div class="row">
                @if (auth()->user()->role != "superadmin")
                <div class="col-lg-4 col-4">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3> {{$tkk->where('village_id', '=', auth()->user()->village_id)->count()}}</h3>
                            <p>Jumlah TKK</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-thin fa-user-plus"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-4">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3> {{$tkk->where('village_id', '=', auth()->user()->village_id)->where('jabatan_id', '=', '11')->count()}}</h3>
                            <p>Pamor</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-thin fa-user-plus"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-4">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3> {{$tkk->where('village_id', '=', auth()->user()->village_id)->count() - 
                            $tkk->where('village_id', '=', auth()->user()->village_id)->where('jabatan_id', '=', '11')->count()}}</h3>
                            <p>Non Pamor/Administrasi</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-thin fa-user-plus"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-3">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3> {{$tkk->where('village_id', '=', auth()->user()->village_id)->where('seksi_id', '=', '1')->count()}}</h3>
                            <p>Sekretariat</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-thin fa-user-plus"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-3">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3> {{$tkk->where('village_id', '=', auth()->user()->village_id)->where('seksi_id', '=', '2')->count()}}</h3>
                            <p>Kessos</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-thin fa-user-plus"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-3">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3> {{$tkk->where('village_id', '=', auth()->user()->village_id)->where('seksi_id', '=', '3')->count()}}</h3>
                            <p>Pem Trantibum</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-thin fa-user-plus"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-3">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3> {{$tkk->where('village_id', '=', auth()->user()->village_id)->where('seksi_id', '=', '4')->count()}}</h3>
                            <p>Permasbang</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-thin fa-user-plus"></i>
                        </div>
                    </div>
                </div>
                @else
                <div class="col-lg-4 col-4">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3> {{$tkk->count()}}</h3>
                            <p>Jumlah TKK</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-thin fa-user-plus"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-4">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3> {{$tkk->where('jabatan_id', '=', '11')->count()}}</h3>
                            <p>Pamor</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-thin fa-user-plus"></i>
                        </div>
                    </div>
                </div>	
                <div class="col-lg-4 col-4">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3> {{$tkk->count() - $tkk->where('jabatan_id', '=', '11')->count()}}</h3>
                            <p>Non Pamor/Administrasi</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-thin fa-user-plus"></i>
                        </div>
                    </div>
                </div>	
                <div class="col-lg-3 col-3">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3> {{$tkk->where('seksi_id', '=', '1')->count()}}</h3>
                            <p>Sekretariat</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-thin fa-user-plus"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-3">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3> {{$tkk->where('seksi_id', '=', '2')->count()}}</h3>
                            <p>Kessos</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-thin fa-user-plus"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-3">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3> {{$tkk->where('seksi_id', '=', '3')->count()}}</h3>
                            <p>Pem Trantibum</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-thin fa-user-plus"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-3">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3> {{$tkk->where('seksi_id', '=', '4')->count()}}</h3>
                            <p>Permasbang</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-thin fa-user-plus"></i>
                        </div>
                    </div>
                </div>
                @endif																													
            </div>		

            <!-- Main content / Tampilan Data -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Restore Data ASN</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="gettrashdatatkk" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">NIK</th>
                                <th scope="col">KK</th>
                                <th scope="col">Pamor RW</th>
                                <th scope="col">Kecamatan</th>
                                <th scope="col">Kelurahan</th>
                                <th scope="col">Restore</th>
                                <th scope="col">Delete</th>
                                <th scope="col">Tempat Lahir</th>
                                <th scope="col">Tanggal Lahir</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Agama</th>
                                <th scope="col">Pendidikan</th>
                                <th scope="col">Status Kawin</th>
                                <th scope="col">Divisi</th>
                                <th scope="col">Jabatan</th>
                                <th scope="col">SK TKK</th>
                                <th scope="col">No Rekening</th>
                                <th scope="col">NPWP</th>
                                <th scope="col">Email</th>
                                <th scope="col">No HP</th>
                                <th scope="col">Foto</th>
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

</body>
</html>

