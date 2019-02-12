<?php

namespace App\Http\Controllers\Api;

use App\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CompanyResource;
use App\Http\Requests\CompanyStoreRequest;

class CompanyController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return new CompanyResource(Company::all());
  }

  /**
   * Store a newly created resource in storage.
   * AUTH GUARD : for 'hosts' only
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(CompanyStoreRequest $request, Company $company)
  {
    $validated = $request->validated();
    $company->create($request->all());
    return response()->json(['message' => 'Company details stored.']);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show(Company $company)
  {
    return new CompanyResource($company);
  }

  /**
   * Update the specified resource in storage.
   * AUTH GUARD : for 'hosts' only
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(CompanyStoreRequest $request, Company $company)
  {
    $validated = $request->validated();
    $company->update(request()->all());
    return response()->json(['message' => 'Company details updated.']);
  }

  /**
   * Remove the specified resource from storage.
   * AUTH GUARD : for 'hosts' only
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Company $company)
  {
    $company->delete();
    return response()->json(['message' => 'Deleted']);
  }

  /**
   * show projects scoped to the company
   */
  public function projects(Company $company)
  {
    return new CompanyResource($company->projects);
  }
}
