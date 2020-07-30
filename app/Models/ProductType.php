<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $table = 'producttype';
    protected $fillable = ['name','cate_id','slug','status'];

    public function Category()
    {
        return $this->belongsTo('App\Models\Category','cate_id','id');
    }

    public function Product()
    {
        return $this->hasMany('App\Models\Product','productType_id','id');
    }
}
