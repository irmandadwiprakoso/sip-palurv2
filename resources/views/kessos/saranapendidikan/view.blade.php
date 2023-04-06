<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            <img class="img-fluid" alt="Responsive image" src="{{ asset('images/SaranaPendidikan/'.$saranapendidikan->foto)}}"></img>
        </div>
    </div>

 <div class="col-sm-12">
 <div class="form-group">
     <label for="nama" class="form-label">Nama Sarana Pendidikan</label>
     <input type="text" disabled readonly
         class="form-control" id="nama" value="{{ $saranapendidikan->nama }}">
 </div>
 </div>

 <div class="col-sm-6">
 <div class="form-group">
     <label for="id" class="form-label">Nama Pimpinan Sarana Pendidikan</label>
     <input type="text" disabled readonly
         class="form-control" id="nama" value="{{ $saranapendidikan->nama_pimpinan }}">
 </div>
 </div>

 <div class="col-sm-6">
 <div class="form-group">
     <label for="KK" class="form-label">Tipe Sarana Pendidikan</label>
     <input type="text" disabled readonly
         class="form-control" id="nama" value="{{ $saranapendidikan->tipependidikan->tipependidikan }}">
 </div>
 </div>

 <div class="col-sm-6">
 <div class="form-group">
     <label for="tempat_lahir" class="form-label">Status Tanah Sarana Pendidikan</label>
     <input type="text" disabled readonly
         class="form-control" id="nama" value="{{ $saranapendidikan->statustanah->statustanah }}">
 </div>
 </div>

 <div class="col-sm-6">
 <div class="form-group">
     <label for="tanggal_lahir" class="form-label">Kontak PIC</label>
     <input type="text" disabled readonly
         class="form-control" id="nama" value="{{ $saranapendidikan->no_HP }}">
 </div>
 </div>
 <div class="col-sm-12">
 <div class="form-group">
     <label for="tanggal_lahir" class="form-label">Alamat</label>
     <input type="text" disabled readonly
         class="form-control" id="nama" value="{{ $saranapendidikan->alamat }}">
 </div>
 </div>

 <div class="col-sm-6">
     <div class="form-group">
         <label for="rw_id" class="form-label">RT</label>
         <input type="text" disabled readonly
             class="form-control" id="nama" value="{{ $saranapendidikan->rt->rt }}">
     </div>
     </div>

 <div class="col-sm-6">
     <div class="form-group">
         <label for="rw_id" class="form-label">RW</label>
         <input type="text" disabled readonly
             class="form-control" id="nama" value="{{ $saranapendidikan->rw->rw }}">
     </div>
     </div>

     <div class="col-sm-6">
     <div class="form-group">
         <label for="district_id" class="form-label">Kecamatan</label>
         <input type="text" disabled readonly
         class="form-control" id="nama" value="{{ $saranapendidikan->district->name }}">
     </div>
     </div>

     <div class="col-sm-6">
     <div class="form-group">
         <label for="village_id" class="form-label">Desa/Kelurahan</label>
         <input type="text" disabled readonly
         class="form-control" id="nama" value="{{ $saranapendidikan->village->name }}">
     </div>
     </div>

</div>
</div>
