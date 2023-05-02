<?php

namespace App\Helpers;

use App\Models\State;
use App\Models\Slider;
use App\Models\Country;
use App\Models\Setting;
use App\Models\RehabCenter;
use App\Models\RehabReview;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use PHPUnit\Framework\Constraint\Count;
use Spatie\Permission\Models\Permission;
use Symfony\Component\HttpFoundation\Request;


class Helper
{


    public static function make_slug($string)
    {
        return Str::slug($string, '-');
    }

    public static function setting()
    {
        return Cache::rememberForever('setting', function () {
            return Setting::firstOrFail();
        });

    }
    public static function Permissions()
    {
        return  Permission::get();
    }
    
    public static function homeSlider()
    {
        return  Slider::wherestatus(1)->inRandomOrder()->take(1)->first();
    }

    public static function getCountryName()
    {
        return Country::wherestatus(0)->pluck('name', 'name');
    }
    public static function getStateName()
    {
        return State::wherestatus(1)->pluck('name', 'code');
    }
    public static function findStateName($id)
    {
        return State::wherecode($id)->first()->name;
    }
    public static function rehabadmnSeen()
    {
       
            return RehabCenter::whereadmin_seen(0)->count();
       

    }
    public static function rehabreviewadmnSeen()
    {
       
            return RehabReview::whereadmin_seen(0)->count();
       

    }
   

    public static function customImageAsset($value)
    {
        return asset('storage/app/'.$value ?: 'frontend/assets/images/backgrounds/page-header-bg.jpg');
    }

}