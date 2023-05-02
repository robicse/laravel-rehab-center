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
use Illuminate\Support\Facades\Artisan;


class CommandController extends Controller
{
    
    
        public function index() {
            return view('backend.common.setting.artisan');
        }
    
        public function artisan($command, $param) {
             Artisan::call($command.":".$param);
           Toastr::info("Your command $command $param successfully done", "Success");
            return back();
        }
    

   
   
}
