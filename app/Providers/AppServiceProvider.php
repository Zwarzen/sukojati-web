<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Schema\Builder;
use Illuminate\Support\Facades\View;
use App\Models\Admin\Halaman;
use App\Models\Admin\Opd;
use App\Models\Admin\OpdUser;
use Carbon\Carbon;
use DB;
use Auth;

use Illuminate\Http\Request;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $request, Halaman $halaman, Opd $opd, OpdUser $opduser)
    {

        $user =  Auth::check()? Auth::user()  :null;
        $sql= DB::raw("CONCAT(prov_id,'.',kab_id,'.',kec_id,'.',kel_id)");
        $opdViaServicesProvider = null;


        Builder::defaultStringLength(125);
        config(['app.locale' => 'id']);
        Carbon::setLocale('id');

        date_default_timezone_set('Asia/Jakarta');




        View::composer('*', function($view) use ($opd, $halaman, $opduser, $sql)
        {
            if (Auth::check()){
                $user = Auth::user();

                // dd($user->id);

                $dataopdViaServicesProvider = $opd->getByIdUser($user->id);

                //ambil data menu halaman
                // $unor = $opduser->where('user_id',$user->id)->first()->kd_unor;
                $halamanViaServicesProvider = $halaman->getHaveSortedPage($dataopdViaServicesProvider->kd_unor);

            }else{
                $default_opd = env('OPD_DEFAULT');
                // dd($default_opd);

                $dataopdViaServicesProvider = $opd->where($sql, $default_opd)->first();
                $halamanViaServicesProvider = $halaman->getHaveSortedPage($dataopdViaServicesProvider->kd_unor);

            }

            $opdViaServicesProvider = $dataopdViaServicesProvider;

             View::share('opdViaServicesProvider', $opdViaServicesProvider);

             View::share('halamanViaServicesProvider',$halamanViaServicesProvider ); //shae ke smua halaman agar bisa diakses



             //shae ke smua halaman agar bisa diakses




        });

        Paginator::useBootstrap();


    }

}
