<?php

namespace App\Http\Controllers\Presentation\Budaya\Musik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MusikController extends Controller
{
    public $nmPart = "presentation.module.budaya.musik.";
    public function index(){
        return view($this->nmPart."musikIndex",["page_title"=>"Website resmi Banyuwangi"]);
    }
}
