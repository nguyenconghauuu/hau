<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable
{
    //
    use AuthenticableTrait;

    protected $guarded = [];
    protected $hidden = ['remember_token'];
}
