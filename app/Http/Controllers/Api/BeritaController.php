<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\Admin\Berita;
use App\Models\Admin\KanalBerita;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class BeritaController extends Controller
{
    protected $user;
    public $data  = [];
 
    public function __construct()
    {
        try {
            if(JWTAuth::parseToken()->authenticate()){
                $this->user = JWTAuth::parseToken()->authenticate();
            }else{
                return response()->json(['status' => false, "message" => "Tidak bisa mengenali token "], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
            
        } catch (\Throwable $th) {
            return response()->json(['status' => false, "message" => "Tidak bisa mengenali token "], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        
    }

    public function index(Berita $berita, KanalBerita $kanalBerita)
    {
        return response()->json(['status' => true, "message" => "Oke ini berita"], Response::HTTP_OK);
    }

    public function newRelease(Berita $berita, KanalBerita $kanalBerita, $items=4){

        if($this->user){

            $this->data['count'] = $items;
            $this->data['items'] = $berita->latest($items);
            return response()->json([
                'status' => true, 
                "kode_status" =>Response::HTTP_OK,
                "message" => "Berhasil mendapatkan berita", 
                "user"=>$this->user,
                "data" => $this->data], 
                
                Response::HTTP_OK);
        }else{
            return response()->json([
                'status' => false, 
                "message" => "Tidak mendapatkan berita, Auhtentication dibutuhkan "], 
                
                Response::HTTP_NETWORK_AUTHENTICATION_REQUIRED);
        }
        
    }

}
