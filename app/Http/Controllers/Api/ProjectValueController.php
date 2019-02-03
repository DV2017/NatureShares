<?php

namespace App\Http\Controllers\Api;

use App\Value;
use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectResource;

class ProjectValueController extends Controller
{
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
   * Attach the project id to user in pivot table
   */
  public function attach(Project $project, Value $value)
  {
    $project->values()->syncWithoutDetaching($value);
    return response()->json(['message' => 'Attached']);
  }

  /**
   * Detach the project id from user in pivot table
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function detach(Project $project, Value $value)
  {
    $project->values()->detach($value);
    return response()->json(['message' => 'Detached']);
  }
}
