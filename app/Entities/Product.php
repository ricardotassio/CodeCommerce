<?php

namespace CodeCommerce\Entities;


use CodeCommerce\Entities\Contracts\ProductModelInterface;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'featured',
        'recommend'
    ];

    public function images()
    {
        return $this->hasMany('CodeCommerce\Entities\ProductImage');
    }

    public function category()
    {
        return $this->belongsTo('CodeCommerce\Entities\Category');
    }

    public function tags()
    {
        return $this->belongsToMany('CodeCommerce\Entities\Tag');
    }

    public function getNameDescriptionAttribute()
    {
        return $this->name.' - '.$this->description;
    }

    public function getTagListAttribute()
    {
        $tags = $this->tags->lists('name');

        return implode(",", $tags);
    }
}
