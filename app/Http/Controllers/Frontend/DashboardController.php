<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class DashboardController extends Controller
{
    public function index()
    {
        try {
            return view('frontend.dashboard.index');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
