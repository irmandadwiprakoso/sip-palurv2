<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saranaibadah extends Model
{
    use HasFactory;
    protected $table = 'saranaibadah';
    protected $primarykey = 'id';
    protected $fillable = 
    ['nama', 
     'tipeibadah_id',
     'statustanah_id', 
     'ktp_id',
     'alamat', 
     'rt_id', 
     'rw_id', 
     'district_id', 
     'village_id', 
     'no_SK', 
     'no_HP',  
     'foto'
    ];

    public function tipeibadah()
    {
        return $this->belongsTo(Tipeibadah::class);
    }
    public function statustanah()
    {
        return $this->belongsTo(Statustanah::class);
    }
    public function rt()
    {
        return $this->belongsTo(Rt::class);
    }
    public function ktp()
    {
        return $this->belongsTo(Ktp::class);
    }
    public function rw()
    {
        return $this->belongsTo(Rw::class);
    }
    public function District()
    {
        return $this->belongsTo(District::class);
    }
    public function Province()
    {
        return $this->belongsTo(Province::class);
    }
    public function Regency()
    {
        return $this->belongsTo(Regency::class);
    }
    public function Village()
    {
        return $this->belongsTo(Village::class);
    }

}
