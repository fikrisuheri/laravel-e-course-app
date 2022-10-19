<?php 

namespace App\Services\Midtrans;
 
use Midtrans\Snap;
 
class CreateSnapTokenService extends Midtrans
{
    protected $order,$user;
 
    public function __construct($order,$user)
    {
        parent::__construct();
 
        $this->order = $order;
        $this->user = $user;
    }
 
    public function getSnapToken()
    {
        $params = [
            'transaction_details' => [
                'order_id' => $this->order->invoice_number,
                'gross_amount' => $this->order->total_pay,
            ],
            'customer_details' => [
                'first_name' => $this->user->first_name ?? 'Customer',
                'email' => $this->user->email ?? 'Customer@mail.com',
                'phone' => $this->order->phone ?? '081222888777',
            ]
        ];

 
        $snapToken = Snap::getSnapToken($params);
 
        return $snapToken;
    }
}