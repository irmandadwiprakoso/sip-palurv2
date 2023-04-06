<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Asn extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'asn';
    protected $fillable = [
        'id',
        'NIK', 'nama', 'pangkat_id',
        'golongan_id', 'jabatan_id', 'tempat_lahir',
        'tanggal_lahir', 'jeniskelamin_id',
        'alamat', 'agama_id', 'pendidikan_id', 'statuskawin_id', 'district_id', 'village_id',
        'SK_Jabatan', 'no_rek', 'npwp', 'email', 'no_HP', 'foto', 'tipe_pns'
    ];

    public function pangkat()
    {
        return $this->belongsTo(Pangkat::class);
    }
    public function golongan()
    {
        return $this->belongsTo(Golongan::class);
    }
    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }
    public function agama()
    {
        return $this->belongsTo(Agama::class);
    }
    public function jeniskelamin()
    {
        return $this->belongsTo(Jeniskelamin::class);
    }
    public function pendidikan()
    {
        return $this->belongsTo(Pendidikan::class);
    }
    public function statuskawin()
    {
        return $this->belongsTo(Statuskawin::class);
    }
    public function province()
    {
        return $this->belongsTo(Province::class);
    }
    public function regency()
    {
        return $this->belongsTo(Regency::class);
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
