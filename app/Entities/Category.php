<?php

namespace CodeCommerce\Entities;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name','description'];

    public function product()
    {
        return $this->hasMany('CodeCommerce\Product');
    }
}
