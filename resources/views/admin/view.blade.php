<div class="row">

 <div class="col-sm-6">
 <div class="form-group">
     <label for="nama" class="form-label">Nama</label>
     <input type="text" disabled readonly
         class="form-control" id="nama" value="{{ $user->name }}">
 </div>
 </div>

 <div class="col-sm-6">
 <div class="form-group">
     <label for="id" class="form-label">Username</label>
     <input type="text" disabled readonly
         class="form-control" id="nama" value="{{ $user->username }}">
 </div>
 </div>

 <div class="col-sm-6">
 <div class="form-group">
     <label for="email" class="form-label">Email</label>
     <input type="text" disabled readonly
         class="form-control" id="nama" value="{{ $user->email }}">
 </div>
 </div>

     <div class="col-sm-6">
     <div class="form-group">
         <label for="rw_id" class="form-label">RW</label>
         <input type="text" disabled readonly
             class="form-control" id="nama" value="{{ $user->rw->rw }}">
     </div>
     </div>

     <div class="col-sm-6">
     <div class="form-group">
         <label for="district_id" class="form-label">Kecamatan</label>
         <input type="text" disabled readonly
         class="form-control" id="nama" value="{{ $user->district->name }}">
     </div>
     </div>

     <div class="col-sm-6">
     <div class="form-group">
         <label for="village_id" class="form-label">Kelurahan</label>
         <input type="text" disabled readonly
         class="form-control" id="nama" value="{{ $user->village->name }}">
     </div>
     </div>

</div>
</div>
