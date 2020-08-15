<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrganizationUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'displayName' => $this->displayName,
            'email' => $this->email,
            'phone' => $this->phone,
            'status' => $this->status,
            'twitter' => $this->twitter,
            /**
             * Adding this so that when we search for a single user
             * from an organization we can easily access the organization
             * data itself
             */
            'organization' => new OrganizationResource($this->organization),
        ];
    }
}
