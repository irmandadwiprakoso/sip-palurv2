<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            <img class="img-fluid" alt="Responsive image" src="{{ asset('images/LaporanHarian/' . $laporanpamor->foto) }}"></img>
        </div>
    </div>

 <div class="col-sm-12">
 <div class="form-group">
     <label for="nama" class="form-label">Nama Pamor</label>
     <input type="text" disabled readonly
         class="form-control" id="name" value="{{ $laporanpamor->user->name }}">
 </div>
 </div>

 <div class="col-sm-6">
 <div class="form-group">
     <label for="id" class="form-label">Tanggal Kegiatan</label>
     <input type="text" disabled readonly
         class="form-control" id="tanggal" value="{{ $laporanpamor->tanggal }}">
 </div>
 </div>

 <div class="col-sm-3">
 <div class="form-group">
     <label for="KK" class="form-label">Jumlah Kegiatan</label>
     <input type="text" disabled readonly
         class="form-control" id="jumlah" value="{{ $laporanpamor->jumlah }}">
 </div>
 </div>

 <div class="col-sm-3">
 <div class="form-group">
     <label for="seksi" class="form-label">Bidang</label>
     <input type="text" disabled readonly
         class="form-control" id="seksi" value="{{ $laporanpamor->seksi->seksi }}">
 </div>
 </div>

 <div class="col-sm-12">
 <div class="form-group">
     <label for="kegiatan" class="form-label">Kegiatan</label>
     <input type="text" disabled readonly
         class="form-control" id="kegiatan" value="{{ $laporanpamor->kegiatan }}">
 </div>
 </div>

 <div class="col-sm-12">
 <div class="form-group">
     <label for="keterangan" class="form-label">Keterangan</label>
     <input type="text" disabled readonly
         class="form-control" id="keterangan" value="{{ $laporanpamor->keterangan }}">
 </div>
 </div>

 <div class="col-sm-12">
 <div class="form-group">
     <label for="tinjut" class="form-label">Tindak Lanjut</label>
     <input type="text" disabled readonly
         class="form-control" id="tinjut" value="{{ $laporanpamor->tinjut }}">
 </div>
 </div>

 <div class="col-sm-4">
 <div class="form-group">
     <label for="rt" class="form-label">RT</label>
     <input type="text" disabled readonly
         class="form-control" id="rt" value="{{ $laporanpamor->rt->rt }}">
 </div>
 </div>

 <div class="col-sm-4">
 <div class="form-group">
     <label for="RW" class="form-label">RW</label>
     <input type="text" disabled readonly
         class="form-control" id="rw" value="{{ $laporanpamor->rw->rw }}">
 </div>
 </div>

 <div class="col-sm-4">
 <div class="form-group">
     <label for="RW" class="form-label">Kelurahan</label>
     <input type="text" disabled readonly
         class="form-control" id="rw" value="{{ $laporanpamor->village->name }}">
 </div>
 </div>

</div>
</div>
