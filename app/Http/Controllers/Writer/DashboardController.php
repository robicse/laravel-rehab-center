<?php

namespace App\Http\Controllers\Writer;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function index()
    {
        $users=User::get(['id','status']);
     
        return view('backend.writer.dashboard',compact('users'));
    }
}


