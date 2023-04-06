<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ktp extends Model
{
    use HasFactory;
    protected $table = 'ktp';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'KK',
        'hubkeluarga_id',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'rt_id',
        'rw_id',
        'province_id',
        'regency_id',
        'district_id',
        'village_id',
        'agama_id',
        'statuskawin_id',
        'jeniskelamin_id',
        'pekerjaan_id',
    ];

    public function agama()
    {
        return $this->belongsTo(Agama::class);
    }
    public function jeniskelamin()
    {
        return $this->belongsTo(Jeniskelamin::class);
    }
    public function statuskawin()
    {
        return $this->belongsTo(Statuskawin::class);
    }
    public function rt()
    {
        return $this->belongsTo(Rt::class);
    }
    public function rw()
    {
        return $this->belongsTo(Rw::class);
    }
    public function ksbrt()
    {
        return $this->hasMany(Ksbrt::class);
    }
    public function ksbrw()
    {
        return $this->hasMany(Ksbrw::class);
    }

    public function pekerjaan()
    {
        return $this->belongsTo(Pekerjaan::class);
    }
    public function hubkeluarga()
    {
        return $this->belongsTo(Hubkeluarga::class);
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
    public function posyandu()
    {
        return $this->hasMany(Posyandu::class);
    }
    public function pkk()
    {
        return $this->hasMany(Pkk::class);
    }
    public function dtksnondtks()
    {
        return $this->hasMany(dtksnondtks::class);
    }
}
