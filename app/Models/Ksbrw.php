<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ksbrw extends Model
{
    use HasFactory;
    protected $table = 'ksbrw';
    protected $fillable = [
        'ktp_id',
        'jabatan_id',
        'rw_id',
        'no_sk',
        'tmt_mulai',
        'tmt_akhir',
        'no_hp',
        'no_rek',
        'npwp',
        'province_id',
        'regency_id',
        'district_id',
        'village_id',
    ];

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
