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
                                    <h3 class="card-title">Update Data PKK</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="/pkk/{{ $pkk->id }}" method="post" enctype="multipart/form-data">
                                    @method('patch')
                                    @csrf
                                    <div class="card-body">
                                    <form>
                                    <div class="row">
                                        <div class="col-sm-12">
                                        <div class="form-group">
                                            <h3 class="profile-username text-center">{{ $pkk->ktp->nama }}</h3>
                                            <h3 class="profile-username text-center">{{ $pkk->ktp->id }}</h3>
                                        </div>
                                        </div>
                                            <div class="col-sm-12">
                                              <div class="form-group">
                                                  <label for="id" class="form-label">Nama Kader PKK</label>
                                                  <input type="text" disabled readonly
                                                      class="form-control" id="nama" value="{{ $pkk->ktp->nama }}">
                                              </div>
                                              </div>
                                              <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="ktp_id" class="form-label">Nama/NIK Kader PKK</label>
                                                    <input class="form-control @error('ktp_id') is-invalid @enderror" placeholder="Ketik NIK/Nama, pilih NIK/Nama sesuai yang diinginkan" list="nik_warga" id="ktp_id" name="ktp_id" value="{{$pkk->ktp_id}}"> 
                                                        <datalist id="nik_warga" selected value="{{$pkk->ktp_id}}" >
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
                                                        <option selected value="{{ $pkk->jabatan_id }}">
                                                            {{ $pkk->jabatan->jabatan }}</option>
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
                                                        <label for="no_SK" class="form-label">Nomor SK PKK</label>
                                                        <input type="text" class="form-control @error('no_SK') is-invalid @enderror"
                                                            id="no_SK" placeholder="No SK Lurah/Camat" name="no_SK"
                                                            value="{{ $pkk->no_SK }}">
                                                        @error('no_SK') <div class="alert alert-danger">{{ $message }} </div>
                                                        @enderror
                                                    </div>
                                                    </div>
    
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="pokja" class="form-label">Pokja PKK</label>
                                                    <input type="text" class="form-control @error('pokja') is-invalid @enderror"
                                                        id="pokja" placeholder="Pokja PKK" name="pokja"
                                                        value="{{ $pkk->pokja }}">
                                                    @error('pokja') <div class="alert alert-danger">{{ $message }} </div>
                                                    @enderror
                                                </div>
                                                </div>


                                        {{-- <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="rt_id" class="form-label">RT</label>
                                            <select class="form-control @error('rt_id') is-invalid @enderror"
                                                aria-label="Default select example" id="rt_id" name="rt_id"
                                                value="{{ $pkk->rt_id }}">
                                                <option selected value="{{ $pkk->rt_id }}">{{ $pkk->rt->rt }}
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
                                                value="{{ $pkk->rw_id }}">
                                                <option selected value="{{ $pkk->rw_id }}">{{ $pkk->rw->rw }}
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
                                                    class="form-control" id="rw" value="{{ $pkk->province->name }}">
                                            </div>
                                            </div>
            
                                                <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="Kotakab" class="form-label">Kota/Kab</label>
                                                    <input type="text" disabled readonly
                                                        class="form-control" id="rw" value="{{ $pkk->regency->name }}">
                                                </div>
                                                </div>
    
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="district_id" class="form-label">Kecamatan</label>
                                                        <select class="form-control @error('district_id') is-invalid @enderror"
                                                            id="district_id" name="district_id"
                                                            value="{{ $pkk->district_id }}">
                                                            <option selected value="{{ $pkk->district_id }}">{{ $pkk->district->name }}
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
                                                    value="{{ $pkk->village_id }}">
                                                    <option selected value="{{ $pkk->village_id }}">{{ $pkk->village->name }}
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
                                                    <a class="btn btn-default" href="/pkk" role="button">Close</a>
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
