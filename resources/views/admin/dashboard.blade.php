<!DOCTYPE html>
<html lang="en">

<head>
    @include('master.header')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('assets/dist/img/iconsippalur.png') }}" alt="AdminLTELogo"
                height="200" width="200">
        </div>

        @include('master.navbar')
        @include('master.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-3">
                            <h1 class="m-0">Dashboard</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">

                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="box box-primary">
                    <div class="row gutte">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="table-container ">
                                <div class="content">
                                    <div class="title m-b-md">
                                        <center>
                                            <img src="{{ asset('assets/dist/img/iconsippalur.png') }}" height="100px">
                                            <h2>Selamat Datang
                                                <br>{{ Auth::user()->name }} di Website
                                                <br>Sistem Informasi Pelaporan Pamor Kelurahan (SIP-PALUR)
                                            </h2>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <section class="content">
                    <div class="container-fluid">
                        <!-- Small boxes (Stat box) -->
                        <div class="row">
                            {{-- <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3>{{$tkk->where('village_id', '=', auth()->user()->village_id)->count()}}</h3>
                                        <p>Jumlah TKK</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-thin fa-user-plus"></i>
                                    </div>
                                    <a href="/tkk" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3> {{$asn->where('village_id', '=', auth()->user()->village_id)->count()}}</h3>
                                        <p>Jumlah ASN</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-thin fa-user-plus"></i>
                                    </div>
                                    <a href="/asn" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3>75<sup style="font-size: 20px">%</sup></h3>

                                        <p>Persentase PBB</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-stats-bars"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h3>75<sup style="font-size: 20px">%</sup></h3>

                                        <p>Persentase Vaksin</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-stats-bars"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-danger">
                                    <div class="inner">
                                        <h3>0<sup style="font-size: 20px">%</sup></h3>

                                        <p>Kasus Covid-19</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-stats-bars"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div> --}}
                            <!-- ./col -->
                        </div>
                        <!-- /.row -->
            </section>
            </section>
            <!-- /.content -->
        </div>


        @include('master.footer')
        @include('master.script')

</body>

</html>
