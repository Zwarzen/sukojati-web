<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB; 

class OpdUser extends Model
{
    use HasFactory;

    protected $table = 'opd_users';
    protected $tb_user = 'users';
    protected $tb_unor = 'unor';

    public function getListR($where=null){
        $option = [];

        if($where){
            $option[] = $where;
        }

        return DB::table($this->table." as a")
                ->where($option)
                ->join($this->tb_user." as b", 'b.id', '=', 'a.user_id')
                ->select("b.*")
                ->orderBy('a.tgl_register','DESC')
                ->get();
    }

    public function getList(){
        return DB::table($this->table." as a")
                ->join($this->tb_user." as b", 'b.id', '=', 'a.user_id')
                ->join($this->tb_unor." as c", 'c.kd_unor', '=', 'a.opd_unor')
                ->select(DB::raw("a.id as 'id_list'"),"b.*","c.kd_unor","c.nm_unor")
                ->orderBy('a.tgl_register','DESC');
    }


}
