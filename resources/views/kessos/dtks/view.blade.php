<div class="row">
 <div class="col-sm-6">
 <div class="form-group">
     <label for="id" class="form-label">NIK</label>
     <input type="text" disabled readonly
         class="form-control" id="nama" value="{{ $dtks->ktp_id }}">
 </div>
 </div>

 <div class="col-sm-6">
 <div class="form-group">
     <label for="id" class="form-label">Nama</label>
     <input type="text" disabled readonly
         class="form-control" id="nama" value="{{ $dtks->ktp->nama }}">
 </div>
 </div>


 <div class="col-sm-3">
 <div class="form-group">
     <label for="id" class="form-label">Status PKH</label>
     <input type="text" disabled readonly class="form-control" id="nama" value="{{ $dtks->PKH }}">
 </div>
 </div>
 <div class="col-sm-3">
 <div class="form-group">
     <label for="id" class="form-label">Status BPNT</label>
     <input type="text" disabled readonly class="form-control" id="nama" value="{{ $dtks->BPNT }}">
 </div>
 </div>
 <div class="col-sm-3">
 <div class="form-group">
     <label for="id" class="form-label">Status PBI</label>
     <input type="text" disabled readonly class="form-control" id="nama" value="{{ $dtks->PBI }}">
 </div>
 </div>
 <div class="col-sm-3">
 <div class="form-group">
     <label for="id" class="form-label">Status NON_BANSOS</label>
     <input type="text" disabled readonly class="form-control" id="nama" value="{{ $dtks->NON_BANSOS }}">
 </div>
 </div>


 <div class="col-sm-6">
    <div class="form-group">
        <label for="id" class="form-label">Alamat</label>
        <input type="text" disabled readonly
            class="form-control" id="nama" value="{{ $dtks->ktp->alamat }}">
    </div>
 </div>

 <div class="col-sm-3">
     <div class="form-group">
         <label for="rw_id" class="form-label">RT</label>
         <input type="text" disabled readonly
             class="form-control" id="nama" value="{{ $dtks->rt->rt }}">
     </div>
</div>

 <div class="col-sm-3">
     <div class="form-group">
         <label for="rw_id" class="form-label">RW</label>
         <input type="text" disabled readonly
             class="form-control" id="nama" value="{{ $dtks->rw->rw }}">
     </div>
     </div>

     <div class="col-sm-6">
     <div class="form-group">
         <label for="district_id" class="form-label">Kecamatan</label>
         <input type="text" disabled readonly
         class="form-control" id="nama" value="{{ $dtks->district->name }}">
     </div>
     </div>

     <div class="col-sm-6">
     <div class="form-group">
         <label for="village_id" class="form-label">Desa/Kelurahan</label>
         <input type="text" disabled readonly
         class="form-control" id="nama" value="{{ $dtks->village->name }}">
     </div>
     </div>

     <div class="col-sm-12">
     <div class="form-group">
         <label for="village_id" class="form-label">Keterangan</label>
         <input type="text" disabled readonly
         class="form-control" id="nama" value="{{ $dtks->keterangan}}">
     </div>
     </div>

</div>
</div>
