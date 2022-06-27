<?php

namespace App\Http\Controllers\Presentation\Budaya\Inovasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InovasiController extends Controller
{
    public $nmPart = "presentation.module.budaya.inovasi.";
    public function index(){
        return view($this->nmPart."inovasiIndex",["page_title"=>"Website resmi Banyuwangi"]);
    }
}
