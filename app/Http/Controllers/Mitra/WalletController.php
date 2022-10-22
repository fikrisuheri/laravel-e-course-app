<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use App\Models\Feature\Wallet;
use App\Models\Feature\Withdrawal;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function index()
    {
        try {
            $data['wallet'] = auth()->user()->UserWallet;
            $data['penarikan'] = Withdrawal::where('user_id',auth()->user()->id)->get();
            return view('mitra.wallet.index',compact('data'));
        }catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }

    public function Withdraw(Request $request)
    {
        try {
            $data['wallet'] = auth()->user()->UserWallet;
            if($request->amount > $data['wallet']['balance']){
                return back()->with('gagal',__('message.withdraw_balance_empty'));
            }

            Withdrawal::create([
                'user_id' => $data['wallet']['user_id'],
                'amount' => $request->amount,
                'status' => 0,
                'description' => $request->description
            ]);
            return redirect()->back()->with('success',__('message.withdraw_sent'));
        }catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }
}
