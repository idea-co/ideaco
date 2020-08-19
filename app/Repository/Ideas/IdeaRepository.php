<?php

namespace App\Repository\Ideas;

use App\Idea;
use Exception;

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
    public function update($data, $id)
    {
        $idea = $this->model->where(['id' => $id])
            ->update( 
                [
                    'title' => $data['title'],
                    'body' => $data['body'],
                ]
            );

        if (!$idea) {
            throw new Exception("Failed to update idea");
        }

        return $this->model->find($id);
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
        $id = (int) $id;

        return $this->model->find($id);
    }

    /**
     * @inheritDoc
     */
    public function findByAuthor($author, $organizationId)
    {
        return $this->model->where('user_id', $author)
            ->where('organization_id', $organizationId)
            ->get();
    }

    /**
     * @inheritDoc
     */
    public function search($query, $organizationId)
    {
        
    }

    /**
     * @inheritDoc
     * 
    */
    public function implement($idea)
    {
        $idea = $this->model->where('id', $idea)
            ->update(['status' => 'Implemented']);

        if (!$idea) {
            throw new Exception("Failed to mark idea as implemented");
        }

        return true;
    }

    /**
     * @inheritDoc
     * 
    */
    public function archive($id)
    {
        //if it's an array, it will be a form object
        if (!is_array($id['ideas'])) {
            $idea = $this->model->where(['id' => $id])
                ->update(['status' => 'Archived']);

            if (!$idea) {
                throw new Exception("Failed to archive idea");
            }

            return true;
        } else {
            try {
                foreach ($id['ideas'] as $key => $value) {
                    $this->model->where(['id' => $value])
                        ->update(['status' => 'Archived']);
                }
            } catch (\Throwable $th) {
                throw $th;
            }
    
            return true;
        }
    }
}