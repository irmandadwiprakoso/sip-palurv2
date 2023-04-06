<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ksbrt extends Model
{
    use HasFactory;
    protected $table = 'ksbrt';
    protected $fillable = [
        'ktp_id',
        'jabatan_id',
        'rt_id',
        'rw_id',
        'no_sk',
        'tmt_mulai',
        'tmt_akhir',
        'no_hp',
        'no_rek',
        'npwp',
        'district_id',
        'village_id',
        'regency_id',
        'province_id',
    ];

    public function rt()
    {
        return $this->belongsTo(Rt::class);
    }
    public function rw()
    {
        return $this->belongsTo(Rw::class);
    }
    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }
    public function ktp()
    {
        return $this->belongsTo(Ktp::class);
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
