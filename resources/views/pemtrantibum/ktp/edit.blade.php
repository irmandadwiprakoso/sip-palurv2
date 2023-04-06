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
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Update Data Kependudukan (KTP)</h3>
                                </div>
                                <!-- /.card-header -->

                                <!-- form start -->
                                <form action="/ktp/{{ $ktp->id }}" method="post" enctype="multipart/form-data">
                                    @method('patch')
                                    @csrf
                                    <div class="card-body">
                                    <form>
                                    <div class="row">

                                        <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="nama" class="form-label">Nama</label>
                                            <input type="text" onkeyup="this.value = this.value.toUpperCase()"
                                                class="form-control @error('nama') is-invalid @enderror" id="nama"
                                                placeholder="Nama" name="nama" value="{{ $ktp->nama }}">
                                            @error('nama') <div class="alert alert-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                        </div>

                                        <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="id" class="form-label">NIK</label>
                                            <input type="number" class="form-control @error('id') is-invalid @enderror"
                                                id="id" placeholder="NIK" name="id" value="{{ $ktp->id }}">
                                            @error('id') <div class="alert alert-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                        </div>

                                        <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="KK" class="form-label">KK</label>
                                            <input type="number" class="form-control @error('KK') is-invalid @enderror"
                                                id="KK" placeholder="KK" name="KK" value="{{ $ktp->KK }}">
                                            @error('KK') <div class="alert alert-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                        </div>

                                        <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="hubkeluarga_id" class="form-label">Hubungan Keluarga</label>
                                            <select class="form-control @error('hubkeluarga_id') is-invalid @enderror"
                                                aria-label="Default select example" id="hubkeluarga_id" name="hubkeluarga_id"
                                                value="{{ $ktp->hubkeluarga_id }}">
                                                <option selected value="{{ $ktp->hubkeluarga_id }}">{{ $ktp->hubkeluarga->hubkeluarga }}
                                                </option>
                                                @foreach ($hubkeluarga as $hub)
                                                    <option value="{{ $hub->id }}">{{ $hub->hubkeluarga }}</option>
                                                @endforeach
                                            </select>
                                            @error('hubkeluarga_id') <div class="alert alert-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                        </div>

                                        <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                            <input type="text" onkeyup="this.value = this.value.toUpperCase()"
                                                class="form-control @error('tempat_lahir') is-invalid @enderror"
                                                id="tempat_lahir" placeholder="Tempat Lahir" name="tempat_lahir"
                                                value="{{ $ktp->tempat_lahir }}">
                                            @error('tempat_lahir') <div class="alert alert-danger">{{ $message }}
                                            </div>@enderror
                                        </div>
                                        </div>

                                        <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                            <input type="date"
                                                class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                                id="tanggal_lahir" placeholder="Tanggal Lahir" name="tanggal_lahir"
                                                value="{{ $ktp->tanggal_lahir }}">
                                            @error('tanggal_lahir') <div class="alert alert-danger">{{ $message }}
                                            </div>@enderror
                                        </div>
                                        </div>

                                        <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="alamat" class="form-label">Alamat</label>
                                            <input type="text" onkeyup="this.value = this.value.toUpperCase()"
                                                class="form-control @error('alamat') is-invalid @enderror"
                                                id="alamat" placeholder="Alamat" name="alamat"
                                                value="{{ $ktp->alamat }}">
                                            @error('alamat') <div class="alert alert-danger">{{ $message }}
                                            </div>@enderror
                                        </div>
                                        </div>

                                        <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="rt_id" class="form-label">RT</label>
                                            <select class="form-control @error('rt_id') is-invalid @enderror"
                                                aria-label="Default select example" id="rt_id" name="rt_id"
                                                value="{{ $ktp->rt_id }}">
                                                <option selected value="{{ $ktp->rt_id }}">{{ $ktp->rt->rt }}
                                                </option>
                                                @foreach ($rt as $erte)
                                                    <option value="{{ $erte->id }}">{{ $erte->rt }}</option>
                                                @endforeach
                                            </select>
                                            @error('rt_id') <div class="alert alert-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                        </div>

                                        <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="rw_id" class="form-label">RW</label>
                                            <select class="form-control @error('rw_id') is-invalid @enderror"
                                                aria-label="Default select example" id="rw_id" name="rw_id"
                                                value="{{ $ktp->rw_id }}">
                                                <option selected value="{{ $ktp->rw_id }}">{{ $ktp->rw->rw }}
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
                                            <label for="province_id" class="form-label">Provinsi</label>
                                            <select class="form-control @error('province_id') is-invalid @enderror"
                                                id="province_id" name="province_id"
                                                value="{{ $ktp->province_id }}">
                                                <option selected value="{{ $ktp->province_id }}">{{ $ktp->province->name }}
                                                </option>
                                                @foreach ($provinces as $prov)
                                                    <option value="{{ $prov->id }}">{{ $prov->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('province_id') <div class="alert alert-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                        </div>
        
                                        <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="regency_id" class="form-label">Kota/Kab</label>
                                            <select class="form-control @error('regency_id') is-invalid @enderror"
                                                id="regency_id" name="regency_id"
                                                value="{{ $ktp->regency_id }}">
                                                <option selected value="{{ $ktp->regency_id }}">{{ $ktp->regency->name }}
                                                </option>
                                                @foreach ($regencies as $regen)
                                                    <option value="{{ $regen->id }}">{{ $regen->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('regency_id') <div class="alert alert-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                        </div>

                                        <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="district_id" class="form-label">Kecamatan</label>
                                            <select class="form-control @error('district_id') is-invalid @enderror"
                                                id="district_id" name="district_id"
                                                value="{{ $ktp->district_id }}">
                                                <option selected value="{{ $ktp->district_id }}">{{ $ktp->district->name }}
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
                                                    value="{{ $ktp->village_id }}">
                                                    <option selected value="{{ $ktp->village_id }}">{{ $ktp->village->name }}
                                                    </option>
                                                    @foreach ($kelbekasi as $kelbekasi)
                                                    <option value="{{ $kelbekasi->id }}">{{ $kelbekasi->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('village_id') <div class="alert alert-danger">{{ $message }} </div>
                                                @enderror
                                            </div>
                                            </div>

                                        <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="agama_id" class="form-label">Agama</label>
                                            <select class="form-control @error('agama_id') is-invalid @enderror"
                                                aria-label="Default select example" id="agama_id" name="agama_id">
                                                <option selected value="{{ $ktp->agama_id }}">
                                                    {{ $ktp->agama->agama }}</option>
                                                @foreach ($agama as $ag)
                                                    <option value="{{ $ag->id }}">{{ $ag->agama }}</option>
                                                @endforeach
                                            </select>
                                            @error('agama_id') <div class="alert alert-danger">{{ $message }}
                                            </div>@enderror
                                        </div>
                                        </div>

                                        <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="statuskawin_id" class="form-label">Status Kawin</label>
                                            <select class="form-control @error('statuskawin_id') is-invalid @enderror"
                                                aria-label="Default select example" id="statuskawin_id"
                                                name="statuskawin_id">
                                                <option selected value="{{ $ktp->statuskawin_id }}">
                                                    {{ $ktp->statuskawin->statuskawin }}</option>
                                                @foreach ($statuskawin as $kawin)
                                                    <option value="{{ $kawin->id }}">{{ $kawin->statuskawin }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('statuskawin_id') <div class="alert alert-danger">
                                                {{ $message }} </div>@enderror
                                        </div>
                                        </div>

                                        <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="jeniskelamin_id" class="form-label">Jenis Kelamin</label>
                                            <select class="form-control @error('jeniskelamin_id') is-invalid @enderror"
                                                aria-label="Default select example" id="jeniskelamin_id"
                                                name="jeniskelamin_id">
                                                <option selected value="{{ $ktp->jeniskelamin_id }}">
                                                    {{ $ktp->jeniskelamin->jeniskelamin }}</option>
                                                @foreach ($jeniskelamin as $jk)
                                                    <option value="{{ $jk->id }}">{{ $jk->jeniskelamin }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('jeniskelamin_id') <div class="alert alert-danger">
                                                {{ $message }} </div>@enderror
                                        </div>
                                        </div>

                                        <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="pekerjaan_id" class="form-label">Pekerjaan</label>
                                            <select class="form-control @error('pekerjaan_id') is-invalid @enderror"
                                                aria-label="Default select example" id="pekerjaan_id" name="pekerjaan_id">
                                                <option selected value="{{ $ktp->pekerjaan_id }}">
                                                    {{ $ktp->pekerjaan->pekerjaan }}</option>
                                                @foreach ($pekerjaan as $pk)
                                                    <option value="{{ $pk->id }}">{{ $pk->pekerjaan }}</option>
                                                @endforeach
                                            </select>
                                            @error('pekerjaan_id') <div class="alert alert-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                        </div>

                                        <div class="col-sm-12">                                    
                                            <a class="btn btn-default" href="/ktp" role="button">Close</a>
                                            <button type="submit" class="btn btn-success">Update</button>
                                        </div>
                                    </div>
                                    </div>
                                </form>
                            </div>
                         </div>
                    </section>
        </div>
        @include('master.csidebar')
        @include('master.footer')
        @include('master.script')
</body>

</html>
