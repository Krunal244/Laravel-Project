<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TowerCraneCalculation extends Model
{
    protected $table = 'cr_tower_crane_calculation';
    protected $fillable = ['crane_id', 'radius', 'weight', 'created_at', 'updated_at'];
}

