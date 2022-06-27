<?php

namespace App\Http\Controllers\Presentation\Budaya\Adat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdatController extends Controller
{
    public $nmPart = "presentation.module.budaya.adat.";
    public function index(){
        return view($this->nmPart."adatIndex",["page_title"=>"Website resmi Banyuwangi"]);
    }
}
