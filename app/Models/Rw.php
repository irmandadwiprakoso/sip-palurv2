<?php

namespace App\Models;

use App\Http\Controllers\SaranaPendidikanController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rw extends Model
{
    use HasFactory;
    protected $table = 'rw';
    protected $fillable = ['kode', 'rw'];

    public function SaranaIbadah()
    {
        return $this->hasMany(SaranaIbadah::class);
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
    public function user()
    {
        return $this->hasMany(User::class);
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
