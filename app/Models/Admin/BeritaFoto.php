<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class BeritaFoto extends Model
{
    use HasFactory;
    public $table = 'beritafotos';
    public $tb_berita = 'beritas';
    public $tb_foto_items = 'beritafoto_items';
    public $tb_berita_kanal = 'berita_kanals';

    protected $fillable = [
        'hit'
    ];


    public function list($where){
        $option = [];

        if($where){
            $option[] = $where;
        }

        $option[] = ['published','<>',''];


        return DB::table($this->tb_berita)
                ->where($option)
                ->orderBy('created_at','DESC')
                ->skip(0)
                ->take($take)
                ->get();
    }

    public function listIndex($take=5){
        

        $data = DB::table($this->table. " as a")
            ->select("a.*","f.name as kanal_name",
            DB::raw("
            (SELECT d.img_raw FROM  ".$this->tb_foto_items." as d WHERE d.beritafotos_id = a.id and is_utama = 'yes' limit 1) as img_raw_nya,
            (SELECT e.img_thumb FROM  ".$this->tb_foto_items." as e WHERE e.beritafotos_id = a.id and is_utama = 'yes' limit 1) as img_thumb_nya,
            (SELECT e.slug FROM  ".$this->tb_foto_items." as e WHERE e.beritafotos_id = a.id and is_utama = 'yes' limit 1) as slug_nya
            "))
            ->join($this->tb_berita_kanal." as f", 'f.id', '=', 'a.berita_kanal_id')
            ->skip(0)
            ->take($take)
            ->orderBy("a.created_at","desc");
       
        // $data = DB::select(DB::raw("select `a`.*, (SELECT COUNT( DISTINCT b.id) FROM  beritafoto_items as b WHERE b.beritafotos_id = a.id) as jml_foto from `beritafotos` as `a`"))  ;


        return $data;

    }

    public function fotoDetail($where){
        $option = [];
        
        $option[] = ['published','=','yes'];
        

        if($where){
            $option[] = $where;
        }




        $data = DB::table($this->table. " as a")
            ->select("a.*","f.name as kanal_name",
            DB::raw("
            (SELECT d.img_raw FROM  ".$this->tb_foto_items." as d WHERE d.beritafotos_id = a.id and is_utama = 'yes' limit 1) as img_raw_nya,
            (SELECT e.img_thumb FROM  ".$this->tb_foto_items." as e WHERE e.beritafotos_id = a.id and is_utama = 'yes' limit 1) as img_thumb_nya,
            (SELECT e.slug FROM  ".$this->tb_foto_items." as e WHERE e.beritafotos_id = a.id and is_utama = 'yes' limit 1) as slug_nya
            "))
            ->join($this->tb_berita_kanal." as f", 'f.id', '=', 'a.berita_kanal_id');

        return $data;
    }

    

    public function latest($take=4,$where=null){
        $option = [];
        
        $option[] = ['published','=','yes'];
        $option[] = ['jml_foto_nya','>','0'];
        

        if($where){
            $option[] = $where;
        }


        $data = DB::table($this->table. " as a")
            ->select("a.*","f.name as kanal_name",
            DB::raw("
            (SELECT d.img_raw FROM  ".$this->tb_foto_items." as d WHERE d.beritafotos_id = a.id and is_utama = 'yes' limit 1) as img_raw_nya,
            (SELECT e.img_thumb FROM  ".$this->tb_foto_items." as e WHERE e.beritafotos_id = a.id and is_utama = 'yes' limit 1) as img_thumb_nya,
            (SELECT e.slug FROM  ".$this->tb_foto_items." as e WHERE e.beritafotos_id = a.id and is_utama = 'yes' limit 1) as slug_nya
            "))
            ->join($this->tb_berita_kanal." as f", 'f.id', '=', 'a.berita_kanal_id')
            ->skip(0)
            ->take($take);
       
        // $data = DB::select(DB::raw("select `a`.*, (SELECT COUNT( DISTINCT b.id) FROM  beritafoto_items as b WHERE b.beritafotos_id = a.id) as jml_foto from `beritafotos` as `a`"))  ;


        return $data;


    }

    

    public function populerByKanal($take=4, $id_kanal=null, $where=null){


        if($where != null){

            $where []= ['a.published', '=', 'yes'];
           
        }else{
            $where = []; 
            $where []= ['a.published', '=', 'yes'];
        }

        if($id_kanal != null){
            $where []= ['a.berita_kanal_id', '=', $id_kanal];
        }


        $data = DB::table($this->table. " as a")
            ->select("a.*","f.name as kanal_name",
            DB::raw("
            (SELECT d.img_raw FROM  ".$this->tb_foto_items." as d WHERE d.beritafotos_id = a.id and is_utama = 'yes' limit 1) as img_raw_nya,
            (SELECT e.img_thumb FROM  ".$this->tb_foto_items." as e WHERE e.beritafotos_id = a.id and is_utama = 'yes' limit 1) as img_thumb_nya,
            (SELECT e.slug FROM  ".$this->tb_foto_items." as e WHERE e.beritafotos_id = a.id and is_utama = 'yes' limit 1) as slug_nya
            "))
            ->where($where)
            ->join($this->tb_berita_kanal." as f", 'f.id', '=', 'a.berita_kanal_id')
            ->orderBy('a.hit','DESC')
            ->skip(0)
            ->take($take)->get();


        return $data;
        
    }



    public function terbaruByKanal($take=4, $id_kanal=null, $where=null){

        if($where != null){

            $where []= ['a.published', '=', 'yes'];
           
        }else{
            $where = []; 
            $where []= ['a.published', '=', 'yes'];
        }

        if($id_kanal != null){
            $where []= ['a.berita_kanal_id', '=', $id_kanal];
        }


        $data = DB::table($this->table. " as a")
            ->select("a.*","f.name as kanal_name",
            DB::raw("
            (SELECT d.img_raw FROM  ".$this->tb_foto_items." as d WHERE d.beritafotos_id = a.id and is_utama = 'yes' limit 1) as img_raw_nya,
            (SELECT e.img_thumb FROM  ".$this->tb_foto_items." as e WHERE e.beritafotos_id = a.id and is_utama = 'yes' limit 1) as img_thumb_nya,
            (SELECT e.slug FROM  ".$this->tb_foto_items." as e WHERE e.beritafotos_id = a.id and is_utama = 'yes' limit 1) as slug_nya
            "))
            ->where($where)
            ->join($this->tb_berita_kanal." as f", 'f.id', '=', 'a.berita_kanal_id')
            ->orderBy('a.publish_date','DESC')
            ->skip(0)
            ->take($take)->get();


        return $data;
        
    }

    public function trending($take=4){


        $data = DB::table($this->table. " as a")
            ->select("a.*","f.name as kanal_name",
            DB::raw("
            (SELECT d.img_raw FROM  ".$this->tb_foto_items." as d WHERE d.beritafotos_id = a.id and is_utama = 'yes' limit 1) as img_raw_nya,
            (SELECT e.img_thumb FROM  ".$this->tb_foto_items." as e WHERE e.beritafotos_id = a.id and is_utama = 'yes' limit 1) as img_thumb_nya,
            (SELECT e.slug FROM  ".$this->tb_foto_items." as e WHERE e.beritafotos_id = a.id and is_utama = 'yes' limit 1) as slug_nya
            "))
            ->join($this->tb_berita_kanal." as f", 'f.id', '=', 'a.berita_kanal_id')
            ->skip(0)
            ->take($take)->get();


        return $data;
        
        // DB::table($this->table)
        //         ->where([['published','=','yes']])
        //         ->orderBy('hit','DESC')
        //         ->skip(0)
        //         ->take($take)
        //         ->get();
    }

    public function latestBeritaVideo($take=4,$where=null){
        $option = [];
        
        

        if($where){
            $option[] = $where;
        }

        $option[] = ['published','=','yes'];
        $option[] = ['is_berita_video','=','yes'];
        $option[] = ['id_youtube','<>',''];


        return DB::table($this->tb_berita)
                ->where($option)
                ->orderBy('created_at','DESC')
                ->skip(0)
                ->take($take)
                ->get();
    }


    public function related($take=4,$keyword,$channel){
        return DB::table($this->table)
                ->where([ ["berita_kanal_id","=",$channel], ['published','=','yes']])
                ->orderBy('hit','DESC')
                ->orderBy('created_at','DESC')
                ->skip(0)
                ->take($take)
                ->get();
    }


}
