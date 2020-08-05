<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['title', 'price', 'description', 'quantity'];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function images() {
        return $this->belongsToMany(Image::class);
    }
}