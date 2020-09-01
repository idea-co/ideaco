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
            'status' => $this->status,
            'tags' => TagResource::collection($this->tags),
            'Votes_count' =>count($this->votes),
            'votes' => VoteResource::collection($this->votes),
            '_owner' => new OrganizationUserResource($this->owner),
            '_project' => new ProjectResource($this->project),
            'comments_count' => count($this->comments),
            'comments' =>CommentResource::collection($this->comments),
            '_organization' => new OrganizationResource($this->organization),
        ];
    }
}
