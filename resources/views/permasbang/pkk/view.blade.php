<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label for="nama" class="form-label">NIK</label>
            <input type="text" disabled readonly
                class="form-control" id="nama" value="{{ $pkk->ktp_id }}">
        </div>
        </div>

    <div class="col-sm-6">
    <div class="form-group">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" disabled readonly
            class="form-control" id="nama" value="{{ $pkk->ktp->nama }}">
    </div>
    </div>
   
    <div class="col-sm-6">
        <div class="form-group">
            <label for="no_rek" class="form-label">Jabatan</label>
            <input type="text" disabled readonly
                class="form-control" id="nama" value="{{ $pkk->jabatan->jabatan}}">
        </div>
        </div>

    <div class="col-sm-6">
    <div class="form-group">
        <label for="no+sk" class="form-label">SK PKK</label>
        <input type="text" disabled readonly
            class="form-control" id="nama" value="{{ $pkk->no_SK }}">
    </div>
    </div>

    <div class="col-sm-6">
    <div class="form-group">
        <label for="no+sk" class="form-label">POKJA</label>
        <input type="text" disabled readonly
            class="form-control" id="nama" value="{{ $pkk->pokja }}">
    </div>
    </div>
   
    <div class="col-sm-6">
        <div class="form-group">
            <label for="rw_id" class="form-label">RW</label>
            <input type="text" disabled readonly
                class="form-control" id="nama" value="{{ $pkk->rw->rw }}">
        </div>
        </div>
   
        <div class="col-sm-6">
        <div class="form-group">
            <label for="district_id" class="form-label">Kecamatan</label>
            <input type="text" disabled readonly
            class="form-control" id="nama" value="{{ $pkk->district->name }}">
        </div>
        </div>
   
        <div class="col-sm-6">
        <div class="form-group">
            <label for="village_id" class="form-label">Desa/Kelurahan</label>
            <input type="text" disabled readonly
            class="form-control" id="nama" value="{{ $pkk->village->name }}">
        </div>
        </div>
   
   </div>
   </div>
   