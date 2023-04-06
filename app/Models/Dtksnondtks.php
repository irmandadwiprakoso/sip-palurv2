<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dtksnondtks extends Model
{
    use HasFactory;
    protected $table = 'dtksnondtks';
    protected $fillable = [
        'ktp_id',
        'pkh',
        'pbi',
        'non_bansos',
        'bpnt',
        'rt_id',
        'rw_id',
        'district_id',
        'village_id',
        'keterangan',
    ];

    public function rt()
    {
        return $this->belongsTo(Rt::class);
    }
    public function rw()
    {
        return $this->belongsTo(Rw::class);
    }
    public function ktp()
    {
        return $this->belongsTo(Ktp::class);
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
