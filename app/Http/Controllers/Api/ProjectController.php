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
   * Attach the project id to user in pivot table
   */
  public function attach(Project $project)
  {
    $user = Auth::guard('api')->user();
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
  public function showValues(Project $project)
  {
    return new ProjectResource($project->values);
  }

  /**
   * Detach project id from user in pivot table
   */
  public function detach(Project $project)
  {
    $user = Auth::guard('api')->user();
    if ($user) {
      $project->users()->detach($user->id);
      return response()->json(['message' => 'Detached']);
    } else {
      return response()->json(['message' => 'User not found.']);
    }
  }

}
