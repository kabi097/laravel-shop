<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Order extends Model
{
    protected $fillable = ['first_name', 'last_name', 'street', 'city', 'postal_code', 'phone_number', 'email', 'nip'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($order) {
            $order->{$order->getKeyName()} = (string) Str::uuid();
        });
    }

    public function getKeyType()
    {
        return 'string';
    }

    public function getIncrementing()
    {
        return false;
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function products() {
        return $this->belongsToMany(Product::class)->withPivot(['quantity']);
    }
}
