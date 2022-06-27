<?php

namespace App\Http\Controllers\Presentation\Budaya\Tarian;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TarianController extends Controller
{
    public $nmPart = "presentation.module.budaya.tarian.";
    public function index(){
        return view($this->nmPart."tarianIndex",["page_title"=>"Website resmi Banyuwangi"]);
    }
}
