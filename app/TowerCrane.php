<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TowerCrane extends Model
{
    protected $table = 'cr_tower_crane';
    protected $fillable = ['brand_id', 'model', 'type', 'is_extra_equipment',
        'stamp_base', 'arm_length', 'weight', 'created_at', 'updated_at'
    ];
}
