<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Feature\Course;
use App\Models\Feature\Mitra;
use App\Models\Feature\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        try {
            $data['total_mitra'] = Mitra::count();
            $data['total_user'] = User::count();
            $data['total_course'] = Course::count();
            $data['total_transaction'] = Transaction::count();
            return view('backend.dashboard',compact('data'));
        }catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }
}
