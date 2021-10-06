<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\Home;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard() {
        return view('backEnd.dashboard');
    }

}
