<?php

namespace App\Http\Controllers\Common;
use App\Models\RehabCenter;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Helpers\ErrorTryCatch;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Artisan;


class CommandController extends Controller
{
    
    
        public function index() {
            return view('backend.common.setting.artisan');
        }
    
        public function artisan($command, $param) {
            if($command=='migrate'){
                Artisan::call(
                    'migrate',
                    array(
                      '--path' => 'database/migrations',
                      '--database' => 'mysql',
                      '--force' => true
                    )
                  );
            }
            elseif($command=='flush'){
                Cache::flush();
            }
            elseif($command=='optimizes'){
                Artisan::call('optimize');
                Toastr::info("Your command optimize cache successfully done", "Success");
                 return back();
            }
             Artisan::call($command.":".$param);
           Toastr::info("Your command $command $param successfully done", "Success");
            return back();
        }
    

   
   
}
