<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TelescopeCrane extends Model
{
    protected $table = 'cr_telescopic_crane';
    protected $fillable = ['brand_id', 'model', 'type', 'is_extra_equipment',
        'stamp_base', 'mast_length', 'weight', 'created_at', 'updated_at'
    ];
}
