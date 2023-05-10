<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statustanah extends Model
{
    use HasFactory;
    protected $table = 'statustanah';
    protected $fillable = ['kode', 'statustanah'];
    
    public function SaranaIbadah()
    {
        return $this->hasMany(Saranaibadah::class);
    }
    public function SaranaPendidikan()
    {
        return $this->hasMany(Saranapendidikan::class);
    }
    public function saranakesehatan()
    {
        return $this->hasMany(saranakesehatan::class);
    }
    public function namaposyandu()
    {
        return $this->hasMany(Namaposyandu::class);
    }
}
