<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;

    protected $table = "companies";
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function series() {
        return $this->hasMany('App\Models\Series', 'company_id');
    }
}
