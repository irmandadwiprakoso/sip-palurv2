<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporanpamor extends Model
{
    use HasFactory;
    protected $table = 'laporanpamor';
    protected $fillable = [
        'tanggal',
        'kegiatan',
        'jumlah',
        'seksi_id',
        'keterangan',
        'tinjut',
        'rt_id',
        'rw_id',
        'province_id',
        'regency_id',
        'district_id',
        'village_id',
        'foto',
        'user_id',
    ];

    public function rt()
    {
        return $this->belongsTo(Rt::class);
    }
    public function rw()
    {
        return $this->belongsTo(Rw::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function province()
    {
        return $this->belongsTo(Province::class);
    }
    public function regency()
    {
        return $this->belongsTo(Regency::class);
    }
    public function district()
    {
        return $this->belongsTo(District::class);
    }
    public function village()
    {
        return $this->belongsTo(Village::class);
    }
    public function seksi()
    {
        return $this->belongsTo(Seksi::class);
    }
    public function kelbekasi()
    {
        return $this->belongsTo(kelbekasi::class);
    }
}
