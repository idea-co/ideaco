<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrganizationUserResource extends JsonResource
{
    public static $wrap = 'OrganizationUser';
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'displayName' => $this->displayName,
            '_self' => [
                'user' => new UserResource($this->user)
            ],
        ];
    }
}
