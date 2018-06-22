<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BackgroundImage extends Model
{
    protected $table = 'cr_background_images';
    protected $fillable = ['screen_name', 'image', 'created_at', 'updated_at'];
}
