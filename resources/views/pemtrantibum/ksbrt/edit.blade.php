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
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Update Data KSB RT</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="/ksbrt/{{ $ksbrt->id }}" method="post" enctype="multipart/form-data">
                                    @method('patch')
                                    @csrf
                                    <div class="card-body">
                                    <form>
                                    <div class="row">
                                        <div class="col-sm-12">
                                        <div class="form-group">
                                            <h3 class="profile-username text-center">{{ $ksbrt->ktp->nama }}</h3>
                                            <h3 class="profile-username text-center">{{ $ksbrt->ktp->id }}</h3>
                                        </div>
                                        </div>
                        
                                            <div class="col-sm-6">
                                              <div class="form-group">
                                                  <label for="id" class="form-label">Nama KSBRT</label>
                                                  <input type="text" disabled readonly
                                                      class="form-control" id="nama" value="{{ $ksbrt->ktp->nama }}">
                                              </div>
                                              </div>
                        
                                              <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="ktp_id" class="form-label">Nama/NIK KSBRT</label>
                                                    <input class="form-control @error('ktp_id') is-invalid @enderror" placeholder="Ketik NIK/Nama, pilih NIK/Nama sesuai yang diinginkan" list="nik_warga" id="ktp_id" name="ktp_id" value="{{$ksbrt->ktp_id}}"> 
                                                        <datalist id="nik_warga" selected value="{{$ksbrt->ktp_id}}" >
                                                        @foreach ($ktp as $ktp)
                                                            <option value="{{$ktp->id}}"> {{$ktp->nama}}</option>
                                                        @endforeach
                                                        </datalist>
                                                    @error ('ktp_id') <div class="alert alert-danger">{{ $message }} </div>@enderror 
                                                </div>
                                            </div>

                                        <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="jabatan_id" class="form-label">Jabatan</label>
                                            <select class="form-control @error('jabatan_id') is-invalid @enderror"
                                                aria-label="Default select example" id="jabatan_id" name="jabatan_id">
                                                <option selected value="{{ $ksbrt->jabatan_id }}">
                                                    {{ $ksbrt->jabatan->jabatan }}</option>
                                                @foreach ($jabatan as $jab)
                                                    <option value="{{ $jab->id }}">{{ $jab->jabatan }}</option>
                                                @endforeach
                                            </select>
                                            @error('jabatan_id') <div class="alert alert-danger">{{ $message }}
                                            </div>@enderror
                                        </div>
                                        </div>

                                        <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="rt_id" class="form-label">RT</label>
                                            <select class="form-control @error('rt_id') is-invalid @enderror"
                                                aria-label="Default select example" id="rt_id" name="rt_id"
                                                value="{{ $ksbrt->rt_id }}">
                                                <option selected value="{{ $ksbrt->rt_id }}">{{ $ksbrt->rt->rt }}
                                                </option>
                                                @foreach ($rt as $erte)
                                                    <option value="{{ $erte->id }}">{{ $erte->rt }}</option>
                                                @endforeach
                                            </select>
                                            @error('rt_id') <div class="alert alert-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                        </div>

                                        {{-- <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="rw_id" class="form-label">RW</label>
                                            <select class="form-control @error('rw_id') is-invalid @enderror"
                                                aria-label="Default select example" id="rw_id" name="rw_id"
                                                value="{{ $ksbrt->rw_id }}">
                                                <option selected value="{{ $ksbrt->rw_id }}">{{ $ksbrt->rw->rw }}
                                                </option>
                                                @foreach ($rw as $erwe)
                                                    <option value="{{ $erwe->id }}">{{ $erwe->rw }}</option>
                                                @endforeach
                                            </select>
                                            @error('rw_id') <div class="alert alert-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="Provinsi" class="form-label">Provinsi</label>
                                                <input type="text" disabled readonly
                                                    class="form-control" id="rw" value="{{ $ksbrt->province->name }}">
                                            </div>
                                            </div>
            
                                                <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="Kotakab" class="form-label">Kota/Kab</label>
                                                    <input type="text" disabled readonly
                                                        class="form-control" id="rw" value="{{ $ksbrt->regency->name }}">
                                                </div>
                                                </div>
    
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="district_id" class="form-label">Kecamatan</label>
                                                        <select class="form-control @error('district_id') is-invalid @enderror"
                                                            id="district_id" name="district_id"
                                                            value="{{ $ksbrt->district_id }}">
                                                            <option selected value="{{ $ksbrt->district_id }}">{{ $ksbrt->district->name }}
                                                            </option>
                                                            @foreach ($districts as $district)
                                                                <option value="{{ $district->id }}">{{ $district->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('district_id') <div class="alert alert-danger">{{ $message }} </div>
                                                        @enderror
                                                    </div>
                                                    </div>
    
                                            <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="village_id" class="form-label">Desa/Kelurahan</label>
                                                <select class="form-control @error('village_id') is-invalid @enderror"
                                                    id="village_id" name="village_id"
                                                    value="{{ $ksbrt->village_id }}">
                                                    <option selected value="{{ $ksbrt->village_id }}">{{ $ksbrt->village->name }}
                                                    </option>
                                                    @foreach ($kelbekasi as $kelbekasi)
                                                    <option value="{{ $kelbekasi->id }}">{{ $kelbekasi->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('village_id') <div class="alert alert-danger">{{ $message }} </div>
                                                @enderror
                                            </div>
                                            </div> --}}


                                        <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="no_sk" class="form-label">Nomor SK Lurah</label>
                                            <input type="text" class="form-control @error('no_sk') is-invalid @enderror"
                                                id="no_sk" placeholder="No SK Lurah/Camat" name="no_sk"
                                                value="{{ $ksbrt->no_sk }}">
                                            @error('no_sk') <div class="alert alert-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                        </div>

                                        <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="tmt_mulai" class="form-label">Masa Bhakti : Mulai</label>
                                            <input type="date"
                                                class="form-control @error('tmt_mulai') is-invalid @enderror"
                                                id="tmt_mulai" placeholder="TMT" name="tmt_mulai"
                                                value="{{ $ksbrt->tmt_mulai }}">
                                            @error('tmt_mulai') <div class="alert alert-danger">{{ $message }}
                                            </div>@enderror
                                        </div>
                                        </div>

                                        <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="tmt_akhir" class="form-label">Masa Bhakti : Berakhir</label>
                                            <input type="date"
                                                class="form-control @error('tmt_akhir') is-invalid @enderror"
                                                id="tmt_akhir" placeholder="TMT" name="tmt_akhir"
                                                value="{{ $ksbrt->tmt_akhir }}">
                                            @error('tmt_akhir') <div class="alert alert-danger">{{ $message }}
                                            </div>@enderror
                                        </div>
                                        </div>

                                        <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="no_hp" class="form-label">Nomor HP</label>
                                            <input type="number"
                                                class="form-control @error('no_hp') is-invalid @enderror" id="no_hp"
                                                placeholder="No HP" name="no_hp" value="{{ $ksbrt->no_hp }}">
                                            @error('no_hp') <div class="alert alert-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                        </div>

                                        <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="no_rek" class="form-label">Nomor Rekening BJB</label>
                                            <input type="number"
                                                class="form-control @error('no_rek') is-invalid @enderror" id="no_rek"
                                                placeholder="Rekening BJB" name="no_rek"
                                                value="{{ $ksbrt->no_rek }}">
                                            @error('no_rek') <div class="alert alert-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                        </div>

                                        <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="npwp" class="form-label">NPWP</label>
                                            <input type="text" class="form-control @error('npwp') is-invalid @enderror"
                                                id="npwp" placeholder="NPWP" name="npwp" value="{{ $ksbrt->npwp }}">
                                            @error('npwp') <div class="alert alert-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                        </div>

                                        <div class="card-footer">
                                            <a class="btn btn-default" href="/ksbrt" role="button">Close</a>
                                            <button type="submit" class="btn btn-success">Update</button>
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
