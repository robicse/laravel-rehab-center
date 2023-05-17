<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\RehabCenter;
use App\Models\RehabReview;
use App\Models\Slider;

class DashboardController extends Controller
{
    public function index()
    { 
         $users=User::get(['id','status']);
         $rehabcenters=RehabCenter::get(['id','status']);
         $blogs=Blog::get(['id','status']);
         $previewyear=RehabCenter::wherestatus(1)->orderBy('created_at')->whereYear('created_at', date("Y",strtotime("-1 year")))->get(['id','status','created_at'])
         ->groupBy(function ($date)
          {return $date->created_at->month;
         })
         ->map(function ($group) {
             return $group->count();
         })->union(array_fill(1, 12, 0))
         ->sortKeys()
         ->toArray();
         $reviewdata=RehabCenter::wherestatus(1)->orderBy('created_at')->whereYear('created_at', date('Y'))->get(['id','status','created_at'])
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
        return view('backend.admin.dashboard',compact('users','rehabcenters','blogs','rehabreviews','sliders','reviewdata','previewyear'));
    }
}


