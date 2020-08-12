<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Subcategory extends Authenticatable
{
   protected $table='subcategorys';
   protected $fillable=['parent_id','subcategory_list'];
}
