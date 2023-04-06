<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipekesehatan extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'tipekesehatan';
    protected $fillable = ['kode', 'tipekesehatan'];
    
    public function SaranaKesehatan()
    {
        return $this->hasMany(SaranaKesehatan::class);
    }
}
