<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $fillable = ['name','image','quantity','price','promotion','description','cate_id','slug','productType_id','status'];

    public function productType()
    {
        return $this->belongsTo('App\Models\ProductType','productType_id','id');
    }

    public function Category()
    {
        return $this->belongsTo('App\Models\Category','cate_id','id');
    }
}
