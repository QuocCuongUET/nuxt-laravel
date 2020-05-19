<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends AbstractAPIModel
{
    public $timestamps = true;

    protected $fillable = ['name'];

    public function products() {
        return $this->hasMany('App\Product');
    }

    public function type()
    {
        return 'categories';
    }
}
