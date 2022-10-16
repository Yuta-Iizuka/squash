<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    protected $fillable = ['information_id', 'date',  'user_id', 'name', 'tel', 'email', 'member','term'];

    public function information(){
        return $this->belongsTo('App\Information', 'id', 'information_id' );
    }



}
