<?php

namespace App\Http\Controllers\api\v1\ad_category;

use App\Http\Requests\StoreAdCategoryRequest;
use App\Http\Requests\UpdateAdCategoryRequest;
use App\Models\AdCategory;
use App\Http\Filters\AdCategoryFilter;
use App\Http\Resources\ad_campaign\AdCategoryResource;

class AdCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AdCategory::all();
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
     * @param  \App\Http\Requests\StoreAdCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdCategoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdCategory  $adCategory
     * @return \Illuminate\Http\Response
     */
    public function show(AdCategory $adCategory)
    {
        return new AdCategoryResource($adCategory);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdCategory  $adCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(AdCategory $adCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdCategoryRequest  $request
     * @param  \App\Models\AdCategory  $adCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdCategoryRequest $request, AdCategory $adCategory)
    {
        $validated = $request->validated();
        
        $adCategory->update($validated);
        return response(null, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdCategory  $adCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdCategory $adCategory)
    {
        $adCategory->delete();
        return response(null, 204);
    }
}
