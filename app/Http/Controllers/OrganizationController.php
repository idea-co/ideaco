<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrganizationResource;
use App\Repository\Organizations\OrganizationRepositoryInterface;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    protected $model;

    public function __construct(OrganizationRepositoryInterface $model)
    {
        $this->model = $model;
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|max:100',
                'shortname' => 'unique:organization,shortname',
                'owner' => 'required'
            ]
        );

        $organization = $this->model->create($request);

        return (new OrganizationResource($organization));
    }

    /**
     * Display the specified resource.
     *
     * @param String  $shortname
     * 
     * @return Organization|bool
     */
    public function show($shortname)
    {
        return new OrganizationResource($this->model->find($shortname));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
