<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $filltable = [
        'id',
        'user_id',
        'product_id',
        'content',
        'time',
        'parent_id',
        'like_id',
        'status',
    ];

    public $timestamp = true;

    public function product()
    {
        return $this->belongTo(Product::class);
    }

    public function child()
    {
        return $this->hasMany(Comment::class, 'parent_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
