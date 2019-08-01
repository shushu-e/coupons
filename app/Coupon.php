<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $table = 'coupons';
    
    protected $fillable = ['user_id', 'store_id', 'store_name', 'store_url', 'large_category','small_category', 'coupon_site', 'coupon_name', 'coupon_term', 'coupon_expire', 'coupon_url'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
