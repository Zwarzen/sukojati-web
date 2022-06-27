<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB; 

class BeritaFotoItem extends Model
{
    use HasFactory;
    public $table = 'beritafoto_items';
    public $table_beritafoto = 'beritafotos';

    protected $fillable = [
        'id',
        'title',
        'slug',
        'img_thumb',
        'img_raw',
        'img_desc',
        'beritafotos_id',
        'creatorid',
        'createdby',
        'modifiedby',
        'modifierid',
        'created_at',
        'updated_at'
    ];


    public function list($where){
        $option = [];

        if($where){
            $option[] = $where;
        }else{
            $where="";
        }



        return DB::table($this->table)
                ->where($option)
                ->orderBy('created_at','DESC')
                ->get();
    }

    public function makePrimaryFotoItem($id){
        $foto = DB::table($this->table)->where("id","=",$id);
        $m_foto =  $foto->first();
        $affected = DB::table($this->table)->where("beritafotos_id","=",$m_foto->beritafotos_id)->update(array('is_utama' => 'no'));
        return $foto->update(["is_utama" => "yes"]);

    }

    
}

