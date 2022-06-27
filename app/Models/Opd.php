<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opd extends Model
{
    use HasFactory;

    protected $table = 'opd';

    protected $fillable = [
        'nama',
        'alamat',
        'no_hp',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by'
    ];

    public $timestamps = false;
}
