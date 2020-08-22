<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The organization a user belongs to.
     * A query builder may be chained to
     * this method to get only a specific
     * organization.
     *
     * @return BelongsToMany
     */
    public function organizations()
    {
        return $this->belongsToMany(Organization::class)->withPivot(
            [
                'displayName', 'email', 'password', 'phone',
                'twitter', 'status', 'position', 'remember_token'
            ]
        );
    }
}
