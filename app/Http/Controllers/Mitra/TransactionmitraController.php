<?php

namespace App\Http\Controllers\Mitra;

use App\DataTables\Mitra\TransactionmitraDatatable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransactionmitraController extends Controller
{
    public function index(TransactionmitraDatatable $datatable)
    {
        try {
            return $datatable->render('mitra.transaction.index');
        }catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }
}
