<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TelescopeCraneCalculation extends Model
{
    protected $table = 'cr_telescope_crane_calculation';
    protected $fillable = ['crane_id', 'radius', 'weight', 'created_at', 'updated_at'];
}

