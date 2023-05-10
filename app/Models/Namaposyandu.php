<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Namaposyandu extends Model
{
    use HasFactory;
    protected $table = 'namaposyandu';
    protected $primarykey = 'id';
    protected $fillable = 
    ['nama', 
     'tipekesehatan_id',
     'statustanah_id', 
     'nama_pimpinan',
     'alamat', 
     'rt_id', 
     'rw_id', 
     'district_id', 
     'village_id', 
     'no_HP', 
     'keterangan', 
     'foto'
    ];

    public function tipekesehatan()
    {
        return $this->belongsTo(Tipekesehatan::class);
    }
    public function statustanah()
    {
        return $this->belongsTo(Statustanah::class);
    }
    public function rt()
    {
        return $this->belongsTo(Rt::class);
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
    public function pospin()
    {
        return $this->hasMany(Pospin::class);
    }
    public function posyandu()
    {
        return $this->hasMany(Posyandu::class);
    }
    public function namaposyandu()
    {
        return $this->hasMany(Namaposyandu::class);
    }
}
