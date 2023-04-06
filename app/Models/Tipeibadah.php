<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipeibadah extends Model
{
    use HasFactory;
    protected $table = 'tipeibadah';
    protected $fillable = ['kode', 'tipeibadah'];
    
    public function SaranaIbadah()
    {
        return $this->hasMany(SaranaIbadah::class);
    }
}
