<?php

namespace App\Http\Controllers\Writer;

use App\Models\User;
use App\Models\Slider;
use App\Models\RehabCenter;
use App\Models\RehabReview;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function index()
    {
        $users=User::get(['id','status']);
        $rehabcenters=RehabCenter::whereuser_id(Auth::id())->get(['id','status']);
      
        $previewyear=RehabCenter::wherestatus(1)->whereuser_id(Auth::id())->orderBy('created_at')->whereYear('created_at', date("Y",strtotime("-1 year")))->get(['id','status','created_at'])
        ->groupBy(function ($date)
         {return $date->created_at->month;
        })
        ->map(function ($group) {
            return $group->count();
        })->union(array_fill(1, 12, 0))
        ->sortKeys()
        ->toArray();
        $reviewdata=RehabCenter::wherestatus(1)->whereuser_id(Auth::id())->orderBy('created_at')->whereYear('created_at', date('Y'))->get(['id','status','created_at'])
        ->groupBy(function ($date)
         {return $date->created_at->month;
        })
        ->map(function ($group) {
            return $group->count();
        })->union(array_fill(1, 12, 0))
        ->sortKeys()
        ->toArray();
      $rehabreviews=RehabReview::get(['id','status']);
        $sliders=Slider::wherestatus(1)->get();
      
        return view('backend.writer.dashboard',compact('rehabcenters','rehabreviews','sliders','reviewdata','previewyear'));
    }
}


