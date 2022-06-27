<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;


class Indexs extends Model
{
    use HasFactory;


    public $table = 'indexs';
    public $tb_berita_kanal = 'berita_kanals';

    protected $fillable = [
        'id',
        'title',
        'desc',
        'item_url',
        'base_url',
        'img_url',
        'keyword',
        'hit',
        'categori_id',
        'categori_name',
        'published',
        'creatorid',
        'createdby',
        'modifiedby',
        'modifierid',
        'created_at',
        'updated_at',
    ];


    public function list($take=4,$skip=0,$where=null){
        $option = [];
        
        $option[] = ['published','=','yes'];

        if($where){
            $option[] = $where;
        }

        return DB::table($this->table)
                ->where($where)
                ->orderBy('created_at','DESC')
                ->skip(0)
                ->take($take)
                ->get();
    }

    

    public function latest($take=4,$where=null){
        $option = [];
        
        $option[] = ['a.published','=','yes'];

        if($where){
            $option[] = $where;
        }

        return DB::table($this->table." as a")
                ->where($option)
                ->join($this->tb_berita_kanal." as f", 'f.id', '=', 'a.berita_kanal_id')
                ->select("a.*","f.name as kanal_name")
                ->orderBy('created_at','DESC')
                ->skip(0)
                ->take($take)
                ->get();
    }

    
    public function latestVideo($take=4,$where=null){
        $option = [];
        // array_push($option,['is_berita_video','=','yes']);
        // array_push($option,['published','=','yes']);

        // dd($option);


        $option[] = ['published','=','no'];
        $option[] = ['is_berita_video','=','no'];
        $option[] = ['id_youtube','<>',''];

        if($where){
            $option[] = $where;
        }

        return DB::table($this->table." as a")
                ->join($this->tb_berita_kanal." as f", 'f.id', '=', 'a.berita_kanal_id')
                ->select("a.*","f.name as kanal_name")
                ->where($option)
                ->orderBy('created_at','DESC')
                ->skip(0)
                ->take($take)
                ->get();
    }

    

    
    public function latestBeritaVideo($take=4,$where=null){
        $option = [];
        
        

        if($where){
            $option[] = $where;
        }

        $option[] = ['published','=','yes'];
        $option[] = ['is_berita_video','=','yes'];
        $option[] = ['id_youtube','<>',''];


        return DB::table($this->table)
                ->where($option)
                ->orderBy('created_at','DESC')
                ->skip(0)
                ->take($take)
                ->get();
    }

    

    public function latestBykanal($take=4,$channel_id, $where=null){
        $option = [];
        $option[] = ["berita_kanal_id","=",$channel_id];
        $option[] = ['published','=','yes'];
        
        if($where){
            $option[] = $where;
        }

        return DB::table($this->table)
                ->where($option)
                ->orderBy('created_at','DESC')
                ->skip(0)
                ->take($take)
                ->get();
    }


    


    public function trending($take=4){

        $current_sql_date = date('Y-m-d H:i:s',  strtotime( date( "Y-m-d H:i:s", strtotime( date("Y-m-d H:i:s") ) ) . "-3 month" ));

       
        return DB::table($this->table)
                ->where( [ ['published','=',"yes"], ["created_at",">", "$current_sql_date"]])
                ->orderBy('hit','DESC')
                ->skip(0)
                ->take($take)
                ->get();
    }

    
    
    public function trendingVideo($take=4){

        $current_sql_date = date('Y-m-d H:i:s',  strtotime( date( "Y-m-d H:i:s", strtotime( date("Y-m-d H:i:s") ) ) . "-3 month" ));

       


        return DB::table($this->table)
                ->where([['is_berita_video','=',"yes"], ['published','=',"yes"], ["created_at",">", "$current_sql_date"]])
                ->orderBy('hit','DESC')
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

    public function relatedVideo($take=4,$keyword,$channel){
        return DB::table($this->table)
                ->where([["is_berita_video","=","yes"], ["berita_kanal_id","=",$channel], ['published','=','yes']])
                ->orderBy('hit','DESC')
                ->orderBy('created_at','DESC')
                ->skip(0)
                ->take($take)
                ->get();
    }

    



    public function trendingBykanal($take=4,$channel,$keyword=null){


        $current_sql_date = date('Y-m-d H:i:s',  strtotime( date( "Y-m-d H:i:s", strtotime( date("Y-m-d H:i:s") ) ) . "-3 month" ));

       


        $option = [];
        $option[] = ["berita_kanal_id","=",$channel];
        $option[] = ['published','=','yes'];
        $option[] = ["created_at",">", "$current_sql_date"];

        if($keyword){
            $option[] = ["title","like","%".$keyword."%"];
        }



        


        return DB::table($this->table)
                ->where($option)
                ->orderBy('hit','DESC')
                ->orderBy('created_at','DESC')
                ->skip(0)
                ->take($take)
                ->get();
    }

}
