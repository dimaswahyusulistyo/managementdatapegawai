<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jeniskelamin extends Model
{
    use HasFactory;

    protected $table = 'jeniskelamin';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'jeniskelamin'
    ];
}
