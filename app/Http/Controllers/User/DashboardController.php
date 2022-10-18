<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class DashboardController extends Controller
{
    public function index()
    {
        try {
            return view('user.dashboard.index');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
