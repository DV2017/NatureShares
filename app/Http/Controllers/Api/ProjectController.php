<?php

namespace App\Http\Controllers\Api;

use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\ProjectResource;
use App\Http\Requests\ProjectStoreRequest;

class ProjectController extends Controller
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
   * AUTH GUARD: for 'hosts' only
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Project $project, ProjectStoreRequest $request)
  {
    $validated = $request->validated();
    $project->create(request()->all());
    return response()->json(['message' => 'Project details stored.']);
  }

  /**
   * Attach the project id to user in pivot table
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function attach(Project $project)
  {
    $user = Auth::user();
    if ($user) {
      $project->users()->syncWithoutDetaching($user->id);
      return response()->json(['message' => 'Attached']);
    } else {
      return response()->json(['message' => 'User not found.']);
    }
    //return $project->users()->syncWithoutDetaching(auth()->id());
  }

  /**
   * Display the specified resource.
   * 
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show(Project $project)
  {
    return new ProjectResource($project);
  }

  /**
   * Display all values belongsToMany projects
   */
  public function values(Project $project)
  {
    return new ProjectResource($project->values);
  }

  /**
   * Update the specified resource in storage.
   * AUTH GUARD: for 'hosts' only
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(ProjectStoreRequest $request, Project $project)
  {
    $validated = $request->validated();
    $project->update(request()->all());
    return response()->json(['message' => 'Project details updated.']);
  }

  /**
   * Remove the specified resource from storage.
   * 
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function detach(Project $project)
  {
    $user = Auth::user();
    if ($user) {
      $project->users()->detach($user->id);
      return response()->json(['message' => 'Detached']);
    } else {
      return response()->json(['message' => 'User not found.']);
    }
  }

  /**
   * Remove the specified resource from storage.
   * AUTH GUARD: for 'hosts' only
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Project $project)
  {
    $project->delete();
    return response()->json(['message' => 'Deleted.']);
  }
}
