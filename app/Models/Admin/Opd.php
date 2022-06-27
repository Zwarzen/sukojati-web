<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;


class Opd extends Model
{
    use HasFactory;

    public $table = 'opd';
    public $tableOpdUsers = 'opd_users';

    public $timestamps = false;
    // allowing mass assigment
    protected $guarded = [];

    function getByIdUser($idUser){

        // dd($idUser);

        $users = DB::table($this->tableOpdUsers." as a")->select("a.opd_unor")->where('a.user_id',$idUser)->first();
        // dd( $users );

        $res = DB::table($this->table." as b")->select("b.*")->where('b.kd_unor',$users->opd_unor)->first();
        // dd($res);

        return $res;

    }



    function getList($where=null){

        $opd = DB::table($this->table);

        if($where){
            $opd->where($where);
        }

        $raw  =  $opd->orderBy('created_at','DESC');


        // $sortedByParent = $this->sortByParent($raw,0);

        return  $raw->get();

    }

}
