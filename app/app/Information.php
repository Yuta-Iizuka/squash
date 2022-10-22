<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Information extends Model
{
    protected $table = 'informations';

    protected $fillable = ['information_id'];

    public function user(){
        return $this->belongsToMany('App\User');
    }

}
