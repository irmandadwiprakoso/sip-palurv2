<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label for="nama" class="form-label">NIK</label>
            <input type="text" disabled readonly
                class="form-control" id="nama" value="{{ $pospin->NIK }}">
        </div>
        </div>

    <div class="col-sm-6">
    <div class="form-group">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" disabled readonly
            class="form-control" id="nama" value="{{ $pospin->nama }}">
    </div>
    </div>
    <div class="col-sm-6">
    <div class="form-group">
        <label for="nama" class="form-label">JK</label>
        <input type="text" disabled readonly
            class="form-control" id="nama" value="{{ $pospin->jeniskelamin->jeniskelamin }}">
    </div>
    </div>
    <div class="col-sm-6">
    <div class="form-group">
        <label for="nama" class="form-label">Tanggal Lahir</label>
        <input type="text" disabled readonly
            class="form-control" id="nama" value="{{ $pospin->tgl_lahir }}">
    </div>
    </div>

    <div class="col-sm-6">
    <div class="form-group">
        <label for="nama" class="form-label">Posyandu</label>
        <input type="text" disabled readonly
            class="form-control" id="nama" value="{{ $pospin->saranakesehatan->nama }}">
    </div>
    </div>

    <div class="col-sm-6">
    <div class="form-group">
        <label for="nama" class="form-label">Nama Orang Tua</label>
        <input type="text" disabled readonly
            class="form-control" id="nama" value="{{ $pospin->nama_ortu}}">
    </div>
    </div>
   
    <div class="col-sm-6">
        <div class="form-group">
            <label for="rw_id" class="form-label">RW</label>
            <input type="text" disabled readonly
                class="form-control" id="nama" value="{{ $pospin->rw->rw }}">
        </div>
        </div>
    <div class="col-sm-3">
        <div class="form-group">
            <label for="rw_id" class="form-label">PIN 1</label>
            <input type="text" disabled readonly
                class="form-control" id="nama" value="{{ $pospin->pin_1 }}">
        </div>
        </div>
    <div class="col-sm-3">
        <div class="form-group">
            <label for="rw_id" class="form-label">PIN 2</label>
            <input type="text" disabled readonly
                class="form-control" id="nama" value="{{ $pospin->pin_2 }}">
        </div>
        </div>
   
        <div class="col-sm-6">
        <div class="form-group">
            <label for="district_id" class="form-label">Kecamatan</label>
            <input type="text" disabled readonly
            class="form-control" id="nama" value="{{ $pospin->district->name }}">
        </div>
        </div>
   
        <div class="col-sm-6">
        <div class="form-group">
            <label for="village_id" class="form-label">Kelurahan</label>
            <input type="text" disabled readonly
            class="form-control" id="nama" value="{{ $pospin->village->name }}">
        </div>
        </div>
   
   </div>
   </div>
   