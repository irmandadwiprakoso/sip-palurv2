<div class="row">
    <div class="col-sm-6">
    <div class="form-group">
        <label for="id" class="form-label">NIK</label>
        <input type="text" disabled readonly
            class="form-control" id="nama" value="{{ $dtksnondtks->ktp_id }}">
    </div>
    </div>
   
    <div class="col-sm-6">
    <div class="form-group">
        <label for="id" class="form-label">Nama</label>
        <input type="text" disabled readonly
            class="form-control" id="nama" value="{{ $dtksnondtks->ktp->nama }}">
    </div>
    </div>
   
    <div class="col-sm-3">
    <div class="form-group">
        <label for="id" class="form-label">Status PKH</label>
        <input type="text" disabled readonly class="form-control" id="nama" value="{{ $dtksnondtks->pkh}}">
    </div>
    </div>
    <div class="col-sm-3">
    <div class="form-group">
        <label for="id" class="form-label">Status BPNT</label>
        <input type="text" disabled readonly class="form-control" id="nama" value="{{ $dtksnondtks->bpnt }}">
    </div>
    </div>
    <div class="col-sm-3">
    <div class="form-group">
        <label for="id" class="form-label">Status PBI</label>
        <input type="text" disabled readonly class="form-control" id="nama" value="{{ $dtksnondtks->pbi }}">
    </div>
    </div>
    <div class="col-sm-3">
    <div class="form-group">
        <label for="id" class="form-label">Status NON_BANSOS</label>
        <input type="text" disabled readonly class="form-control" id="nama" value="{{ $dtksnondtks->non_bansos }}">
    </div>
    </div>
   
   
    <div class="col-sm-6">
       <div class="form-group">
           <label for="id" class="form-label">Alamat</label>
           <input type="text" disabled readonly
               class="form-control" id="nama" value="{{ $dtksnondtks->ktp->alamat }}">
       </div>
    </div>
   
    <div class="col-sm-3">
        <div class="form-group">
            <label for="rw_id" class="form-label">RT</label>
            <input type="text" disabled readonly
                class="form-control" id="nama" value="{{ $dtksnondtks->rt->rt }}">
        </div>
   </div>
   
    <div class="col-sm-3">
        <div class="form-group">
            <label for="rw_id" class="form-label">RW</label>
            <input type="text" disabled readonly
                class="form-control" id="nama" value="{{ $dtksnondtks->rw->rw }}">
        </div>
        </div>
   
        <div class="col-sm-6">
        <div class="form-group">
            <label for="district_id" class="form-label">Kecamatan</label>
            <input type="text" disabled readonly
            class="form-control" id="nama" value="{{ $dtksnondtks->district->name }}">
        </div>
        </div>
   
        <div class="col-sm-6">
        <div class="form-group">
            <label for="village_id" class="form-label">Desa/Kelurahan</label>
            <input type="text" disabled readonly
            class="form-control" id="nama" value="{{ $dtksnondtks->village->name }}">
        </div>
        </div>
   
        <div class="col-sm-12">
        <div class="form-group">
            <label for="village_id" class="form-label">Keterangan</label>
            <input type="text" disabled readonly
            class="form-control" id="nama" value="{{ $dtksnondtks->keterangan}}">
        </div>
        </div>
   
   </div>
   </div>
   