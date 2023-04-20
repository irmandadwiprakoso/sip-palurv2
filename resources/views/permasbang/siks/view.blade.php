<div class="row">
    <div class="col-sm-6">
    <div class="form-group">
        <label for="id" class="form-label">NIK</label>
        <input type="text" disabled readonly
            class="form-control" id="nama" value="{{ $siks->ktp_id }}">
    </div>
    </div>
   
    <div class="col-sm-6">
    <div class="form-group">
        <label for="id" class="form-label">Nama</label>
        <input type="text" disabled readonly
            class="form-control" id="nama" value="{{ $siks->ktp->nama }}">
    </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <label for="id" class="form-label">Alamat</label>
            <input type="text" disabled readonly
                class="form-control" id="nama" value="{{ $siks->ktp->alamat }}">
        </div>
     </div>

    <div class="col-sm-3">
        <div class="form-group">
            <label for="rw_id" class="form-label">RT</label>
            <input type="text" disabled readonly
                class="form-control" id="nama" value="{{ $siks->rt->rt }}">
        </div>
   </div>
   
    <div class="col-sm-3">
        <div class="form-group">
            <label for="rw_id" class="form-label">RW</label>
            <input type="text" disabled readonly
                class="form-control" id="nama" value="{{ $siks->rw->rw }}">
        </div>
    </div>

    <div class="col-sm-3">
    <div class="form-group">
        <label for="id" class="form-label">Status PKH</label>
        <input type="text" disabled readonly class="form-control" id="nama" value="{{ $siks->pkh}}">
    </div>
    </div>
    <div class="col-sm-3">
    <div class="form-group">
        <label for="id" class="form-label">Status BPNT</label>
        <input type="text" disabled readonly class="form-control" id="nama" value="{{ $siks->bpnt }}">
    </div>
    </div>
    <div class="col-sm-3">
    <div class="form-group">
        <label for="id" class="form-label">Status PBI</label>
        <input type="text" disabled readonly class="form-control" id="nama" value="{{ $siks->pbi }}">
    </div>
    </div>
    <div class="col-sm-3">
    <div class="form-group">
        <label for="id" class="form-label">Status NON BANSOS</label>
        <input type="text" disabled readonly class="form-control" id="nama" value="{{ $siks->non_bansos }}">
    </div>
    </div>
   
        <div class="col-sm-4">
        <div class="form-group">
            <label for="district_id" class="form-label">Kecamatan</label>
            <input type="text" disabled readonly
            class="form-control" id="nama" value="{{ $siks->district->name }}">
        </div>
        </div>
   
        <div class="col-sm-4">
        <div class="form-group">
            <label for="village_id" class="form-label">Kelurahan</label>
            <input type="text" disabled readonly
            class="form-control" id="nama" value="{{ $siks->village->name }}">
        </div>
        </div>
   
        <div class="col-sm-4">
        <div class="form-group">
            <label for="village_id" class="form-label">Keterangan</label>
            <input type="text" disabled readonly
            class="form-control" id="nama" value="{{ $siks->keterangan}}">
        </div>
        </div>
   
   </div>
   </div>
   