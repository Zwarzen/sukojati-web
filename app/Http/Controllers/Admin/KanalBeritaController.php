<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\KanalBerita;
use App\Models\Admin\Berita;
use DataTables;

class KanalBeritaController extends Controller
{
    public $nmPart = "admin.module.kanalberita.";
    public $data  = [];
    public $uriModul  = "/kanalberita";
    public $kanal;
    public $berita;
    public $request;

    public function __construct(KanalBerita $kanalBerita, Berita $berita)
    {
        $this->kanal = $kanalBerita;
        $this->berita = $berita;
    }
  
    public function index(){
      $data['menu'] = 'kanalberita';
      return view($this->nmPart."kanalBeritaIndex",$data);
    }
  
    public function show(){
      $data = kanalberita::all();
        // print_r($data); die();
      return Datatables::of($data)
      ->addIndexColumn()
      ->addColumn('action', 'admin.module.kanalberita.action')
      ->rawColumns(['action'])
      ->make(true);
    }
  
    public function create(){
      $data['menu'] = 'kanalberita';
  
      return view($this->nmPart."createKanalBerita",$data);
    }
  
    public function store(Request $request){
      $this->kanal->name = $request->name;
      $this->kanal->slug = $request->slug;
      $this->kanal->creatorid = "0";//$request->user()->id;
      $this->kanal->createdby = "a";//$request->user()->id;
      $this->kanal->modifiedby = "a";//$request->user()->id;
      $this->kanal->modifierid = "0";//$request->user()->id;
      $this->kanal->created_at = date('Y-m-d h:i:s');
      $this->kanal->save();
  
      return redirect()->route('admin.master.kanalberita.index')->with('success','Data berhasil di input');
    }
  
    public function edit($id)
    {
      $kanalBerita = $this->kanal::find($id);
      $data['menu'] = 'kanalberita';
      $data['kanalberita'] = $kanalBerita;
      return view($this->nmPart.'editKanalBerita',$data);
    }
  
    public function update(Request $request, kanalberita $kanalberita)
    {
  
      $request->validate([
        'name' => 'required'
      ]);
  
  
      $input= $request->all();
      $id = $input["id"];
      unset($input["id"]);
      unset($input["_token"]);
  
      $this->kanal->where("id",$id)->update($input);
  
      return redirect()->route('admin.master.kanalberita.index')->with('success','Kanal berhasil di update');
    }
  
    public function getlist(){
      $data = $this->kanal::all();
      // print_r($data); die();
      return Datatables::of($data)
      ->addIndexColumn()
      ->addColumn('action', 'admin.module.kanalberita.action')
      ->rawColumns(['action'])
      ->make(true);
    } 
  
  
    public function delete($id)
    {

      $berita = $this->berita::where("berita_kanal_id",$id);

      if($berita->count()>0){
        echo json_encode([
          "status" => false,
          "message" => "Tidak bisa dihapus.. kanal ini sudah digunakan oleh berita yang lain"
        ]);
      }else{  
        $kanalberita = $this->kanal::where('id',$id)->delete();
  
        if($kanalberita){
          echo json_encode([
            "status" => true,
            "message" => "Data berhasil dihapus"
          ]);
        }else{
          echo json_encode([
            "status" => false,
            "message" => "Data tidak terhapus"
          ]);
        }
      }
      

      
  
    }
  
     /**
       * Remove the specified resource from storage.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
    public function destroy()
    {
      echo $id;
      // $kanalberita = kanalberita::where('id',$id)->delete();
      // return redirect()->route('admin.master.kanalberita.index')->with('success','Data berhasil di delete');
    }
  
}
