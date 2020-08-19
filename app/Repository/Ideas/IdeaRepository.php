<?php

namespace App\Repository\Ideas;

use App\Idea;
/**
 * This class implements Idea interface to
 * offer the functionalities necessary to
 * manage Ideas
 * 
 * @author Samuel Olaegbe <olaegbesamuel@gmail.com>
 */
class IdeaRepository implements IdeaInterface
{
    protected $model;

    /**
     * Typehint the Idea model to the repository
     * 
     * @param $model object of App\Idea
     * 
     * @return App\Model
     */
    public function __construct(Idea $model)
    {
        $this->model = $model;
    }

    /**
     * @inheritDoc
     */
    public function create($data, $organizationId)
    {
        $idea = $this->model::create(
            [
                'title' => $data['title'],
                'project_id' => $data['project_id'] ?? null,
                'user_id' => $data['user_id'],
                'organization_id' => $organizationId,
                'body' => $data['body']
            ]
        );

        return $idea;
    }

    /**
     * @inheritDoc
     */
    public function edit($data, $id)
    {
        
    }

    /**
     * @inheritDoc
     */
    public function delete($id)
    {
        
    }

    /**
     * @inheritDoc
     */
    public function find($id)
    {
        return $this->model->find($id);
    }

    /**
     * @inheritDoc
     */
    public function findByAuthor($author, $organizationId)
    {
        return $this->model->where('user_id', $author)
            ->where('organization_id', $organizationId)
            ->first();
    }

    /**
     * @inheritDoc
     */
    public function search($query, $organizationId)
    {
        
    }
}