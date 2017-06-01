<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cartalyst\Stripe\Stripe;

class Payment extends Model
{
    protected $filltable = [
        'id',
        'payment_name',
        'status',
    ];

    public $stripe = new Stripe();

    public $timestamp = false;
    
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
