<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Organization extends Model
{
    protected $table = 'organization';

    protected $fillable = ['name', 'shortname', 'owner_id'];

    /**
     * Relationship to find the members
     * of an organzation
     *
     * @return BelongsToMany
     */
    public function members()
    {
        return $this->belongsToMany(User::class)->withPivot(
            [
                'displayName', 'email', 'password', 'phone',
                'twitter', 'status', 'position', 'remember_token'
            ]
        );
    }

    /**
     * Relationship to connect a team 
     * with an organization
     * 
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function teams()
    {
        return $this->hasMany(Team::class, 'organization_id', 'id');
    }

    /***
     * Relationship to connect an organization
     * to an idea
     * 
     * @return hasMany
     */
    public function ideas()
    {
        return $this->hasMany(Idea::class);
    }
}
