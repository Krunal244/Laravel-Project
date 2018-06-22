<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CraneRentService extends Model
{
    protected $table = 'cr_crane_rent_service';
    protected $fillable = ['name', 'contact_information', 'latitude', 'longitude', 'created_at', 'updated_at'];
}
