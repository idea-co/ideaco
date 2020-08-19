<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class IdeaResource extends JsonResource
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
            'title' => $this->title,
            'body' => $this->body,
            '_owner' => new OrganizationUserResource($this->owner),
            '_project' => new ProjectResource($this->project),
            '_organization' => new OrganizationResource($this->organization),
        ]; 
    }
}
