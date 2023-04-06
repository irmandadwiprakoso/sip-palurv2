 <div class="row">
 <div class="col-sm-6">
 <div class="form-group">
     <label for="nama" class="form-label">Nama</label>
     <input type="text" disabled readonly
         class="form-control" id="nama" value="{{ $ksbrt->ktp->nama }}">
 </div>
 </div>

 <div class="col-sm-6">
 <div class="form-group">
     <label for="nama" class="form-label">NIK</label>
     <input type="text" disabled readonly
         class="form-control" id="nama" value="{{ $ksbrt->ktp_id }}">
 </div>
 </div>

 <div class="col-sm-6">
 <div class="form-group">
     <label for="jabatan_id" class="form-label">Jabatan</label>
     <input type="text" disabled readonly
         class="form-control" id="nama" value="{{ $ksbrt->jabatan->jabatan }}">
 </div>
 </div>

 <div class="col-sm-6">
 <div class="form-group">
     <label for="no+sk" class="form-label">SK KSBRT</label>
     <input type="text" disabled readonly
         class="form-control" id="nama" value="{{ $ksbrt->no_sk }}">
 </div>
 </div>

 <div class="col-sm-6">
    <div class="form-group">
        <label for="no+sk" class="form-label">TMT Awal</label>
        <input type="text" disabled readonly
            class="form-control" id="nama" value="{{ $ksbrt->tmt_mulai }}">
    </div>
    </div>

    <div class="col-sm-6">
    <div class="form-group">
        <label for="no+sk" class="form-label">TMT Akhir</label>
        <input type="text" disabled readonly
            class="form-control" id="nama" value="{{ $ksbrt->tmt_akhir }}">
    </div>
    </div>

 <div class="col-sm-6">
 <div class="form-group">
     <label for="no_rek" class="form-label">Nomor Rekening BJB</label>
     <input type="text" disabled readonly
         class="form-control" id="nama" value="{{ $ksbrt->no_rek }}">
 </div>
 </div>

 <div class="col-sm-6">
 <div class="form-group">
     <label for="npwp" class="form-label">NPWP</label>
     <input type="text" disabled readonly
         class="form-control" id="nama" value="{{ $ksbrt->npwp }}">
 </div>
 </div>

 <div class="col-sm-6">
 <div class="form-group">
     <label for="no_hp" class="form-label">Nomor Handphone</label>
     <input type="text" disabled readonly
         class="form-control" id="nama" value="{{ $ksbrt->no_hp }}">
 </div>
 </div>

 <div class="col-sm-3">
     <div class="form-group">
         <label for="rt_id" class="form-label">RT</label>
         <input type="text" disabled readonly
             class="form-control" id="nama" value="{{ $ksbrt->rt->rt }}">
     </div>
     </div>

 <div class="col-sm-3">
     <div class="form-group">
         <label for="rw_id" class="form-label">RW</label>
         <input type="text" disabled readonly
             class="form-control" id="nama" value="{{ $ksbrt->rw->rw }}">
     </div>
     </div>

     <div class="col-sm-6">
     <div class="form-group">
         <label for="district_id" class="form-label">Kecamatan</label>
         <input type="text" disabled readonly
         class="form-control" id="nama" value="{{ $ksbrt->district->name }}">
     </div>
     </div>

     <div class="col-sm-6">
     <div class="form-group">
         <label for="village_id" class="form-label">Desa/Kelurahan</label>
         <input type="text" disabled readonly
         class="form-control" id="nama" value="{{ $ksbrt->village->name }}">
     </div>
     </div>

</div>
</div>
