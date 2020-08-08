<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $table = 'organization';

    protected $fillable = ['name', 'email', 'shortname'];

    /**
     * Relationship to find the members
     * of an organzation
     * 
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function members()
    {
        return $this->hasMany(User::class, 'organization_id', 'id');
    }
}
