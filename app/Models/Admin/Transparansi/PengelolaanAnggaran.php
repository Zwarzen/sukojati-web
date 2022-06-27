<?php

namespace App\Models\Admin\Transparansi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class PengelolaanAnggaran extends Model
{
    use HasFactory;

    public $table = 'pengelolaan_anggaran';

    public $timestamps = false;

    public function getKodeMaxTableEight($kodeid){
        $q = DB::table($this->table)->select(DB::raw("MAX(RIGHT($kodeid,8)) as kd_max"))->get();
        $kd = "";
        if(count($q)>0)
        {
            foreach($q as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%08s", $tmp);
            }
        }
        else
        {
            $kd = "00000001";
        }
        return "AG-".$kd;
    }
}
