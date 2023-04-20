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
                                    <h3 class="card-title">My Profile</h3>
                                </div>
                                <!-- /.card-header -->

                                <!-- form start -->
                                <div class="card-body">
                                    <form>
                                    <div class="row">

                                    <img class="profile-user-img img-responsive img-circle-center"
                                    src="{{ asset('images/TKK/' . auth()->user()->tkk->foto) }}">
                                    </img>
                                  
                                    <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input type="text" disabled readonly
                                            class="form-control" id="nama" value="{{ auth()->user()->tkk->nama }}">
                                    </div>
                                    </div>
                                    
                                    <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="id" class="form-label">NIK</label>
                                        <input type="text" disabled readonly
                                            class="form-control" id="nama" value="{{ auth()->user()->tkk->id }}">
                                    </div>
                                    </div>
                                    
                                    <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="KK" class="form-label">KK</label>
                                        <input type="text" disabled readonly
                                            class="form-control" id="nama" value="{{ auth()->user()->tkk->KK }}">
                                    </div>
                                    </div>
                                    
                                    <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                        <input type="text" disabled readonly
                                            class="form-control" id="nama" value="{{ auth()->user()->tkk->tempat_lahir }}">
                                    </div>
                                    </div>
                                    
                                    <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                        <input type="text" disabled readonly
                                            class="form-control" id="nama" value="{{ auth()->user()->tkk->tanggal_lahir }}">
                                    </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="agama_id" class="form-label">Agama</label>
                                            <input type="text" disabled readonly
                                                class="form-control" id="nama" value="{{ auth()->user()->tkk->agama->agama }}">
                                        </div>
                                        </div>
                                        
                                            <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="jeniskelamin_id" class="form-label">Jenis Kelamin</label>
                                                <input type="text" disabled readonly
                                                class="form-control" id="nama" value="{{ auth()->user()->tkk->jeniskelamin->jeniskelamin }}">
                                            </div>
                                            </div>

                                    <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="alamat" class="form-label">Alamat</label>
                                        <input type="text" disabled readonly
                                            class="form-control" id="nama" value="{{ auth()->user()->tkk->alamat }}">
                                    </div>
                                    </div>
                                    

                                    
                                    <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="pendidikan_id" class="form-label">Pendidikan</label>
                                        <input type="text" disabled readonly
                                            class="form-control" id="nama" value="{{ auth()->user()->tkk->pendidikan->pendidikan }}">
                                    </div>
                                    </div>
                                    
                                    <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="statuskawin_id" class="form-label">Status Kawin</label>
                                        <input type="text" disabled readonly
                                            class="form-control" id="nama" value="{{ auth()->user()->tkk->statuskawin->statuskawin }}">
                                    </div>
                                    </div>
                                    
                                    <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="seksi_id" class="form-label">Seksi</label>
                                        <input type="text" disabled readonly
                                            class="form-control" id="nama" value="{{ auth()->user()->tkk->seksi->seksi }}">
                                    </div>
                                    </div>
                                    
                                    <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="jabatan_id" class="form-label">Jabatan</label>
                                        <input type="text" disabled readonly
                                            class="form-control" id="nama" value="{{ auth()->user()->tkk->jabatan->jabatan }}">
                                    </div>
                                    </div>
                                    
                                    <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="SK_Tkk" class="form-label">SK Pengangkatan TKK</label>
                                        <input type="text" disabled readonly
                                            class="form-control" id="nama" value="{{ auth()->user()->tkk->SK_Tkk }}">
                                    </div>
                                    </div>
                                    
                                    <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="no_rek" class="form-label">Nomor Rekening BJB</label>
                                        <input type="text" disabled readonly
                                            class="form-control" id="nama" value="{{ auth()->user()->tkk->no_rek }}">
                                    </div>
                                    </div>
                                    
                                    <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="npwp" class="form-label">NPWP</label>
                                        <input type="text" disabled readonly
                                            class="form-control" id="nama" value="{{ auth()->user()->tkk->npwp }}">
                                    </div>
                                    </div>
                                    
                                    <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" disabled readonly
                                            class="form-control" id="nama" value="{{ auth()->user()->tkk->email }}">
                                    </div>
                                    </div>
                                    
                                    <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="no_HP" class="form-label">Nomor Handphone</label>
                                        <input type="text" disabled readonly
                                            class="form-control" id="nama" value="{{ auth()->user()->tkk->no_HP }}">
                                    </div>
                                    </div>
                                    
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="rw_id" class="form-label">Pamor RW</label>
                                            <input type="text" disabled readonly
                                                class="form-control" id="nama" value="{{ auth()->user()->tkk->rw->rw }}">
                                        </div>
                                        </div>
                                    
                                        <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="district_id" class="form-label">Kecamatan</label>
                                            <input type="text" disabled readonly
                                            class="form-control" id="nama" value="{{ auth()->user()->tkk->district->name }}">
                                        </div>
                                        </div>
                                    
                                        <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="village_id" class="form-label">Desa/Kelurahan</label>
                                            <input type="text" disabled readonly
                                            class="form-control" id="nama" value="{{ auth()->user()->tkk->village->name }}">
                                        </div>
                                        </div>
       
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <a href="/dashboard" class="btn btn-default">Close</a>
                                                <a href="/password/reset" class="btn btn-success">Reset Password</a>
                                            </div>
                                        </div>

                                </div>
                            </form>
                        </div>
        </section>
        <!-- /.content -->
    </div>
        @include('master.csidebar')
        @include('master.footer')
        @include('master.script')
</body>

</html>
