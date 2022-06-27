<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Arr;
use Spatie\Permission\PermissionRegistrar;

use DB;
use DataTables;

class UsersController extends Controller
{
  public function __construct()
  {
    $this->model = new User();
    app()[PermissionRegistrar::class]->forgetCachedPermissions();

    // $this->middleware('permission:edit posts', ['only' => ['create']]);
  }

  public function index(Request $request){
    // if ($user->hasRole('admin')) {
        $data['menu'] = 'usersProfile';
        
      return view("admin.module.users.usersIndex",$data);
    // }
    
  }

  public function setting($id_user=null){
    if( $id_user == null ){
      $id_user = Auth::user()->id;
    }

    $user = User::where("id","=",$id_user)->first();

    $data['menu'] = 'usersProfile';
    $data['usersProfile'] = $user;
    $data['role'] = $user->getRoleNames();
    $data['permission'] = $user->getAllPermissions();


    return view('admin.module.users.settingProfile',$data);
  }

  public function updateProfile(Request $request){
    $this->validate($request, [
      'name' => 'required',
      'username' => 'required',
      'password' => 'nullable|min:8',
      'password_confirmation' => 'nullable|min:8|same:password',
    ]);



    DB::beginTransaction();
    
    try {
      $user = User::where("id","=",$request->id)->first();

      if(strlen($request->password) > 7){
        $update = Arr::except($request->all(), ["id","username", "password","_token","role","password_confirmation"]);
        $update["password"] = bcrypt($request->password);
      }else{
        $update = Arr::except($request->all(), ["id","username","password","_token","role","password_confirmation"]);
      }


      $user->update($update);
      
     
    } catch (\Exception $e) {
      DB::rollback();
        // \Log::error('Add Kegiatan error: '. $e->getMessage());

        return redirect()->back()->with('error','Data gagal disimpan, '. $e->getMessage());
    }

    return redirect()->back()->with('success','Data berhasil disimpan');
  }


  public function indexrole(Request $request){
    // if ($user->hasRole('admin')) {
        $data['menu'] = 'usersProfile';
      return view("admin.module.users.roleIndex",$data);
    // }
    
  }


  public function getlistrole(){
    $data = Role::all();
    // print_r($data); die();
    return Datatables::of($data)
    ->addIndexColumn()
    ->addColumn('action', 'admin.module.users.actionrole')
    ->rawColumns(['action'])
    ->make(true);
  }

  public function indexpermission(Request $request){
    // if ($user->hasRole('admin')) {
        $data['menu'] = 'usersProfile';
      return view("admin.module.users.permissionIndex",$data);
    // }
    
  }

  public function getlist(){
    $data = User::all();
    // print_r($data); die();
    return Datatables::of($data)
    ->addIndexColumn()
    ->addColumn('action', 'admin.module.users.action')
    ->rawColumns(['action'])
    ->make(true);
  } 

  public function getlistpermission(){
    $data = Permission::all();
    // print_r($data); die();
    return Datatables::of($data)
    ->addIndexColumn()
    ->addColumn('action', 'admin.module.users.actionpermission')
    ->rawColumns(['action'])
    ->make(true);
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
    $data['menu'] = 'usersProfile';
    $data['role'] = Role::groupBy('id')->get();

    return view("admin.module.users.Create",$data);
  }

  public function createpermission(){
    $data['menu'] = 'usersProfile';
    // $data['group'] = Role::groupby('id')->get();

    return view("admin.module.users.Createpermission",$data);
  }

  public function createrole(){
    $data['menu'] = 'usersProfile';
    // $data['group'] = Role::groupby('id')->get();

    return view("admin.module.users.Createrole",$data);
  }

  public function store(Request $request){
   
    $this->validate($request, [
      'name' => 'required',
      'email' => 'required|email',
      'username' => 'required',
      'password' => 'required',
      'password_confirmation' => 'required|min:8|same:password',
    ]);



    DB::beginTransaction();

    $duplikasi_username = User::where(function ($query) use ($request){
      $query->where("username","=",$request->username);
    })->get()->count();

    if($duplikasi_username > 0){
      return redirect()->back()->with('error','Data gagal disimpan, karena duplikasi. Username  [ '.$request->username.' ] sudah digunakan');
    }


    $duplikasi_email = User::where(function ($query) use ($request){
      $query->where("email","=",$request->email);
    })->get()->count();

    if($duplikasi_email > 0){
      return redirect()->back()->with('error','Data gagal disimpan, karena duplikasi. Email  [ '.$request->email.' ] sudah digunakan');
    }

    try {
      $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'address' => $request->address,
        'username' => $request->username,
        'password' => bcrypt($request->password)
      ]);
      
