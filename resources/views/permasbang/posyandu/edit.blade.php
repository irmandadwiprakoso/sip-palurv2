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
                                    <h3 class="card-title">Update Data Posyandu</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="/posyandu/{{ $posyandu->id }}" method="post" enctype="multipart/form-data">
                                    @method('patch')
                                    @csrf
                                    <div class="card-body">
                                    <form>
                                    <div class="row">
                                        <div class="col-sm-12">
                                        <div class="form-group">
                                            <h3 class="profile-username text-center">{{ $posyandu->ktp->nama }}</h3>
                                            <h3 class="profile-username text-center">{{ $posyandu->ktp->id }}</h3>
                                        </div>
                                        </div>
                                            <div class="col-sm-12">
                                              <div class="form-group">
                                                  <label for="id" class="form-label">Nama Kader Posyandu</label>
                                                  <input type="text" disabled readonly
                                                      class="form-control" id="nama" value="{{ $posyandu->ktp->nama }}">
                                              </div>
                                              </div>
                                              <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="ktp_id" class="form-label">Nama/NIK Kader Posyandu</label>
                                                    <input class="form-control @error('ktp_id') is-invalid @enderror" placeholder="Ketik NIK/Nama, pilih NIK/Nama sesuai yang diinginkan" list="nik_warga" id="ktp_id" name="ktp_id" value="{{$posyandu->ktp_id}}"> 
                                                        <datalist id="nik_warga" selected value="{{$posyandu->ktp_id}}" >
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
                                                        <option selected value="{{ $posyandu->jabatan_id }}">
                                                            {{ $posyandu->jabatan->jabatan }}</option>
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
                                                    <label for="no_SK" class="form-label">Nomor SK Posyandu</label>
                                                    <input type="text" class="form-control @error('no_SK') is-invalid @enderror"
                                                        id="no_SK" placeholder="No SK Lurah/Camat" name="no_SK"
                                                        value="{{ $posyandu->no_SK }}">
                                                    @error('no_SK') <div class="alert alert-danger">{{ $message }} </div>
                                                    @enderror
                                                </div>
                                                </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="nama_posyandu" class="form-label">Nama Posyandu</label>
                                                    <input type="text" onkeyup="this.value = this.value.toUpperCase()" class="form-control @error('nama_posyandu') is-invalid @enderror"
                                                        id="nama_posyandu" placeholder="Nama Posyandu" name="nama_posyandu"
                                                        value="{{ $posyandu->nama_posyandu }}">
                                                    @error('nama_posyandu') <div class="alert alert-danger">{{ $message }} </div>
                                                    @enderror
                                                </div>
                                                </div>

                                        {{-- <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="rt_id" class="form-label">RT</label>
                                            <select class="form-control @error('rt_id') is-invalid @enderror"
                                                aria-label="Default select example" id="rt_id" name="rt_id"
                                                value="{{ $posyandu->rt_id }}">
                                                <option selected value="{{ $posyandu->rt_id }}">{{ $posyandu->rt->rt }}
                                                </option>
                                                @foreach ($rt as $erte)
                                                    <option value="{{ $erte->id }}">{{ $erte->rt }}</option>
                                                @endforeach
                                            </select>
                                            @error('rt_id') <div class="alert alert-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                        </div> --}}

                                        {{-- <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="rw_id" class="form-label">RW</label>
                                            <select class="form-control @error('rw_id') is-invalid @enderror"
                                                aria-label="Default select example" id="rw_id" name="rw_id"
                                                value="{{ $posyandu->rw_id }}">
                                                <option selected value="{{ $posyandu->rw_id }}">{{ $posyandu->rw->rw }}
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
                                                    class="form-control" id="rw" value="{{ $posyandu->province->name }}">
                                            </div>
                                            </div>
            
                                                <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="Kotakab" class="form-label">Kota/Kab</label>
                                                    <input type="text" disabled readonly
                                                        class="form-control" id="rw" value="{{ $posyandu->regency->name }}">
                                                </div>
                                                </div>
    
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="district_id" class="form-label">Kecamatan</label>
                                                        <select class="form-control @error('district_id') is-invalid @enderror"
                                                            id="district_id" name="district_id"
                                                            value="{{ $posyandu->district_id }}">
                                                            <option selected value="{{ $posyandu->district_id }}">{{ $posyandu->district->name }}
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
                                                    value="{{ $posyandu->village_id }}">
                                                    <option selected value="{{ $posyandu->village_id }}">{{ $posyandu->village->name }}
                                                    </option>
                                                    @foreach ($kelbekasi as $kelbekasi)
                                                    <option value="{{ $kelbekasi->id }}">{{ $kelbekasi->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('village_id') <div class="alert alert-danger">{{ $message }} </div>
                                                @enderror
                                            </div>
                                            </div> --}}
                                            
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <a class="btn btn-default" href="/posyandu" role="button">Close</a>
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
