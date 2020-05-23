<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends AbstractAPIModel
{
    public $timestamps = true;

    protected $fillable = [''];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function type()
    {
        return 'products';
    }
}
