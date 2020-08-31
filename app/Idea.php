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
        return $this->belongsTo(Organization::class, 'organization_id', 'id');
    }

    /**
     * The user owning this idea which must
     * have already belonged to the organization
     *
     * @return belongsTo
     */
    public function owner()
    {
        return $this->belongsTo(OrganizationUser::class, 'user_id', 'id');
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

    public function comments()
    {
        return $this->morphMany(Comment::class,'commentable');
    }
}
