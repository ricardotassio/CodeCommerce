<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = ['name','description','price','featured','recommend'];
}
