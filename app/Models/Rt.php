<?php

namespace App\Models;

use App\Http\Controllers\LaporanharianController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rt extends Model
{
    use HasFactory;
    protected $table = 'rt';
    protected $fillable = ['kode', 'rt'];

    public function saranabadah()
    {
        return $this->hasMany(Saranaibadah::class);
    }
    public function SaranaPendidikan()
    {
        return $this->hasMany(SaranaPendidikan::class);
    }
    public function SaranaKesehatan()
    {
        return $this->hasMany(SaranaKesehatan::class);
    }
    public function ktp()
    {
        return $this->hasMany(Ktp::class);
    }
    public function tkk()
    {
        return $this->hasMany(Tkk::class);
    }
    public function kependudukan()
    {
        return $this->hasMany(Kependudukan::class);
    }
    public function ksbrt()
    {
        return $this->hasMany(Ksbrt::class);
    }
    public function ksbrw()
    {
        return $this->hasMany(Ksbrw::class);
    }
    public function fasosfasum()
    {
        return $this->hasMany(Fasosfasum::class);
    }
    public function covid19()
    {
        return $this->hasMany(Covid19::class);
    }
    public function pbb()
    {
        return $this->hasMany(Pbb::class);
    }
    public function laporanpamor()
    {
        return $this->hasMany(Laporanpamor::class);
    }
    public function dtks()
    {
        return $this->hasMany(Dtks::class);
    }
    public function posyandu()
    {
        return $this->hasMany(Posyandu::class);
    }
    public function dtksnondtks()
    {
        return $this->hasMany(Dtksnondtks::class);
    }
    public function pospin()
    {
        return $this->hasMany(Pospin::class);
    }
}
