<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    /**
     * @return BelongsTo
     */
    public function User(){
        return $this->belongsTo(OrganizationUser::class, 'user_id', 'id');
    }

    /**
     * @return MorphTo
     */
    public function parent()
    {
        return $this->morphTo();
    }
}
