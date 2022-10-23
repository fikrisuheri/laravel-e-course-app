<?php

namespace App\Http\Controllers\Backend\Feature;

use App\DataTables\Feature\WithdrawDatatable;
use App\Http\Controllers\Controller;
use App\Models\Feature\Withdrawal;
use Illuminate\Http\Request;

class WithdrawController extends Controller
{
    public function index(WithdrawDatatable $datatable)
    {
        try {
        return $datatable->render('backend.feature.withdraw.index');
        }catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }

    public function sent($id)
    {
        try {
            Withdrawal::where('id',$id)->update(['status' => 1]);
            return back()->with('success',__('message.update'));
        }catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }
}
