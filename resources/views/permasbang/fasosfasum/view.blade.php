<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            <img class="img-fluid" alt="Responsive image" src="{{ asset('images/FasosFasum/' . $fasosfasum->foto) }}"></img>
        </div>
    </div>


 <div class="col-sm-12">
 <div class="form-group">
     <label for="nama" class="form-label">Nama</label>
     <input type="text" disabled readonly
         class="form-control" id="nama" value="{{ $fasosfasum->nama }}">
 </div>
 </div>

 <div class="col-sm-6">
 <div class="form-group">
     <label for="KK" class="form-label">Pemanfaatan</label>
     <input type="text" disabled readonly
         class="form-control" id="nama" value="{{ $fasosfasum->pemanfaatan }}">
 </div>
 </div>
 <div class="col-sm-6">
 <div class="form-group">
     <label for="KK" class="form-label">Alamat</label>
     <input type="text" disabled readonly
         class="form-control" id="nama" value="{{ $fasosfasum->alamat }}">
 </div>
 </div>

    <div class="col-sm-6">
    <div class="form-group">
        <label for="agama_id" class="form-label">RT</label>
        <input type="text" disabled readonly
            class="form-control" id="nama" value="{{ $fasosfasum->rt->rt }}">
    </div>
    </div>
   
    <div class="col-sm-6">
    <div class="form-group">
            <label for="jeniskelamin_id" class="form-label">RW</label>
            <input type="text" disabled readonly
            class="form-control" id="nama" value="{{ $fasosfasum->rw->rw }}">
    </div>
    </div>

    <div class="col-sm-6">
    <div class="form-group">
        <label for="jabatan_id" class="form-label">Kecamatan</label>
        <input type="text" disabled readonly
            class="form-control" id="nama" value="{{ $fasosfasum->district->name }}">
    </div>
    </div>
   
    <div class="col-sm-6">
    <div class="form-group">
        <label for="jabatan_id" class="form-label">Kelurahan</label>
        <input type="text" disabled readonly
            class="form-control" id="nama" value="{{ $fasosfasum->village->name }}">
    </div>
    </div>

 <div class="col-sm-6">
 <div class="form-group">
     <label for="no_rek" class="form-label">Koordinat</label>
     <input type="text" disabled readonly
         class="form-control" id="nama" value="{{ $fasosfasum->koordinat }}">
 </div>
 </div>

 <div class="col-sm-6">
 <div class="form-group">
     <label for="npwp" class="form-label">Luas</label>
     <input type="text" disabled readonly
         class="form-control" id="nama" value="{{ $fasosfasum->luas }} m2">
 </div>
 </div>

 <div class="col-sm-6">
 <div class="form-group">
     <label for="npwp" class="form-label">Nama Pengembang</label>
     <input type="text" disabled readonly
         class="form-control" id="nama" value="{{ $fasosfasum->nama_pengembang }} ">
 </div>
 </div>

 <div class="col-sm-6">
 <div class="form-group">
     <label for="npwp" class="form-label">Nama Perumahan</label>
     <input type="text" disabled readonly
         class="form-control" id="nama" value="{{ $fasosfasum->nama_perumahan }}">
 </div>
 </div>

</div>
</div>
