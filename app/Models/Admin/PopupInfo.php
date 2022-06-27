<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class PopupInfo extends Model
{
    use HasFactory;

    protected $table = 'popupinfo';

    protected $fillable = [
        'id',
        'title',
        'desc',
        'slug',
        'img',
        'hit',
        'publish_date',
        'published',
        'publishedby',
        'creatorid',
        'createdby',
        'modifiedby',
        'modifierid',
        'created_at',
        'updated_at'
    ];


    public function latest($take=4,$where=null){
        $option = [];

        $date = date("Y-m-d H:i:s");
        $option[] = ['a.published','=','yes'];
        $option[] = [ 'a.duration','>',DB::raw('TIMESTAMPDIFF(HOUR, a.created_at, "'.$date.'")')];



        if($where){

            $option[] = $where;
        }

        $res =  DB::table($this->table." as a")
                ->where($option)
                ->select("a.*", DB::raw('TIMESTAMPDIFF(HOUR, a.created_at, "'.$date.'") as "timeleft" ')  )
                ->orderBy('a.created_at','DESC')
                ->skip(0)
                ->take($take)
              ;

            //   echo $res->toSql();
                // dd($res);

                return $res  ->get();
    }



    public function list($take=4,$where=null){
        $date = date("Y-m-d H:i:s");
        $option = [];
        $option[] = ['a.published','=','yes'];
        $option[] = [ 'a.duration','>',DB::raw('TIMESTAMPDIFF(HOUR, a.created_at, "'.$date.'")')];



        if($where){
            $option[] = $where;
        }

        $res =  DB::table($this->table." as a")
                ->where($option)
                ->select("a.*", DB::raw('TIMESTAMPDIFF(HOUR, a.created_at, "'.$date.'") as "timeleft" ')  )
                ->orderBy('a.created_at','DESC')
                ->skip(0)
                ->take($take)
                ->get();

                // dd($res);

                return $res;
    }
}



