<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Series extends Model
{
    use SoftDeletes;

    protected $table = "series";
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function company() {
        return $this->hasOne('App\Models\Company', 'id', 'company_id');
    }
    
    public function category() {
        return $this->hasOne('App\Models\Category', 'id', 'category_id');
    }
}
