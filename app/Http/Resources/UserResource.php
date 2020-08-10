<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Remember to use the static method {$collection}
 * when returning an array of responses
 */
class UserResource extends JsonResource
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
            'id' => $this->id,
            'email' => $this->email,
            'registered_on' => Carbon::parse($this->created_on),
            '_self' => [
                'organizations' => OrganizationResource
                                    ::collection($this->organizations),
            ]
        ];
    }
}
