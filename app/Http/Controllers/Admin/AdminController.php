<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Arr;

use Auth;


class AdminController extends Controller
{
      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $data['menu'] = 'dash';
        $data['user'] = Auth::user();
        return view("admin.module.dashboard.dashboardIndex",$data);
    }

    public function dash(){
        return view("admin.module.dash.dashIndex",[]);
    }


    public function show($id)
    {
        // return view('user.profile', [
        //     'user' => User::findOrFail($id)
        // ]);
    }

    public function opd(){
      return view("admin.module.opd.opdIndex",[]);
    }

}
