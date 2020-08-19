<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    protected $guarded = ['id'];

    /**
     * The organization owning this idea
     * 
     * @return belongsTo
     */
    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    /**
     * The user owning this idea
     * 
     * @return belongsTo
     */
    public function owner()
    {
        return $this->belongsTo(User::class);
    }
}
