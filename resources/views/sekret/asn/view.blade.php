<div class="row">
    <div class="card-body box-profile">
    <div class="text-center">
    <img class="profile-user-img img-fluid img-circle" 
    src="{{ asset('images/Asn/' . $asn->foto) }}" alt="picture"></img>
    </div>
    </div>

 <div class="col-sm-12">
 <div class="form-group">
     <label for="nama" class="form-label">Nama</label>
     <input type="text" disabled readonly
         class="form-control" id="nama" value="{{ $asn->nama }}">
 </div>
 </div>

 <div class="col-sm-6">
 <div class="form-group">
     <label for="id" class="form-label">NIK</label>
     <input type="text" disabled readonly
         class="form-control" id="nama" value="{{ $asn->NIK }}">
 </div>
 </div>

 <div class="col-sm-6">
 <div class="form-group">
     <label for="KK" class="form-label">NIP</label>
     <input type="text" disabled readonly
         class="form-control" id="nama" value="{{ $asn->id }}">
 </div>
 </div>

 <div class="col-sm-3">
 <div class="form-group">
     <label for="KK" class="form-label">Pangkat</label>
     <input type="text" disabled readonly
         class="form-control" id="nama" value="{{ $asn->pangkat->pangkat }}">
 </div>
 </div>

 <div class="col-sm-3">
 <div class="form-group">
     <label for="KK" class="form-label">Golongan</label>
     <input type="text" disabled readonly
         class="form-control" id="nama" value="{{ $asn->golongan->golongan }}">
 </div>
 </div>

 <div class="col-sm-6">
    <div class="form-group">
        <label for="jabatan_id" class="form-label">Jabatan</label>
        <input type="text" disabled readonly
            class="form-control" id="nama" value="{{ $asn->jabatan->jabatan }}">
    </div>
    </div>
   
    <div class="col-sm-6">
    <div class="form-group">
        <label for="jabatan_id" class="form-label">Kecamatan</label>
        <input type="text" disabled readonly
            class="form-control" id="nama" value="{{ $asn->district->name }}">
    </div>
    </div>
   
    <div class="col-sm-6">
    <div class="form-group">
        <label for="jabatan_id" class="form-label">Kelurahan</label>
        <input type="text" disabled readonly
            class="form-control" id="nama" value="{{ $asn->village->name }}">
    </div>
    </div>
    
 <div class="col-sm-4">
    <div class="form-group">
        <label for="SK_asn" class="form-label">SK Jabatan</label>
        <input type="text" disabled readonly
            class="form-control" id="nama" value="{{ $asn->SK_Jabatan }}">
    </div>
    </div>

 <div class="col-sm-4">
 <div class="form-group">
     <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
     <input type="text" disabled readonly
         class="form-control" id="nama" value="{{ $asn->tempat_lahir }}">
 </div>
 </div>

 <div class="col-sm-4">
 <div class="form-group">
     <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
     <input type="text" disabled readonly
         class="form-control" id="nama" value="{{ $asn->tanggal_lahir }}">
 </div>
 </div>

 <div class="col-sm-12">
 <div class="form-group">
     <label for="alamat" class="form-label">Alamat</label>
     <input type="text" disabled readonly
         class="form-control" id="nama" value="{{ $asn->alamat }}">
 </div>
 </div>

 <div class="col-sm-3">
 <div class="form-group">
     <label for="agama_id" class="form-label">Agama</label>
     <input type="text" disabled readonly
         class="form-control" id="nama" value="{{ $asn->agama->agama }}">
 </div>
 </div>

     <div class="col-sm-3">
     <div class="form-group">
         <label for="jeniskelamin_id" class="form-label">Jenis Kelamin</label>
         <input type="text" disabled readonly
         class="form-control" id="nama" value="{{ $asn->jeniskelamin->jeniskelamin }}">
     </div>
     </div>

 <div class="col-sm-3">
 <div class="form-group">
     <label for="pendidikan_id" class="form-label">Pendidikan</label>
     <input type="text" disabled readonly
         class="form-control" id="nama" value="{{ $asn->pendidikan->pendidikan }}">
 </div>
 </div>

 <div class="col-sm-3">
 <div class="form-group">
     <label for="statuskawin_id" class="form-label">Status Kawin</label>
     <input type="text" disabled readonly
         class="form-control" id="nama" value="{{ $asn->statuskawin->statuskawin }}">
 </div>
 </div>

 <div class="col-sm-3">
 <div class="form-group">
     <label for="no_rek" class="form-label">Nomor Rekening BJB</label>
     <input type="text" disabled readonly
         class="form-control" id="nama" value="{{ $asn->no_rek }}">
 </div>
 </div>

 <div class="col-sm-3">
 <div class="form-group">
     <label for="npwp" class="form-label">NPWP</label>
     <input type="text" disabled readonly
         class="form-control" id="nama" value="{{ $asn->npwp }}">
 </div>
 </div>

 <div class="col-sm-3">
 <div class="form-group">
     <label for="email" class="form-label">Email</label>
     <input type="text" disabled readonly
         class="form-control" id="nama" value="{{ $asn->email }}">
 </div>
 </div>

 <div class="col-sm-3">
 <div class="form-group">
     <label for="no_HP" class="form-label">Nomor Handphone</label>
     <input type="text" disabled readonly
         class="form-control" id="nama" value="{{ $asn->no_HP }}">
 </div>
 </div>

</div>
</div>
