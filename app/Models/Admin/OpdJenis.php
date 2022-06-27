<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpdJenis extends Model
{
    use HasFactory;

    protected $table = 'opd_jenis';

    protected $fillable = [
        'nama',
        'slug',
        'no_hp',
        'keterangan',
        'created_by',
        'updated_at',
        'updated_by'
    ];


    public $timestamps = false;
}
