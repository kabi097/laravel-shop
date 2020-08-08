<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Resizable;

class Product extends Model
{
    use Resizable;

    protected $fillable = ['title', 'price', 'description', 'quantity'];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function images() {
        return $this->belongsToMany(Image::class);
    }
}