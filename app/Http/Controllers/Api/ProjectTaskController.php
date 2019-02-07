<?php

namespace App\Http\Controllers\Api;

use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectResource;
use App\Http\Requests\ProjectStoreRequest;

class ProjectTaskController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return new ProjectResource(Project::all());
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Project $project, ProjectStoreRequest $request)
  {
    $validated = $request->validated();
    /*
     * AJAX request can expect a response with 422 status code & error in JSON format.
     * https://medium.com/@kamerk22/the-smart-way-to-handle-request-validation-in-laravel-5e8886279271
     */

    //to do: authorise institutions to set up their projects. get company-id based on authenticated company id

    $project->create(request()->all());
    return response()->json(['message' => 'Project details stored.']);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show(Project $project)
  {
    return $project;
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(ProjectStoreRequest $request, Project $project)
  {
    $validated = $request->validated();

    //to do: authorise institutions to set up their projects. get company-id based on authenticated company id
    //can I do form requestes with

    $project->update(request()->all());
    return response()->json(['message' => 'Project details updated.']);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $project->delete();
    return response()->json(['message' => 'Deleted.']);
  }
}
