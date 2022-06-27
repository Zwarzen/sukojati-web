<?php

namespace App\Http\Controllers\Admin;

use DataTables;
use App\Models\User;
use App\Models\Admin\Opd;
use App\Models\Admin\Unor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\OpdUser;
use App\Http\Controllers\Controller;

class OpdController extends Controller
{

    public $nmPart = "admin.module.opd.";
    public $data  = [];
    public $uriModul  = "/opd";
    public $opd;
    public $opduser;
    public $user;
    public $unor;
    public $model;


    public function __construct(Unor $unor, Opd $opd, OpdUser $opduser, User $user)
    {
        $this->opd = $opd;
        $this->user = $user;
        $this->opduser = $opduser;
        $this->unor = $unor;
    }

    public function index()
    {
        $data['menu'] = 'opd';

        return view("admin.module.opd.Index", $data);
    }

    public function show()
    {
        $data = Opd::all();
        // print_r($data); die();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', 'admin.module.opd.action')
            ->rawColumns(['action'])
            ->make(true);
    }

    public function create()
    {
        $data['menu'] = 'opd';

        return view("admin.module.opd.Create", $data);
    }

    public function store(Request $request)
    {
        $this->model->name = $request->name;
        $this->model->creatorid = "0"; //$request->user()->id;
        $this->model->createdby = "a"; //$request->user()->id;
        $this->model->created_at = date('Y-m-d h:i:s');
        $this->model->save();

        return redirect()->route('opd.index')->with('success', 'Data berhasil di input');
    }

    public function edit(Opd $opd)
    {
        $data['menu'] = 'opd';
        return view('admin.module.opd.edit', compact('opd'), $data);
    }

    public function update(Request $request, Opd $opd)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $opd->update($request->all());
        return redirect()->route('opd.index')->with('success', 'biodata berhasil di update');
    }


    public function delete($id)
    {
        $opd = Opd::where('id', $id)->delete();
        return redirect()->route('opd.index')->with('success', 'Data berhasil di delete');
    }

    //users



    public function deleteUsers($id)
    {

        $opd = $this->opduser::where('id', $id)->delete();

        if ($opd) {
            session()->flash('message', 'Data berhasil dihapus');
            echo json_encode([
                "status" => true,
                "message" => "Data berhasil dihapus"
            ]);
        } else {
            echo json_encode([
                "status" => false,
                "message" => "Data tidak terhapus"
            ]);
        }


        // if($opd){
        //   return redirect()->route('admin.opd.users')->with('success','Data berhasil hapus');
        // }else{
        //   return redirect()->route('admin.opd.users')->with('danger','Data gagal hapus');
        // }

    }

    public function users(Request $req)
    {
        $data['menu'] = 'opd.users';
        $b = $this->opduser->getList();
        $where = [];

        if (isset($req->unor) && $req->unor != "all") {
            $data["unor"] = $req->unor;

            // $where[]=["opd_unor","=",$req->unor];

            $b->where('opd_unor', '=', $req->unor);
        }


        if (isset($req->keyword) && $req->keyword != "") {
            $exploded_key = explode(" ", $req->keyword);
            $not_blank_key = [];

            $data["keyword"] = $req->keyword;
            $data["keywords"] = $exploded_key;


            foreach ($exploded_key as $key => $value) {

                if ($value != "") {
                    array_push($not_blank_key, $value);

                    $where[] = ["name", "like", "%" . $value . "%"];
                    $b->where('name', 'like', "%" . $value . "%");
                }
            }
        }

        $data['users'] = $b->paginate(5);
        $data['unors'] = $this->unor->orderBy("nm_unor", "asc")->where("jenis_opd_id", "<>", null)->get();
        return view($this->nmPart . "users.UserOpdIndex", $data);
    }

    public function addUsers()
    {
        $data['menu'] = 'opd.addusers';

        $b = $this->opduser->orderBy("created_at", "desc");


        if (isset($req->unor) && $req->unor != "all") {
            $data["unor"] = $req->unor;

            $b->where("opd_id", "=", $req->unor);
        }



        $data['users'] = $b->paginate(5);
        $data['unors'] = $this->unor->orderBy("nm_unor", "asc")->where("jenis_opd_id", "<>", null)->get();
        return view($this->nmPart . "users.UserOpdAdd", $data);
    }


    public function doAddUsers(Request $req)
    {

        $users = [];

        foreach ($req->user_id as $key => $value) {
            $users[] = [
                "user_id" => $value,
                "opd_unor" => $req->unor,
                "tgl_register" => date("Y-m-d H:i:s")
            ];
        }

        $rsult = $this->opduser->insert($users);
        if ($rsult) {
            return redirect()->route('admin.opd.users')->with('success', 'Data berhasil diinput');
        } else {
            return redirect()->route('admin.opd.users')->with('danger', 'Data gagal diinput');
        }
    }

    public function getUserComponentNotIn($id_opd)
    {


        if (!isset($id_opd) || $id_opd == '' || $id_opd == 'all') {
            return "<div style='padding:1rem; font-size:1.5rem; background:#fafafa; '>Silakan  Pilih OPD / SKPD</div>";
        } else {
            $user_opd = $this->opduser->getList();


            if ($user_opd->count() > 0) {
                $users_exist = [];
                foreach ($user_opd->get() as $key => $value) {
                    $users_exist[] = $value->id;
                }



                $data['users'] = $this->user::select("*")->whereNotIn('id', $users_exist)->get();
            } else {
                $data['users'] = $this->user::all();
            }


            return view($this->nmPart . "users.UserResultgetUserComponentNotIn", $data)->render();
        }
    }


    //ptofile
    public function profile(Request $req)
    {

        $opd = $this->getOpdAvailabe();

        $data['opd'] = $opd;
        return view($this->nmPart . "configs.profileDesa", $data);
    }

    public function profileUpdate()
    {
        $request = request();
        $this->validate($request, [
            'nama'  => 'required',
            'alias' => 'required',
            'email' => 'nullable|email',
        ]);

        DB::beginTransaction();

        try {

            $opd = Opd::where("id", "=", $request->id)->first();

            $update["nama"]         = $request->nama;
            $update["alias"]        = $request->alias;
            $update["surel"]        = $request->email;
            $update["telp"]         = $request->telp;
            $update["fax"]          = $request->fax;
            $update["alamat"]       = $request->alamat;
            $update["lat"]          = $request->lat;
            $update["long"]         = $request->long;
            $update["facebook"]     = $request->fb;
            $update["url_facebook"] = $request->url_fb;
            $update["ig"]           = $request->ig;
            $update["url_ig"]       = $request->url_ig;
            $update["youtube"]      = $request->youtube;
            $update["url_youtube"]  = $request->url_youtube;
            $opd->update($update);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            // \Log::error('Add Kegiatan error: '. $e->getMessage());
            return redirect()->back()->with('error', 'Data gagal disimpan, ' . $e->getMessage());
        }

        return redirect()->back()->with('success', 'Data berhasil disimpan');
    }

    function getOpdAvailabe()
    {
        if (Auth::check()) {
            $user = Auth::user();

            $opd = $this->opd->getByIdUser($user->id);
            // dd($opd->kd_unor);


        } else {
            $default_opd = env('OPD_DEFAULT');
            $sql = DB::raw("CONCAT(prov_id,'.',kab_id,'.',kec_id,'.',kel_id)");
            $opd = $this->opd->where($sql, $default_opd)->first();

            // dd($opd->kd_unor);


        }

        return $opd;
    }
}
