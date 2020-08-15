<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use TCG\Voyager\Traits\Resizable;

class Product extends Model
{
    use Resizable;

    protected $fillable = ['title', 'price', 'description', 'quantity'];

    protected static function booted()
    {
        static::addGlobalScope('age', function (Builder $builder) {
            $builder->orderByDesc('created_at');
        });
    }


    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function images() {
        return $this->belongsToMany(Image::class);
    }
}