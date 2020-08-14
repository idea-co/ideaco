<?php

namespace App;

use Illuminate\Auth\MustVerifyEmail as AuthMustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tests\Unit\OrganizationTest;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
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
