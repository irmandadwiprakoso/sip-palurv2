<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pbb extends Model
{
    use HasFactory;
    protected $table = 'pbb';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'NOP',
        'NM_WP_SPPT',
        'TOTAL_LUAS_BUMI',
        'NJOP_BUMI_SPPT',
        'TOTAL_LUAS_BNG',
        'NJOP_BNG_SPPT',
        'ALM_OP',
        'rt_id',
        'rw_id',
        'ALM_WP',
        'PBB_TERHUTANG_SPPT',
        'TAHUN_SPPT',
        'KETERANGAN',
        'province_id',
        'regency_id',
        'district_id',
        'village_id',
    ];

    public function rt()
    {
        return $this->belongsTo(Rt::class);
    }
    public function rw()
    {
        return $this->belongsTo(Rw::class);
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
    public function kelbekasi()
    {
        return $this->belongsTo(kelbekasi::class);
    }
}
