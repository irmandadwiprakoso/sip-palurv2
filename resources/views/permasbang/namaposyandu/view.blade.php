<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            <img class="img-fluid" alt="Responsive image" src="{{ asset('images/SaranaKesehatan/' . $namaposyandu->foto) }}"></img>
        </div>
    </div>

 <div class="col-sm-12">
 <div class="form-group">
     <label for="nama" class="form-label">Nama Sarana Pendidikan</label>
     <input type="text" disabled readonly
         class="form-control" id="nama" value="{{ $namaposyandu->nama }}">
 </div>
 </div>

 <div class="col-sm-6">
 <div class="form-group">
     <label for="id" class="form-label">Nama Pimpinan Sarana Pendidikan</label>
     <input type="text" disabled readonly
         class="form-control" id="nama" value="{{ $namaposyandu->nama_pimpinan }}">
 </div>
 </div>

 <div class="col-sm-6">
 <div class="form-group">
     <label for="KK" class="form-label">Tipe Sarana Pendidikan</label>
     <input type="text" disabled readonly
         class="form-control" id="nama" value="{{ $namaposyandu->tipekesehatan->tipekesehatan }}">
 </div>
 </div>

 <div class="col-sm-6">
 <div class="form-group">
     <label for="tempat_lahir" class="form-label">Status Tanah Sarana Pendidikan</label>
     <input type="text" disabled readonly
         class="form-control" id="nama" value="{{ $namaposyandu->statustanah->statustanah }}">
 </div>
 </div>

 <div class="col-sm-6">
 <div class="form-group">
     <label for="tanggal_lahir" class="form-label">Kontak PIC</label>
     <input type="text" disabled readonly
         class="form-control" id="nama" value="{{ $namaposyandu->no_HP }}">
 </div>
 </div>

 <div class="col-sm-12">
 <div class="form-group">
     <label for="tanggal_lahir" class="form-label">Alamat</label>
     <input type="text" disabled readonly
         class="form-control" id="nama" value="{{ $namaposyandu->alamat }}">
 </div>
 </div>

 <div class="col-sm-12">
 <div class="form-group">
     <label for="tanggal_lahir" class="form-label">Jumlah Bayi</label>
     <input type="text" disabled readonly
         class="form-control" id="nama" value="{{ $namaposyandu->keterangan }}">
 </div>
 </div>

 <div class="col-sm-6">
     <div class="form-group">
         <label for="rw_id" class="form-label">RT</label>
         <input type="text" disabled readonly
             class="form-control" id="nama" value="{{ $namaposyandu->rt->rt }}">
     </div>
     </div>

 <div class="col-sm-6">
     <div class="form-group">
         <label for="rw_id" class="form-label">RW</label>
         <input type="text" disabled readonly
             class="form-control" id="nama" value="{{ $namaposyandu->rw->rw }}">
     </div>
     </div>

     <div class="col-sm-6">
     <div class="form-group">
         <label for="district_id" class="form-label">Kecamatan</label>
         <input type="text" disabled readonly
         class="form-control" id="nama" value="{{ $namaposyandu->district->name }}">
     </div>
     </div>

     <div class="col-sm-6">
     <div class="form-group">
         <label for="village_id" class="form-label">Kelurahan</label>
         <input type="text" disabled readonly
         class="form-control" id="nama" value="{{ $namaposyandu->village->name }}">
     </div>
     </div>

</div>
</div>
