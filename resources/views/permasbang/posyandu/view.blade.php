<div class="row">
    <div class="col-sm-6">
    <div class="form-group">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" disabled readonly
            class="form-control" id="nama" value="{{ $posyandu->ktp->nama }}">
    </div>
    </div>
   
    <div class="col-sm-6">
    <div class="form-group">
        <label for="nama" class="form-label">NIK</label>
        <input type="text" disabled readonly
            class="form-control" id="nama" value="{{ $posyandu->ktp_id }}">
    </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <label for="no_rek" class="form-label">Jabatan</label>
            <input type="text" disabled readonly
                class="form-control" id="nama" value="{{ $posyandu->jabatan->jabatan}}">
        </div>
        </div>

    <div class="col-sm-6">
    <div class="form-group">
        <label for="no+sk" class="form-label">SK Posyandu</label>
        <input type="text" disabled readonly
            class="form-control" id="nama" value="{{ $posyandu->no_SK }}">
    </div>
    </div>
   


    <div class="col-sm-6">
    <div class="form-group">
        <label for="no_rek" class="form-label">Nama Posyandu</label>
        <input type="text" disabled readonly
            class="form-control" id="nama" value="{{ $posyandu->saranakesehatan->nama}}">
    </div>
    </div>
   
    <div class="col-sm-6">
        <div class="form-group">
            <label for="rw_id" class="form-label">RW</label>
            <input type="text" disabled readonly
                class="form-control" id="nama" value="{{ $posyandu->rw->rw }}">
        </div>
        </div>
   
        <div class="col-sm-6">
        <div class="form-group">
            <label for="district_id" class="form-label">Kecamatan</label>
            <input type="text" disabled readonly
            class="form-control" id="nama" value="{{ $posyandu->district->name }}">
        </div>
        </div>
   
        <div class="col-sm-6">
        <div class="form-group">
            <label for="village_id" class="form-label">Kelurahan</label>
            <input type="text" disabled readonly
            class="form-control" id="nama" value="{{ $posyandu->village->name }}">
        </div>
        </div>
   
   </div>
   </div>
   