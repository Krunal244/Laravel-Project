<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'cr_brands';
    protected $fillable = ['name', 'logo', 'created_at', 'updated_at'];
}
