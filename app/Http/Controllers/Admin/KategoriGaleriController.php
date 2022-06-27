<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\KategoriGaleri;
use DataTables;

class KategoriGaleriController extends Controller
{
  public function __construct()
  {
    $this->model = new KategoriGaleri();
  }

  public function index(){
    $data['menu'] = 'kategorigaleri';
    return view("admin.module.kategorigaleri.kategoriGaleriIndex",$data);
  }

  public function show(){
    $data = KategoriGaleri::all();
      // print_r($data); die();
    return Datatables::of($data)
    ->addIndexColumn()
    ->addColumn('action', 'admin.module.kategorigaleri.action')
    ->rawColumns(['action'])
    ->make(true);
  }

  public function create(){
    $data['menu'] = 'kategorigaleri';

    return view("admin.module.kategorigaleri.Create",$data);
  }

  public function store(Request $request){
    $this->model->name = $request->name;
    $this->model->creatorid = "0";//$request->user()->id;
    $this->model->createdby = "a";//$request->user()->id;
    $this->model->modifiedby = "a";//$request->user()->id;
    $this->model->modifierid = "0";//$request->user()->id;
    $this->model->created_at = date('Y-m-d h:i:s');
    $this->model->save();

    return redirect()->route('admin.master.kategorigaleri.index')->with('success','Data berhasil di input');
  }

  public function edit(KategoriGaleri $kategorigaleri, $id)
  {
    $kategori = $kategorigaleri::find($id)->first();
    $data['menu'] = 'kategorigaleri';
    $data['kategorigaleri'] = $kategori;
    return view('admin.module.kategorigaleri.edit',$data);
  }

  public function update(Request $request, KategoriGaleri $kategorigaleri)
  {

    $request->validate([
      'name' => 'required'
    ]);


    $input= $request->all();
    $id = $input["id"];
    unset($input["id"]);
    unset($input["_token"]);

    $kategorigaleri->where("id",$id)->update($input);

    // $kategorigaleri->update($request->all());
    return redirect()->route('admin.master.kategorigaleri.index')->with('success','biodata berhasil di update');
  }

  public function getlist(){
    $data = KategoriGaleri::all();
    // print_r($data); die();
  return Datatables::of($data)
  ->addIndexColumn()
  ->addColumn('action', 'admin.module.kategorigaleri.action')
  ->rawColumns(['action'])
  ->make(true);
  }


  public function delete($id)
  {
    $kategorigaleri = KategoriGaleri::where('id',$id)->delete();

    if($kategorigaleri){
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

   /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  public function destroy()
  {
    echo $id;
    // $kategorigaleri = KategoriGaleri::where('id',$id)->delete();
    // return redirect()->route('admin.master.kategorigaleri.index')->with('success','Data berhasil di delete');
  }


}
