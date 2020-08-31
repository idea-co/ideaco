<?php

namespace App;

use Conner\Tagging\Taggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Idea extends Model
{
    use Taggable;
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
     * @return belongsTo|BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo(OrganizationUser::class, 'user_id', 'id');
    }

    /**
     * Sometimes an idea belongs to a project
     *
     * @return belongsTo|BelongsTo
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class,'commentable');
    }
    public function votes(){
        return $this->morphMany(Vote::class,'votable');
    }
}
