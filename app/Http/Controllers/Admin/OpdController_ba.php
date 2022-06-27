<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Opd;
use DataTables;

class OpdController extends Controller
{
  public function __construct()
   {
       $this->model = new Opd();
   }
    public function index(){
      $data['menu'] = 'opd';
      return view("admin.module.opd.opdIndex",$data);
    }

    public function data_list(){
      // return Datatables::of(Opd::all())->make(true);
      $data = Opd::all();
      return Datatables::of($data)
          ->addIndexColumn()
          ->addColumn('action', function($row){
              $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
              return $actionBtn;
          })
          ->rawColumns(['action'])
          ->make(true);
    }

    public function add_opd(){
      return view("admin.module.opd.opdAdd",[]);
    }
    
    public function simpan_opd(Request $request){
      try {
        $this->model->nama = $request->nama;
        $this->model->alamat = $request->alamat;
        $this->model->no_hp = $request->no_hp;
        $this->model->created_by = $request->user()->id;
        $this->model->created_at = date('y-m-d h:i:s');
        $this->model->save();
        $data['status']='sukses';
        echo json_encode($data);
      } catch (Throwable $e) {
          report($e);
          $data['status']='gagal';
          echo json_encode($data);
      }

    }
}
