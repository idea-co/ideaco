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

    /**
     * Sometimes an idea belongs to a project
     * 
     * @return belongsTo
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
