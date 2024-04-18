<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    use HasFactory;
   protected $table = 'payments';
   protected $primaryKey = "id";
protected $fillable = ['order_id','razorpay_payment_id', 'amount', 'currency', 'payment_status','user_id' /* add more fields here */];
}
