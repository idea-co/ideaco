<?php

namespace App\Repository\Ideas;

interface IdeaInterface
{
    /**
     * Create a new idea
     * 
     * @param $data           form data to create an idea with
     * @param $organizationId unique id of the organization to create with 
     * 
     * @return App\Idea
     */
    public function create($data, $organizationId);

    /**
     * Edit an idea
     * 
     * @param $data the new idea data
     * @param $id   unique id of the data
     * 
     * @return App\Idea
     */
    public function update($data, $id);

    /**
     * Delete an idea
     * 
     * @param $id the unique id of the idea to delete
     * 
     * @return bool
     */
    public function delete($id);

    /**
     * Find an idea by id
     * 
     * @param $id the unique id of the idea
     * 
     * @return App\Idea
     */
    public function find($id);

    /**
     * Find ideas within an organization
     * belonging to a certain author
     * 
     * @param $author         the unique id of the author
     * @param $organizationId the unique id of the organization
     * 
     * @return App\Idea
     */
    public function findByAuthor($author, $organizationId);

    /**
     * Search for ideas by keywords within
     * an organization
     * 
     * @param $query          the keyword to filter ideas by
     * @param $organizationId the organization to search within
     * 
     * @return App\Idea
     */
    public function search($query, $organizationId);
}