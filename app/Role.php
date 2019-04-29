<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['slug','description'];
    public function user(){
           return  $this->belongsTo('App\Eloquents\Users\User','role_id','id');
    }
}