      $user->assignRole($request->role);
      
     
    } catch (\Exception $e) {
      DB::rollback();
        // \Log::error('Add Kegiatan error: '. $e->getMessage());

        return redirect()->back()->with('error','Data gagal disimpan, '. $e->getMessage());
    }

    return redirect()->back()->with('success','Data berhasil disimpan');
  }

  public function storepermission(Request $request){
    app()[PermissionRegistrar::class]->forgetCachedPermissions();
      
    try {
      Permission::create([
        'name' => $request->name,
        'guard_name' => 'admin',
        
      ]);
      
    } catch (\Exception $e) {
        \Log::error('Add Kegiatan error: '. $e->getMessage());

        return redirect()->back();
    }

    return redirect()->route('admin.users.permission.index')->with('success','Data berhasil di tambahkan');
  }

  public function storerole(Request $request){
    app()[PermissionRegistrar::class]->forgetCachedPermissions();
    try {
      Role::create([
        'name' => $request->name,
        'guard_name' => 'admin',
        
      ]);
      
    } catch (\Exception $e) {
        \Log::error('Add Kegiatan error: '. $e->getMessage());

        return redirect()->back()->with('danger','Data gagal di tambahkan '.$e->getMessage());
    }

    return redirect()->route('admin.users.role.index')->with('success','Data berhasil di tambahkan');
  }

  


  public function edit( $id)
  {
    $users = User::where('id',$id)->first();

    $data['menu'] = 'usersProfile';
    $data['group'] = Role::groupby('id')->get();
    $data['usersProfile'] = $users;
    $data['roles'] = $users->getRoleNames();
    // $data['permission'] = $user->getAllPermissions();
    $data['permission'] = $users->getPermissionsViaRoles();

    

    return view('admin.module.users.Edit',$data);
  }
  
  public function editpermission( $id)
  {
    $Permission = Permission::where('id',$id)->first();
    $roles_item = Permission::find($id); 

    $data['menu'] = 'usersProfile';
    // $data['group'] = Role::groupby('id')->get();
    $data['Permission'] = $Permission;
    $data['roles'] = $roles_item;

    return view('admin.module.users.EditPermission',$data);
  }

  public function editrole( $id)
  {
    $role = Role::where('id',$id)->first();
    $permissions = Permission::all(); 

    $data['menu'] = 'usersProfile';
    // $data['group'] = Role::groupby('id')->get();
    $data['role'] = $role;
    $data['permissions'] = $permissions;
    $data['mypermissions'] = $role->getPermissionNames();

    return view('admin.module.users.EditRole',$data);
  }

  

  public function update(Request $request)
  {

   
    $this->validate($request, [
      'name' => 'required',
      'email' => 'nullable|email',
      'username' => 'required',
      'password' => 'nullable|min:8',
      'password_confirmation' => 'nullable|min:8|same:password',
    ]);



    DB::beginTransaction();

    // $duplikasi_username = User::where(function ($query) use ($request){
    //   $query->where("username","=",$request->username);
    // })->get()->count();

    // if($duplikasi_username > 0){
    //   return redirect()->back()->with('error','Data gagal disimpan, karena duplikasi. Username  [ '.$request->username.' ] sudah digunakan');
    // }
    
    try {
      $user = User::where("id","=",$request->id)->first();

      if(strlen($request->password) > 7){
        $update = Arr::except($request->all(), ["id","password","_token","role","password_confirmation"]);
        $update["password"] = bcrypt($request->password);
      }else{
        $update = Arr::except($request->all(), ["id","password","_token","role","password_confirmation"]);
      }


      $user->update($update);
      
      $user->syncRoles($request->role);
      
     
    } catch (\Exception $e) {
      DB::rollback();
        // \Log::error('Add Kegiatan error: '. $e->getMessage());

        return redirect()->back()->with('error','Data gagal disimpan, '. $e->getMessage());
    }

    return redirect()->back()->with('success','Data berhasil disimpan');

  }

  public function hitedit(Request $request, $id)
  {
    $users_data = $request->input();

    $users_data['address'] = $request->alamat;
    

    $post = User::find($id)->update($users_data); 
   
    if($post){
      return redirect()->back()->with('success','Data berhasil disimpan');
    }else{
      return redirect()->back()->with('danger','Data gagal disimpan');
    }
    

    // return redirect()->route('admin.users.profile.index')->with('success','Data Pengguna Berhasil di Ubah');
  }

  public function hiteditpermission(Request $request, $id)
  {
    $users_data = $request->input();


    $post = Permission::find($id)->update($users_data); 

    if($post){
      return redirect()->back()->with('success','Data berhasil disimpan');
    }else{
      return redirect()->back()->with('danger','Data gagal disimpan');
    }

    
  }

  public function hiteditrole(Request $request, $id)
  {
    $role = Role::where("id","=",$id)->first();
    if(isset($request->permission)){
      $update = Arr::except($request->all(), ["permission","_token"]);
      $permissions = $request->permission;

    }else{
      $update = Arr::except($request->all(), ["_token"]);
      $permissions = [];
    }

    
    $post = $role->update($update); 
    $role->syncPermissions($permissions);


    if($post){
      return redirect()->back()->with('success','Data berhasil disimpan');
    }else{
      return redirect()->back()->with('danger','Data gagal disimpan');
    }
    
  }


  public function delete($id)
  {
    $usersProfile = User::where('id',$id)->delete();

    if($usersProfile){
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

  public function deletepermission($id)
  {
    $permission = Permission::where('id',$id)->delete();

    if($permission){
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

  public function deleterole($id)
  {
    $role = Role::where('id',$id)->delete();

    if($role){
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
  }

  
  public function useropd(){

  }


}