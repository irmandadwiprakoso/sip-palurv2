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
                                    <h3 class="card-title">Update Data Fasos Fasum</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="/fasosfasum/{{ $fasosfasum->id }}" method="post"
                                    enctype="multipart/form-data">
                                    @method('patch')
                                    @csrf
                                    <div class="card-body">
                                        <form>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <img class="img-fluid" alt="Responsive image" src="{{ asset('images/FasosFasum/' . $fasosfasum->foto) }}"></img>
                                                    </div>
                                                </div>

                                        <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="nama" class="form-label">Nama</label>
                                            <input type="text" onkeyup="this.value = this.value.toUpperCase()"
                                                class="form-control @error('nama') is-invalid @enderror" id="nama"
                                                placeholder="Nama" name="nama" value="{{ $fasosfasum->nama }}">
                                            @error('nama') <div class="alert alert-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                        </div>

                                        <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="alamat" class="form-label">Alamat</label>
                                            <input type="text" onkeyup="this.value = this.value.toUpperCase()"
                                                class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                                                placeholder="Alamat" name="alamat" value="{{ $fasosfasum->alamat }}">
                                            @error('alamat') <div class="alert alert-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                        </div>

                                        <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="rt_id" class="form-label">RT</label>
                                            <select class="form-control @error('rt_id') is-invalid @enderror"
                                                aria-label="Default select example" id="rt_id" name="rt_id"
                                                value="{{ $fasosfasum->rt_id }}">
                                                <option selected value="{{ $fasosfasum->rt_id }}">
                                                    {{ $fasosfasum->rt->rt }}</option>
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
                                                value="{{ $fasosfasum->rw_id }}">
                                                <option selected value="{{ $fasosfasum->rw_id }}">
                                                    {{ $fasosfasum->rw->rw }}</option>
                                                @foreach ($rw as $erwe)
                                                    <option value="{{ $erwe->id }}">{{ $erwe->rw }}</option>
                                                @endforeach
                                            </select>
                                            @error('rw_id') <div class="alert alert-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                        </div> --}}
    
                                            {{-- <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="village_id" class="form-label">Desa/Kelurahan</label>
                                                <select class="form-control @error('village_id') is-invalid @enderror"
                                                    id="village_id" name="village_id"
                                                    value="{{ $fasosfasum->village_id }}">
                                                    <option selected value="{{ $fasosfasum->village_id }}">{{ $fasosfasum->village->name }}
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
                                            <label for="koordinat" class="form-label">Koordinat Lokasi</label>
                                            <input type="text" onkeyup="this.value = this.value.toUpperCase()"
                                                class="form-control @error('koordinat') is-invalid @enderror"
                                                id="koordinat" placeholder="Koordinat Lokasi" name="koordinat"
                                                value="{{ $fasosfasum->koordinat }}">
                                            @error('koordinat') <div class="alert alert-danger">{{ $message }}
                                            </div>@enderror
                                        </div>
                                        </div>

                                        <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="luas" class="form-label">Luas Lokasi</label>
                                            <input type="number"
                                                class="form-control @error('luas') is-invalid @enderror" id="luas"
                                                placeholder="Luas Lokasi (m2)" name="luas"
                                                value="{{ $fasosfasum->luas }}">
                                            @error('luas') <div class="alert alert-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                        </div>

                                        <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="pemanfaatan" class="form-label">Pemanfaatan Lokasi</label>
                                            <input type="text" onkeyup="this.value = this.value.toUpperCase()"
                                                class="form-control @error('pemanfaatan') is-invalid @enderror"
                                                id="pemanfaatan" placeholder="Pemanfaatan Lokasi" name="pemanfaatan"
                                                value="{{ $fasosfasum->pemanfaatan }}">
                                            @error('pemanfaatan') <div class="alert alert-danger">{{ $message }}
                                            </div>@enderror
                                        </div>
                                        </div>

                                        <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="nama_pengembang" class="form-label">Nama Pengembang</label>
                                            <input type="text" onkeyup="this.value = this.value.toUpperCase()"
                                                class="form-control @error('nama_pengembang') is-invalid @enderror"
                                                id="nama_pengembang" placeholder="Nama Pengembang"
                                                name="nama_pengembang" value="{{ $fasosfasum->nama_pengembang }}">
                                            @error('nama_pengembang') <div class="alert alert-danger">
                                                {{ $message }} </div>@enderror
                                        </div>
                                        </div>

                                        <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="nama_perumahan" class="form-label">Nama Perumahan</label>
                                            <input type="text" onkeyup="this.value = this.value.toUpperCase()"
                                                class="form-control @error('nama_perumahan') is-invalid @enderror"
                                                id="nama_perumahan" placeholder="Nama Perumahan" name="nama_perumahan"
                                                value="{{ $fasosfasum->nama_perumahan }}">
                                            @error('nama_perumahan') <div class="alert alert-danger">
                                                {{ $message }} </div>@enderror
                                        </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                            <label for="foto">Foto Lokasi</label>
                                            <input type="file" class="form-control @error('foto') is-invalid @enderror"
                                                id="foto" name="foto" value="{{ $fasosfasum->foto }}">
                                            @error('foto') <div class="alert alert-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                            <a class="btn btn-default" href="/fasosfasum" role="button">Close</a>
                                            <button type="submit" class="btn btn-success">Update</button>
                                        </div>
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
