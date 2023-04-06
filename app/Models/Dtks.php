<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dtks extends Model
{
    use HasFactory;
    protected $table = 'dtks';
    protected $primaryKey = 'id';
    protected $fillable = [
        'ktp_id',
        'pkh',
        'bpnt',
        'pbi',
        'non_bansos',
        'rt_id',
        'rw_id',
        'district_id',
        'village_id',
        'keterangan',
    ];

    public function ktp()
    {
        return $this->belongsTo(Ktp::class);
    }
    public function rt()
    {
        return $this->belongsTo(Rt::class);
    }
    public function rw()
    {
        return $this->belongsTo(Rw::class);
    }
    public function district()
    {
        return $this->belongsTo(District::class);
    }
    public function village()
    {
        return $this->belongsTo(Village::class);
    }
}
