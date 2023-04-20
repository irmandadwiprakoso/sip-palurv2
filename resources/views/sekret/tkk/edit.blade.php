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
                        <div class="col-sm-6">
                            <h1>TKK</h1>
                        </div>
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
                                    <h3 class="card-title">Update Data TKK / PAMOR</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                            <form action="/tkk/{{ $tkk->id }}" method="post" enctype="multipart/form-data">
                                    @method('patch')
                                    @csrf
                                <div class="card-body">
                                <form>
                                    <div class="row">
                                           <img class="profile-user-img img-responsive img-circle-center" 
                                           src="{{ asset('images/TKK/' . $tkk->foto) }}" height="20%" width="20%"
                                           alt="User profile picture"></img>

                                        <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="nama" class="form-label">Nama</label>
                                            <input type="text" onkeyup="this.value = this.value.toUpperCase()"
                                                class="form-control @error('nama') is-invalid @enderror" id="nama"
                                                placeholder="Nama " name="nama" value="{{ $tkk->nama }}">
                                            @error('nama') <div class="alert alert-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                        </div>

                                        <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="username" class="form-label">Username</label>
                                            <input type="text" onkeyup="this.value = this.value.toUpperCase()"
                                                class="form-control @error('username') is-invalid @enderror" id="username"
                                                placeholder="Nama " name="username" value="{{ $tkk->username }}">
                                            @error('username') <div class="alert alert-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                        </div>

                                        <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="id" class="form-label">NIK</label>
                                            <input type="number" class="form-control @error('id') is-invalid @enderror"
                                                id="nik" placeholder="NIK " name="id" value="{{ $tkk->id }}">
                                            @error('id') <div class="alert alert-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                        </div>

                                        <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="KK" class="form-label">KK</label>
                                            <input type="number" class="form-control @error('KK') is-invalid @enderror"
                                                id="KK" placeholder="KK " name="KK" value="{{ $tkk->KK }}">
                                            @error('KK') <div class="alert alert-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                        </div>

                                        <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                            <input type="text" onkeyup="this.value = this.value.toUpperCase()"
                                                class="form-control @error('tempat_lahir') is-invalid @enderror"
                                                id="tempat_lahir" placeholder="Tempat Lahir " name="tempat_lahir"
                                                value="{{ $tkk->tempat_lahir }}">
                                            @error('tempat_lahir') <div class="alert alert-danger">{{ $message }}
                                            </div>@enderror
                                        </div>
                                        </div>

                                        <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                            <input type="date"
                                                class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                                id="tanggal_lahir" placeholder="Tanggal Lahir " name="tanggal_lahir"
                                                value="{{ $tkk->tanggal_lahir }}">
                                            @error('tanggal_lahir') <div class="alert alert-danger">{{ $message }}
                                            </div>@enderror
                                        </div>
                                        </div>

                                        <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="alamat" class="form-label">Alamat</label>
                                            <input type="text" onkeyup="this.value = this.value.toUpperCase()"
                                                class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                                                placeholder="Alamat " name="alamat" value="{{ $tkk->alamat }}">
                                            @error('alamat') <div class="alert alert-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                        </div>

                                        <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="agama_id" class="form-label">Agama</label>
                                            <select class="form-control @error('agama_id') is-invalid @enderror"
                                                aria-label="Default select example" id="agama_id" name="agama_id">
                                                <option selected value="{{ $tkk->agama_id }}">
                                                    {{ $tkk->agama->agama }}</option>
                                                @foreach ($agama as $ag)
                                                    <option value="{{ $ag->id }}">{{ $ag->agama }}</option>
                                                @endforeach
                                            </select>
                                            @error('agama_id') <div class="alert alert-danger">{{ $message }}
                                            </div>@enderror
                                        </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="jeniskelamin_id" class="form-label">Jenis Kelamin</label>
                                                <select class="form-control @error('jeniskelamin_id') is-invalid @enderror"
                                                    aria-label="Default select example" id="jeniskelamin_id"
                                                    name="jeniskelamin_id">
                                                    <option selected value="{{ $tkk->jeniskelamin_id }}">
                                                        {{ $tkk->jeniskelamin->jeniskelamin }}</option>
                                                    @foreach ($jeniskelamin as $jk)
                                                        <option value="{{ $jk->id }}">{{ $jk->jeniskelamin }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('jeniskelamin_id') <div class="alert alert-danger">
                                                    {{ $message }} </div>@enderror
                                            </div>
                                            </div>

                                        <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="pendidikan_id" class="form-label">Pendidikan</label>
                                            <select class="form-control @error('pendidikan_id') is-invalid @enderror"
                                                aria-label="Default select example" id="pendidikan_id"
                                                name="pendidikan_id">
                                                <option selected value="{{ $tkk->pendidikan_id }}">
                                                    {{ $tkk->pendidikan->pendidikan }}</option>
                                                @foreach ($pendidikan as $pend)
                                                    <option value="{{ $pend->id }}">{{ $pend->pendidikan }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('pendidikan_id') <div class="alert alert-danger">
                                                {{ $message }} </div>@enderror
                                        </div>
                                        </div>

                                        <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="statuskawin_id" class="form-label">Status Kawin</label>
                                            <select class="form-control @error('statuskawin_id') is-invalid @enderror"
                                                aria-label="Default select example" id="statuskawin_id"
                                                name="statuskawin_id">
                                                <option selected value="{{ $tkk->statuskawin_id }}">
                                                    {{ $tkk->statuskawin->statuskawin }}</option>
                                                @foreach ($statuskawin as $kawin)
                                                    <option value="{{ $kawin->id }}">{{ $kawin->statuskawin }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('statuskawin_id') <div class="alert alert-danger">
                                                {{ $message }} </div>@enderror
                                        </div>
                                        </div>

                                        <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="seksi_id" class="form-label">Seksi</label>
                                            <select class="form-control @error('seksi_id') is-invalid @enderror"
                                                aria-label="Default select example" id="seksi_id" name="seksi_id"
                                                value="{{ $tkk->seksi_id }}">
                                                <option selected value="{{ $tkk->seksi_id }}">
                                                    {{ $tkk->seksi->seksi }}</option>
                                                @foreach ($seksi as $seksianda)
                                                    <option value="{{ $seksianda->id }}">{{ $seksianda->seksi }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('seksi_id') <div class="alert alert-danger">{{ $message }}
                                            </div>@enderror
                                        </div>
                                        </div>

                                        <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="jabatan_id" class="form-label">Jabatan</label>
                                            <select class="form-control @error('jabatan_id') is-invalid @enderror"
                                                aria-label="Default select example" id="jabatan_id" name="jabatan_id">
                                                <option selected value="{{ $tkk->jabatan_id }}">
                                                    {{ $tkk->jabatan->jabatan }}</option>
                                                @foreach ($jabatan as $jab)
                                                    <option value="{{ $jab->id }}">{{ $jab->jabatan }}</option>
                                                @endforeach
                                            </select>
                                            @error('jabatan_id') <div class="alert alert-danger">{{ $message }}
                                            </div>@enderror
                                        </div>
                                        </div>

                                        <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="rw_id" class="form-label">Pamor RW</label>
                                            <select class="form-control @error('rw_id') is-invalid @enderror"
                                                aria-label="Default select example" id="rw_id" name="rw_id">
                                                <option selected value="{{ $tkk->rw_id }}">{{ $tkk->rw->rw }}
                                                </option>
                                                @foreach ($rw as $erwe)
                                                    <option value="{{ $erwe->id }}">{{ $erwe->rw }}</option>
                                                @endforeach
                                            </select>
                                            @error('rw_id') <div class="alert alert-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                        </div>

                                        <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="SK_Tkk" class="form-label">SK Pengangkatan TKK</label>
                                            <input type="date"
                                                class="form-control @error('SK_Tkk') is-invalid @enderror" id="SK_Tkk"
                                                placeholder="SK TKK" name="SK_Tkk" value="{{ $tkk->SK_Tkk }}">
                                            @error('SK_Tkk') <div class="alert alert-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                        </div>

                                        <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="no_rek" class="form-label">Nomor Rekening BJB</label>
                                            <input type="number"
                                                class="form-control @error('no_rek') is-invalid @enderror" id="no_rek"
                                                placeholder="Nomor Rekening BJB " name="no_rek"
                                                value="{{ $tkk->no_rek }}">
                                            @error('no_rek') <div class="alert alert-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                        </div>

                                        <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="npwp" class="form-label">NPWP</label>
                                            <input type="text" class="form-control @error('npwp') is-invalid @enderror"
                                                id="npwp" placeholder="NPWP " name="npwp" value="{{ $tkk->npwp }}">
                                            @error('npwp') <div class="alert alert-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                        </div>

                                        <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="text" class="form-control @error('email') is-invalid @enderror"
                                                id="email" placeholder="Email " name="email"
                                                value="{{ $tkk->email }}">
                                            @error('email') <div class="alert alert-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                        </div>

                                        <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="no_HP" class="form-label">Nomor Handphone</label>
                                            <input type="number"
                                                class="form-control @error('no_HP') is-invalid @enderror" id="no_HP"
                                                placeholder="Nomor HP " name="no_HP" value="{{ $tkk->no_HP }}">
                                            @error('no_HP') <div class="alert alert-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                        </div>
    
                                            <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="district_id" class="form-label">Kecamatan</label>
                                                <select class="form-control @error('district_id') is-invalid @enderror"
                                                    id="district_id" name="district_id"
                                                    value="{{ $tkk->district_id }}">
                                                    <option selected value="{{ $tkk->district_id }}">{{ $tkk->district->name }}
                                                    </option>
                                                    @foreach ($kecbekasi as $kecbekasi)
                                                        <option value="{{ $kecbekasi->id }}">{{ $kecbekasi->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('district_id') <div class="alert alert-danger">{{ $message }} </div>
                                                @enderror
                                            </div>
                                            </div>
    
                                            <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="village_id" class="form-label">Kelurahan</label>
                                                <select class="form-control @error('village_id') is-invalid @enderror"
                                                    id="village_id" name="village_id"
                                                    value="{{ $tkk->village_id }}">
                                                    <option selected value="{{ $tkk->village_id }}">{{ $tkk->village->name }}
                                                    </option>
                                                    @foreach ($kelbekasi as $kelbekasi)
                                                    <option value="{{ $kelbekasi->id }}">{{ $kelbekasi->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('village_id') <div class="alert alert-danger">{{ $message }} </div>
                                                @enderror
                                            </div>
                                            </div>

                                        <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="foto">Foto Profile</label>
                                            <input type="file" class="form-control @error('foto') is-invalid @enderror"
                                                id="foto" name="foto" value="{{ $tkk->foto }}">
                                            @error('foto') <div class="alert alert-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                            <a class="btn btn-default" href="/tkk" role="button">Close</a>
                                            <button type="submit" class="btn btn-success">Update</button>
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
