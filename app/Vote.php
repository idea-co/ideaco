<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vote extends Model
{
    use SoftDeletes;
    //
    protected $guarded = ['id'];
    public function user(){
        return $this->belongsTo(OrganizationUser::class, 'user_id', 'id');
    }
    public function Parent(){
        $this->morphTo();
    }
}
