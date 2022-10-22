<?php

namespace App\Http\Controllers\Backend\Feature;

use App\DataTables\Feature\TransactionDatatable;
use App\Http\Controllers\Controller;
use App\Models\Feature\Transaction;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    protected $transaction;
    public function __construct(Transaction $transaction)
    {
        $this->transaction = new BaseRepository($transaction);
    }

    public function index(TransactionDatatable $datatable)
    {
        try {
            return $datatable->render('backend.feature.transaction.index');
        }catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }

    public function show($id)
    {
        try {
            $data['transaction'] = $this->transaction->find($id);
            return view('backend.feature.transaction.show',compact('data'));
        }catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }
}
