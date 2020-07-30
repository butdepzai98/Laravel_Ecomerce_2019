<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';
    protected $fillable = ['user_id','address','email','phone'];
    
    
    public function User()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }
}
