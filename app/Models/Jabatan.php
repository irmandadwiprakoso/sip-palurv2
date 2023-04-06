<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;
    protected $table = 'jabatan';
    protected $fillable = ['kode', 'jabatan'];
    
    public function tkk()
    {
        return $this->hasMany(Tkk::class);
    }
    public function asn()
    {
        return $this->hasMany(Asn::class);
    }
    public function ktp()
    {
        return $this->hasMany(Ktp::class);
    }
    public function ksbrt()
    {
        return $this->hasMany(Ksbrt::class);
    }
    public function ksbrw()
    {
        return $this->hasMany(Ksbrw::class);
    }
    public function pkk()
    {
        return $this->hasMany(Pkk::class);
    }
    public function posyandu()
    {
        return $this->hasMany(Posyandu::class);
    }
}
