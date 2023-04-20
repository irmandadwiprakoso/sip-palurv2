<div class="row">
    <div class="col-sm-6">
    <div class="form-group">
        <label for="id" class="form-label">NIK</label>
        <input type="text" disabled readonly
            class="form-control" id="nama" value="{{ $pkh->ktp_id }}">
    </div>
    </div>
   
    <div class="col-sm-6">
    <div class="form-group">
        <label for="id" class="form-label">Nama</label>
        <input type="text" disabled readonly
            class="form-control" id="nama" value="{{ $pkh->ktp->nama }}">
    </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <label for="id" class="form-label">Alamat</label>
            <input type="text" disabled readonly
                class="form-control" id="nama" value="{{ $pkh->ktp->alamat }}">
        </div>
     </div>

    <div class="col-sm-3">
        <div class="form-group">
            <label for="rw_id" class="form-label">RT</label>
            <input type="text" disabled readonly
                class="form-control" id="nama" value="{{ $pkh->rt->rt }}">
        </div>
   </div>
   
    <div class="col-sm-3">
        <div class="form-group">
            <label for="rw_id" class="form-label">RW</label>
            <input type="text" disabled readonly
                class="form-control" id="nama" value="{{ $pkh->rw->rw }}">
        </div>
    </div>

    {{-- <div class="col-sm-6">
    <div class="form-group">
        <label for="id" class="form-label">Status DTKS</label>
        <input type="text" disabled readonly class="form-control" id="nama" value="{{ $pkh->statusdtks->statusdtks}}">
    </div>
    </div> --}}

        <div class="col-sm-6">
        <div class="form-group">
            <label for="village_id" class="form-label">Status PKH</label>
            <input type="text" disabled readonly
            class="form-control" id="nama" value="{{ $pkh->pkh}}">
        </div>
        </div>
        <div class="col-sm-6">
        <div class="form-group">
            <label for="village_id" class="form-label">Status BPNT</label>
            <input type="text" disabled readonly
            class="form-control" id="nama" value="{{ $pkh->bpnt}}">
        </div>
        </div>
        <div class="col-sm-6">
        <div class="form-group">
            <label for="village_id" class="form-label">Status PBI</label>
            <input type="text" disabled readonly
            class="form-control" id="nama" value="{{ $pkh->pbi}}">
        </div>
        </div>
        <div class="col-sm-6">
        <div class="form-group">
            <label for="village_id" class="form-label">Status NON BANSOS</label>
            <input type="text" disabled readonly
            class="form-control" id="nama" value="{{ $pkh->non_bansos}}">
        </div>
        </div>
        
        <div class="col-sm-6">
        <div class="form-group">
            <label for="village_id" class="form-label">Keterangan</label>
            <input type="text" disabled readonly
            class="form-control" id="nama" value="{{ $pkh->keterangan}}">
        </div>
        </div>
   
        <div class="col-sm-3">
        <div class="form-group">
            <label for="district_id" class="form-label">Kecamatan</label>
            <input type="text" disabled readonly
            class="form-control" id="nama" value="{{ $pkh->district->name }}">
        </div>
        </div>
   
        <div class="col-sm-3">
        <div class="form-group">
            <label for="village_id" class="form-label">Kelurahan</label>
            <input type="text" disabled readonly
            class="form-control" id="nama" value="{{ $pkh->village->name }}">
        </div>
        </div>
   
   </div>
   </div>
   