<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Galeri extends Model
{
    use HasFactory;

    protected $table = 'galeris';

    protected $fillable = [
        'id',
        'title',
        'kd_unor',
        'desc',
        'slug',
        'img',
        'hit',
        'publish_date',
        'published',
        'galeri_kategori_id',
        'publishedby',
        'creatorid',
        'createdby',
        'modifiedby',
        'modifierid',
        'created_at',
        'updated_at'
    ];


    public function kategoriGaleri()
    {
        return $this->belongsTo('KategoriGaleri');
    }

    public function latest($take=4,$where=null){
        $option = [];

        $option[] = ['published','=','yes'];

        if($where){
            $option[] = $where;
        }

        return DB::table($this->table)
                ->where($option)
                ->select("*")
                ->orderBy('created_at','DESC')
                ->skip(0)
                ->take($take)
                ->get();
    }

}



