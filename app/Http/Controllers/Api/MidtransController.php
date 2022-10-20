<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Feature\Transaction;
use App\Models\Feature\UserCourse;
use App\Services\Midtrans\CallbackService;
use Illuminate\Http\Request;

class MidtransController extends Controller
{
    public function receive(CallbackService $callback)
    {
        $transaction = $callback->updateOrder();
        if($transaction['status'] == 1){
            UserCourse::create([
                'user_id' => $transaction['user_id'],
                'course_id' => $transaction['course_id'],
                'progress' => 1,
                'status' => 0,
            ]);
        }
    }

    public function success()
    {
        return redirect()->route('frontend.user.transaction.index');
    }
}
