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
                                    <h3 class="card-title">Update Laporan Harian Pamor</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="/laporanpamor/{{ $laporanpamor->id }}" method="post" enctype="multipart/form-data">
                                    @method('patch')
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <img class="img-fluid" alt="Responsive image" src="{{ asset('images/LaporanHarian/' . $laporanpamor->foto) }}"></img>
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                <label for="kegiatan" class="form-label">Kegiatan Pamor</label>
                                                <input type="text" onkeyup="this.value = this.value.toUpperCase()"
                                                    class="form-control @error('kegiatan') is-invalid @enderror"
                                                    id="kegiatan" placeholder="Kegiatan Anda" name="kegiatan"
                                                    value="{{ $laporanpamor->kegiatan }}">
                                                @error('kegiatan') <div class="alert alert-danger">{{ $message }}
                                                </div>@enderror
                                            </div>
                                            </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="tanggal" class="form-label">Tanggal Kegiatan</label>
                                                <input type="date"
                                                    class="form-control @error('tanggal') is-invalid @enderror" id="tanggal"
                                                    placeholder="Tanggal Kegiatan" name="tanggal"
                                                    value="{{ $laporanpamor->tanggal }}">
                                                @error('tanggal') <div class="alert alert-danger">{{ $message }} </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                            <label for="jumlah" class="form-label">Jumlah Kegiatan</label>
                                            <input type="number"
                                                class="form-control @error('jumlah') is-invalid @enderror" id="jumlah"
                                                placeholder="Jumlah Laporan Anda" name="jumlah"
                                                value="{{ $laporanpamor->jumlah }}">
                                            @error('jumlah') <div class="alert alert-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="seksi_id" class="form-label">Seksi</label>
                                                <select class="form-control @error('seksi_id') is-invalid @enderror"
                                                    aria-label="Default select example" id="seksi_id" name="seksi_id"
                                                    value="{{ $laporanpamor->seksi_id }}">
                                                    <option selected value="{{ $laporanpamor->seksi_id }}">
                                                        {{ $laporanpamor->seksi->seksi }}</option>
                                                    @foreach ($seksi as $seksianda)
                                                        <option value="{{ $seksianda->id }}">{{ $seksianda->seksi }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('seksi_id') <div class="alert alert-danger">{{ $message }}
                                                </div>@enderror
                                            </div>
                                            </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                            <label for="tinjut" class="form-label">Tindaklanjut</label>
                                            <input type="text" onkeyup="this.value = this.value.toUpperCase()"
                                                class="form-control @error('tinjut') is-invalid @enderror" id="tinjut"
                                                placeholder="Keterangan Laporan Anda" name="tinjut"
                                                value="{{ $laporanpamor->tinjut }}">
                                            @error('tinjut') <div class="alert alert-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                            <label for="keterangan" class="form-label">Keterangan</label>
                                            <input type="text" onkeyup="this.value = this.value.toUpperCase()"
                                                class="form-control @error('keterangan') is-invalid @enderror"
                                                id="keterangan" placeholder="Keterangan Laporan Anda" name="keterangan"
                                                value="{{ $laporanpamor->keterangan }}">
                                            @error('keterangan') <div class="alert alert-danger">{{ $message }}
                                            </div>@enderror
                                        </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                            <label for="foto">Foto Kegiatan</label>
                                            <input type="file" class="form-control @error('foto') is-invalid @enderror"
                                                id="foto" name="foto" value="{{ $laporanpamor->foto }}">
                                            @error('foto') <div class="alert alert-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                            <label for="rt_id" class="form-label">RT</label>
                                            <select class="form-control @error('rt_id') is-invalid @enderror"
                                                aria-label="Default select example" id="rt_id" name="rt_id"
                                                value="{{ $laporanpamor->rt_id }}">
                                                <option selected value="{{ $laporanpamor->rt_id }}">
                                                    {{ $laporanpamor->rt->rt }}
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
                                                value="{{ $laporanpamor->rw_id }}">
                                                <option selected value="{{ $laporanpamor->rw_id }}">
                                                    {{ $laporanpamor->rw->rw }}
                                                </option>
                                                @foreach ($rw as $erwe)
                                                    <option value="{{ $erwe->id }}">{{ $erwe->rw }}</option>
                                                @endforeach
                                            </select>
                                            @error('rw_id') <div class="alert alert-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                        </div>

                                            {{-- <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="Provinsi" class="form-label">Provinsi</label>
                                                <input type="text" disabled readonly
                                                    class="form-control" id="rw" value="{{ $laporanpamor->province->name }}">
                                            </div>
                                            </div>
            
                                                <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="Kotakab" class="form-label">Kota/Kab</label>
                                                    <input type="text" disabled readonly
                                                        class="form-control" id="rw" value="{{ $laporanpamor->regency->name }}">
                                                </div>
                                                </div>
    
                                            <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="district_id" class="form-label">Kecamatan</label>
                                                <select class="form-control @error('district_id') is-invalid @enderror"
                                                    id="district_id" name="district_id"
                                                    value="{{ $laporanpamor->district_id }}">
                                                    <option selected value="{{ $laporanpamor->district_id }}">{{ $laporanpamor->district->name }}
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
                                                    value="{{ $laporanpamor->village_id }}">
                                                    <option selected value="{{ $laporanpamor->village_id }}">{{ $laporanpamor->village->name }}
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
                                                    <a class="btn btn-default" href="/laporanpamor" role="button">Cancel</a>
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
