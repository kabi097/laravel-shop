<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['first_name', 'last_name', 'street', 'city', 'postal_code', 'phone_number', 'email', 'nip'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function products() {
    return $this->belongsToMany(Product::class)->withPivot(['quantity']);
    }
}
