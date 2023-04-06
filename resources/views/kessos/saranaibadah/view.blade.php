<div class="row">
<div class="col-sm-12">
    <div class="form-group">
        <img class="img-fluid" alt="Responsive image" src="{{ asset('images/SaranaIbadah/'.$saranaibadah->foto)}}"></img>
    </div>
</div>

 <div class="col-sm-12">
 <div class="form-group">
     <label for="nama" class="form-label">Nama Sarana Ibadah</label>
     <input type="text" disabled readonly
         class="form-control" id="nama" value="{{ $saranaibadah->nama }}">
 </div>
 </div>

 <div class="col-sm-6">
 <div class="form-group">
     <label for="id" class="form-label">Nama Pimpinan Sarana Ibadah</label>
     <input type="text" disabled readonly
         class="form-control" id="nama" value="{{ $saranaibadah->ktp->nama }}">
 </div>
 </div>

 <div class="col-sm-6">
 <div class="form-group">
     <label for="id" class="form-label">NIK Pimpinan Sarana Ibadah</label>
     <input type="text" disabled readonly
         class="form-control" id="nama" value="{{ $saranaibadah->ktp_id }}">
 </div>
 </div>

 <div class="col-sm-6">
 <div class="form-group">
     <label for="KK" class="form-label">Tipe Sarana Ibadah</label>
     <input type="text" disabled readonly
         class="form-control" id="nama" value="{{ $saranaibadah->tipeibadah->tipeibadah }}">
 </div>
 </div>

 <div class="col-sm-6">
 <div class="form-group">
     <label for="tempat_lahir" class="form-label">Status Tanah Sarana Ibadah</label>
     <input type="text" disabled readonly
         class="form-control" id="nama" value="{{ $saranaibadah->statustanah->statustanah }}">
 </div>
 </div>

 <div class="col-sm-6">
 <div class="form-group">
     <label for="tanggal_lahir" class="form-label">Nomor SK</label>
     <input type="text" disabled readonly
         class="form-control" id="nama" value="{{ $saranaibadah->no_SK }}">
 </div>
 </div>

 <div class="col-sm-6">
 <div class="form-group">
     <label for="tanggal_lahir" class="form-label">Kontak PIC</label>
     <input type="text" disabled readonly
         class="form-control" id="nama" value="{{ $saranaibadah->no_HP }}">
 </div>
 </div>
 <div class="col-sm-12">
 <div class="form-group">
     <label for="tanggal_lahir" class="form-label">Alamat</label>
     <input type="text" disabled readonly
         class="form-control" id="nama" value="{{ $saranaibadah->alamat }}">
 </div>
 </div>

 <div class="col-sm-6">
     <div class="form-group">
         <label for="rw_id" class="form-label">RT</label>
         <input type="text" disabled readonly
             class="form-control" id="nama" value="{{ $saranaibadah->rt->rt }}">
     </div>
     </div>

 <div class="col-sm-6">
     <div class="form-group">
         <label for="rw_id" class="form-label">RW</label>
         <input type="text" disabled readonly
             class="form-control" id="nama" value="{{ $saranaibadah->rw->rw }}">
     </div>
     </div>

     <div class="col-sm-6">
     <div class="form-group">
         <label for="district_id" class="form-label">Kecamatan</label>
         <input type="text" disabled readonly
         class="form-control" id="nama" value="{{ $saranaibadah->district->name }}">
     </div>
     </div>

     <div class="col-sm-6">
     <div class="form-group">
         <label for="village_id" class="form-label">Kelurahan</label>
         <input type="text" disabled readonly
         class="form-control" id="nama" value="{{ $saranaibadah->village->name }}">
     </div>
     </div>

</div>
</div>
