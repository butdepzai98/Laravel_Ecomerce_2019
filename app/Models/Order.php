<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    protected $fillable = ['code_order','User_id','name','address','email','phone','money','message','status'];
    //									
    public function User()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }
}
