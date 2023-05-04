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
            <!-- Cetak Data --> 
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">Cetak Data Laporan Harian Pamor</h3>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-body">
                        <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="startdatepamor">Pilih Tanggal:</label>
                                        <input type="date" class="form-control" 
                                        id="startdatepamor" name="startdatepamor">
                                    </div>
                                </div>

                                {{-- <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="enddatepamor">End Date:</label>
                                        <input type="date" class="form-control" 
                                        id="enddatepamor" name="enddatepamor">
                                    </div>
                                </div> --}}

                                {{-- <div class="col-sm-12">
                                    <div class="form-group">
                                        <a href="" onclick="this.href='/cetaklaporanbydate/'+ document.getElementById('startdatepamor').value
                                        + '/' + document.getElementById('enddatepamor').value " class="btn btn-danger col-md-12" target="_blank">
                                            <i class="fas fa-print"></i> Cetak Laporan Pamor
                                        </a>
                                    </div>
                                </div> --}}

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <a href="" onclick="this.href='/cetaklaporanbydate/'+ document.getElementById('startdatepamor').value  + '/' "
                                        class="btn btn-danger col-md-12" target="_blank">
                                            <i class="fas fa-print"></i> Cetak Laporan Pamor
                                        </a>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <a href="/laporanpamor" class="btn btn-primary col-md-12">
                                            <i class="fa fa-chevron-left"></i> Back
                                        </a>
                                    </div>
                                </div>
                        </div>  
                        </div>
                    </div>
                </div>									
            </div>										
            </section>
        </div>
        @include('master.csidebar')
        @include('master.footer')
        @include('master.script')
</body>
</html>

