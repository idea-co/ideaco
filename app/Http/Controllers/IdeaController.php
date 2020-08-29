<?php

namespace App\Http\Controllers;

use App\Http\Resources\IdeaCollection;
use App\Http\Resources\IdeaResource;
use App\Idea;
use App\Repository\Ideas\IdeaInterface;
use Illuminate\Http\Request;

class IdeaController extends Controller
{

    protected $repository;

    /**
     * Typehint the interface repository
     *
     * @param $repository the interface objeect
     *
     * @return $repository
     */
    public function __construct(IdeaInterface $repository)
    {
        $this->repository = $repository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $organizationId)
    {
        if(auth()->user()->organization_id != $organizationId){
            return  response(['message' => 'Unauthenticated.'],401);
        }
            $request->validate(
            [
                'title' => 'required',
                'body' => 'required',
            ]
        );

        $idea = $this->repository->create($request->all(), $organizationId);
        return new IdeaResource($idea);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Idea  $search
     * @return \Illuminate\Http\Response
     */
    public function show($search)
    {
        $foundIdea = $this->repository->find($search);

        return new IdeaResource($foundIdea);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Idea  $idea
     * @return \Illuminate\Http\Response
     */
    public function edit(Idea $idea)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * We only want to update the title or the body
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Idea  $idea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idea)
    {
        $request->validate(
            [
                'title' => 'required',
                'body' => 'required',
            ]
        );

        $idea = $this->repository->update($request->all(), $idea);

        return new IdeaResource($idea);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Idea  $idea
     * @return \Illuminate\Http\Response
     */
    public function destroy(Idea $idea)
    {
        //
    }

    /**
     * Find all ideas belonging to an author
     *
     * @param $author         id of the idea author
     * @param $organizationId id of the organization
     *
     * @return ResourceCollection
     */
    public function findByAuthor($author, $organizationId)
    {
        $ideas = $this->repository->findByAuthor($author, $organizationId);
        return new IdeaCollection($ideas);
    }

    /**
     * Mark an idea as implemented
     *
     * @param $idea id of the idea to implement
     *
     * @return bool
     */
    public function implement($idea)
    {
        return $this->repository->implement($idea);
    }

    /**
     * Archive a single idea provided via the url
     * or archive a group of ideas provided via a
     * form request
     *
     * @param Integer|Array $idea
     *
     * @return bool
     */
    public function archive(Request $request)
    {
        return $this->repository->archive($request->all());
    }
}
