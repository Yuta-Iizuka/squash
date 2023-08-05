<?php

namespace App;
use App\Information;

use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    protected $fillable = ['information_id', 'date',  'user_id', 'name', 'tel', 'email', 'member','term'];

    public function information(){
        return $this->belongsTo(Information::class,'id', 'information_id' );
    }

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id' );
    }

}
