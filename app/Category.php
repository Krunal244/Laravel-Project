<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{   
    protected $table = 'st_category';
    protected $fillable = [
	     'parent_id',
	     'name',
	     'label_en',
	     'label_es',
	     'label_pt',
	     'label_da',
	     'label_de',
	     'label_it',
	     'label_pl',
	     'label_sl',
	     'label_fi',
	     'label_no'
	 ];
     

}
