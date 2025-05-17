<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawai';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'nama_pegawai',
        'nik',
        'jenispegawai',
        'statuspegawai',
        'unit',
        'subunit',
        'pendidikan',
        'tanggallahir',
        'tempatlahir',
        'jeniskelamin',
        'agama',
        'foto',
    ];  

    public function agama()
    {
        return $this->belongsTo(Agama::class, 'agama');
    }

    public function jenispegawai()
    {
        return $this->belongsTo(Jenispegawai::class, 'jenispegawai');
    }

    public function statuspegawai()
    {
        return $this->belongsTo(Statuspegawai::class, 'statuspegawai');
    }

    public function pendidikan()
    {
        return $this->belongsTo(Pendidikan::class, 'pendidikan');
    }

    public function jeniskelamin()
    {
        return $this->belongsTo(Jeniskelamin::class, 'jeniskelamin');
    }
}

