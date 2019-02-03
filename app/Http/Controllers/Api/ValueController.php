<?php

namespace App\Http\Controllers\Api;

use App\Value;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\ValueResource;

class ValueController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return new ValueResource(Value::all());
  }

  /**
   * Attach the value to user in pivot table
   */
  public function attach(Value $value)
  {
    $user = Auth::guard('api')->user();
    if ($user) {
      $value->users()->syncWithoutDetaching($user->id);
      return response()->json(['message' => 'Attached']);
    } else {
      return response()->json(['message' => 'User not found.']);
    }

  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show(Value $value)
  {
    return new ValueResource($value);
  }

  /**
   * Display all projects 'belongsToMany' values
   */
  public function showProjects(Value $value)
  {
    return new ValueResource($value->projects);
  }

  /**
   * Detach the value id from user in pivot table
   */
  public function detach(Value $value)
  {
    $user = Auth::guard('api')->user();
    if ($user) {
      $value->users()->detach($user->id);
      return response()->json(['message' => 'Detached']);
    } else {
      return response()->json(['message' => 'User not found.']);
    }
  }
}
