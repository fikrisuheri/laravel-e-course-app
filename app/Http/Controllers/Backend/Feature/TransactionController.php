<?php

namespace App\Http\Controllers\Backend\Feature;

use App\DataTables\Feature\TransactionDatatable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(TransactionDatatable $datatable)
    {
        try {
            return $datatable->render('backend.feature.transaction.index');
        }catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }
}
