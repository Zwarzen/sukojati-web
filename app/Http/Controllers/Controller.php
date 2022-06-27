<?php

namespace App\Http\Controllers;

use DB;
use Auth;

use App\Models\Admin\Opd;
use GuzzleHttp\Psr7\Request;
use App\Models\Admin\OpdJenis;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $opdx;
    public $jenisOpdx;

    public  function __construct(Opd $opd){


        $this->jenisOpdx = $jenisOpd;
        $this->opdx = $opd;



    }



    function getOpdAvailabeToUse(){

        if (Auth::check()){
            $user = Auth::user();

            $opd = $opd->getByIdUser($user->id);
            // dd($opd->kd_unor);


        }else{
            $default_opd = env('OPD_DEFAULT');
            $sql= DB::raw("CONCAT(prov_id,'.',kab_id,'.',kec_id,'.',kel_id)");
            // $opd = $this->opd->where($sql, $default_opd)->first();

            // dd($opd->kd_unor);


        }

        // return $opd;

    }

}
