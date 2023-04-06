<div class="row">
    <img class="profile-user-img img-responsive img-circle-center" 
    src="{{ asset('images/TKK/' . $tkk->foto) }}" height="30%" width="30%"
    alt="picture"></img>

<div class="col-sm-12">
<div class="form-group">
    <label for="nama" class="form-label">Nama</label>
    <input type="text" disabled readonly
        class="form-control" id="nama" value="{{ $tkk->nama }}">
</div>
</div>

<div class="col-sm-6">
<div class="form-group">
    <label for="id" class="form-label">NIK</label>
    <input type="text" disabled readonly
        class="form-control" id="nama" value="{{ $tkk->id }}">
</div>
</div>

<div class="col-sm-6">
<div class="form-group">
    <label for="KK" class="form-label">KK</label>
    <input type="text" disabled readonly
        class="form-control" id="nama" value="{{ $tkk->KK }}">
</div>
</div>

<div class="col-sm-6">
<div class="form-group">
    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
    <input type="text" disabled readonly
        class="form-control" id="nama" value="{{ $tkk->tempat_lahir }}">
</div>
</div>

<div class="col-sm-6">
<div class="form-group">
    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
    <input type="text" disabled readonly
        class="form-control" id="nama" value="{{ $tkk->tanggal_lahir }}">
</div>
</div>

<div class="col-sm-12">
<div class="form-group">
    <label for="alamat" class="form-label">Alamat</label>
    <input type="text" disabled readonly
        class="form-control" id="nama" value="{{ $tkk->alamat }}">
</div>
</div>

<div class="col-sm-6">
<div class="form-group">
    <label for="agama_id" class="form-label">Agama</label>
    <input type="text" disabled readonly
        class="form-control" id="nama" value="{{ $tkk->agama->agama }}">
</div>
</div>

    <div class="col-sm-6">
    <div class="form-group">
        <label for="jeniskelamin_id" class="form-label">Jenis Kelamin</label>
        <input type="text" disabled readonly
        class="form-control" id="nama" value="{{ $tkk->jeniskelamin->jeniskelamin }}">
    </div>
    </div>

<div class="col-sm-6">
<div class="form-group">
    <label for="pendidikan_id" class="form-label">Pendidikan</label>
    <input type="text" disabled readonly
        class="form-control" id="nama" value="{{ $tkk->pendidikan->pendidikan }}">
</div>
</div>

<div class="col-sm-6">
<div class="form-group">
    <label for="statuskawin_id" class="form-label">Status Kawin</label>
    <input type="text" disabled readonly
        class="form-control" id="nama" value="{{ $tkk->statuskawin->statuskawin }}">
</div>
</div>

<div class="col-sm-6">
<div class="form-group">
    <label for="seksi_id" class="form-label">Seksi</label>
    <input type="text" disabled readonly
        class="form-control" id="nama" value="{{ $tkk->seksi->seksi }}">
</div>
</div>

<div class="col-sm-6">
<div class="form-group">
    <label for="jabatan_id" class="form-label">Jabatan</label>
    <input type="text" disabled readonly
        class="form-control" id="nama" value="{{ $tkk->jabatan->jabatan }}">
</div>
</div>

<div class="col-sm-6">
<div class="form-group">
    <label for="SK_Tkk" class="form-label">SK Pengangkatan TKK</label>
    <input type="text" disabled readonly
        class="form-control" id="nama" value="{{ $tkk->SK_Tkk }}">
</div>
</div>

<div class="col-sm-6">
<div class="form-group">
    <label for="no_rek" class="form-label">Nomor Rekening BJB</label>
    <input type="text" disabled readonly
        class="form-control" id="nama" value="{{ $tkk->no_rek }}">
</div>
</div>

<div class="col-sm-6">
<div class="form-group">
    <label for="npwp" class="form-label">NPWP</label>
    <input type="text" disabled readonly
        class="form-control" id="nama" value="{{ $tkk->npwp }}">
</div>
</div>

<div class="col-sm-6">
<div class="form-group">
    <label for="email" class="form-label">Email</label>
    <input type="text" disabled readonly
        class="form-control" id="nama" value="{{ $tkk->email }}">
</div>
</div>

<div class="col-sm-6">
<div class="form-group">
    <label for="no_HP" class="form-label">Nomor Handphone</label>
    <input type="text" disabled readonly
        class="form-control" id="nama" value="{{ $tkk->no_HP }}">
</div>
</div>

<div class="col-sm-6">
    <div class="form-group">
        <label for="rw_id" class="form-label">Pamor RW</label>
        <input type="text" disabled readonly
            class="form-control" id="nama" value="{{ $tkk->rw->rw }}">
    </div>
    </div>

    <div class="col-sm-6">
    <div class="form-group">
        <label for="district_id" class="form-label">Kecamatan</label>
        <input type="text" disabled readonly
        class="form-control" id="nama" value="{{ $tkk->district->name }}">
    </div>
    </div>

    <div class="col-sm-6">
    <div class="form-group">
        <label for="village_id" class="form-label">Kelurahan</label>
        <input type="text" disabled readonly
        class="form-control" id="nama" value="{{ $tkk->village->name }}">
    </div>
    </div>

</div>
</div>
