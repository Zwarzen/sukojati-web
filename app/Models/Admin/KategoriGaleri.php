<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class KategoriGaleri extends Model
{
    use HasFactory;

    protected $table = 'galeri_kategoris';

    protected $fillable = [
        'id',
        'name',
        'creatorid',
        'createdby',
        'modifiedby',
        'modifierid',
        'created_at',
        'updated_at'
    ];

    public function galeris()
    {
        return $this->hasMany('Galeri');
    }

    // public $timestamps = false;
    public function getMainKategori()
    {
        $data = DB::select("
            SELECT 
                a.*,
                b.id AS id_galeri,
                b.title,
                b.desc,
                b.slug,
                b.img_raw,
                b.img_thumb,
                b.hit,
                b.publish_date
            FROM 
                galeri_kategoris a
            LEFT JOIN
                (SELECT * FROM galeris WHERE published = 'yes' ORDER BY hit DESC) b 
                ON a.id = b.galeri_kategori_id             
            GROUP BY a.id
            ORDER BY b.hit DESC, a.`name`           
        ");
        return $data;
    }
}
