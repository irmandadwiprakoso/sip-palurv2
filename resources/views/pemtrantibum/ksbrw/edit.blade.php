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
                                    <h3 class="card-title">Update Data KSB RW</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="/ksbrw/{{ $ksbrw->id }}" method="post" enctype="multipart/form-data">
                                    @method('patch')
                                    @csrf
                                    <div class="card-body">
                                    <form>
                                    <div class="row">
                                        <div class="col-sm-12">
                                        <div class="form-group">
                                            <h3 class="profile-username text-center">{{ $ksbrw->ktp->nama }}</h3>
                                            <h3 class="profile-username text-center">{{ $ksbrw->ktp->id }}</h3>
                                        </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="id" class="form-label">Nama KSBRW</label>
                                                <input type="text" disabled readonly
                                                    class="form-control" id="nama" value="{{ $ksbrw->ktp->nama }}">
                                            </div>
                                        </div>
                      
                                            <div class="col-sm-4">
                                              <div class="form-group">
                                                  <label for="ktp_id" class="form-label">Nama/NIK KSBRW</label>
                                                  <input class="form-control @error('ktp_id') is-invalid @enderror" placeholder="Ketik NIK/Nama, pilih NIK/Nama sesuai yang diinginkan" list="nik_warga" id="ktp_id" name="ktp_id" value="{{$ksbrw->ktp_id}}"> 
                                                      <datalist id="nik_warga" selected value="{{$ksbrw->ktp_id}}" >
                                                      @foreach ($ktp as $ktp)
                                                          <option value="{{$ktp->id}}"> {{$ktp->nama}}</option>
                                                      @endforeach
                                                      </datalist>
                                                  @error ('ktp_id') <div class="alert alert-danger">{{ $message }} </div>@enderror 
                                              </div>
                                          </div>

                                        <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="jabatan_id" class="form-label">Jabatan</label>
                                            <select class="form-control @error('jabatan_id') is-invalid @enderror"
                                                aria-label="Default select example" id="jabatan_id" name="jabatan_id">
                                                <option selected value="{{ $ksbrw->jabatan_id }}">
                                                    {{ $ksbrw->jabatan->jabatan }}</option>
                                                @foreach ($jabatan as $jab)
                                                    <option value="{{ $jab->id }}">{{ $jab->jabatan }}</option>
                                                @endforeach
                                            </select>
                                            @error('jabatan_id') <div class="alert alert-danger">{{ $message }}
                                            </div>@enderror
                                        </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="id" class="form-label">RW</label>
                                                <input type="text" disabled readonly
                                                    class="form-control" id="nama" value="{{ $ksbrw->rw->rw }}">
                                            </div>
                                        </div>
    
                                            <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="district_id" class="form-label">Kecamatan</label>
                                                <input type="text" disabled readonly
                                                class="form-control" id="rw" value="{{ $ksbrw->district->name }}">
                                            </div>
                                            </div>
    
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="id" class="form-label">Kelurahan</label>
                                                    <input type="text" disabled readonly
                                                        class="form-control" id="nama" value="{{ $ksbrw->village->name }}">
                                                </div>
                                            </div>


                                        <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="no_sk" class="form-label">Nomor SK Camat</label>
                                            <input type="text" class="form-control @error('no_sk') is-invalid @enderror"
                                                id="no_sk" placeholder="No SK Lurah/Camat" name="no_sk"
                                                value="{{ $ksbrw->no_sk }}">
                                            @error('no_sk') <div class="alert alert-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                        </div>

                                        <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="tmt_mulai" class="form-label">Masa Bhakti : Mulai</label>
                                            <input type="date"
                                                class="form-control @error('tmt_mulai') is-invalid @enderror"
                                                id="tmt_mulai" placeholder="TMT" name="tmt_mulai"
                                                value="{{ $ksbrw->tmt_mulai }}">
                                            @error('tmt_mulai') <div class="alert alert-danger">{{ $message }}
                                            </div>@enderror
                                        </div>
                                        </div>

                                        <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="tmt_akhir" class="form-label">Masa Bhakti : Berakhir</label>
                                            <input type="date"
                                                class="form-control @error('tmt_akhir') is-invalid @enderror"
                                                id="tmt_akhir" placeholder="TMT" name="tmt_akhir"
                                                value="{{ $ksbrw->tmt_akhir }}">
                                            @error('tmt_akhir') <div class="alert alert-danger">{{ $message }}
                                            </div>@enderror
                                        </div>
                                        </div>

                                        <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="no_hp" class="form-label">Nomor HP</label>
                                            <input type="number"
                                                class="form-control @error('no_hp') is-invalid @enderror" id="no_hp"
                                                placeholder="No HP" name="no_hp" value="{{ $ksbrw->no_hp }}">
                                            @error('no_hp') <div class="alert alert-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                        </div>

                                        <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="no_rek" class="form-label">Nomor Rekening BJB</label>
                                            <input type="number"
                                                class="form-control @error('no_rek') is-invalid @enderror" id="no_rek"
                                                placeholder="Rekening BJB" name="no_rek"
                                                value="{{ $ksbrw->no_rek }}">
                                            @error('no_rek') <div class="alert alert-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                        </div>

                                        <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="npwp" class="form-label">NPWP</label>
                                            <input type="text" class="form-control @error('npwp') is-invalid @enderror"
                                                id="npwp" placeholder="NPWP" name="npwp" value="{{ $ksbrw->npwp }}">
                                            @error('npwp') <div class="alert alert-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                        </div>

                                        <div class="card-footer">
                                            <a class="btn btn-default" href="/ksbrw" role="button">Close</a>
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
