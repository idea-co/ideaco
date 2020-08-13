<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class OrganizationUser extends Authenticatable
{
    use HasApiTokens, Notifiable;
    //
    protected $guarded = ['id'];

    protected $table = 'organization_user';
    /**
     * @return BelongsTo
     */
    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
    public function user()
    {
        return$this->belongsTo(User::class);
    }

}
