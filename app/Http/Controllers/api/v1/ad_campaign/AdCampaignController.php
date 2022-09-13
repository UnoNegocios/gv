<?php

namespace App\Http\Controllers\api\v1\ad_campaign;

use App\Http\Requests\ad_campaign\StoreAdCampaignRequest;
use App\Http\Requests\ad_campaign\UpdateAdCampaignRequest;
use App\Models\AdCampaign;
use App\Http\Filters\ad_campaign\AdCampaignFilter;
use App\Http\Resources\ad_campaign\AdCampaignResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdCampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return AdCampaignFilter::execute($request);
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
     * @param  \App\Http\Requests\StoreAdCampaignRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdCampaignRequest $request)
    {
        $validated = $request->validated();
        $adCampaign = AdCampaign::create(
            $validated
        );
        return response(null, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdCampaign  $adCampaign
     * @return \Illuminate\Http\Response
     */
    public function show(AdCampaign $adCampaign)
    {
        return New AdCampaignResource($adCampaign);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdCampaign  $adCampaign
     * @return \Illuminate\Http\Response
     */
    public function edit(AdCampaign $adCampaign)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdCampaignRequest  $request
     * @param  \App\Models\AdCampaign  $adCampaign
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdCampaignRequest $request, AdCampaign $adCampaign)
    {
        $validated = $request->validated();
        
        $adCampaign->update($validated);
        return response(null, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdCampaign  $adCampaign
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdCampaign $adCampaign)
    {
        $adCampaign->delete();
        return response(null, 204);
    }

    public function ads(Request $request, AdCampaign $adCampaign)
    {
        //$adCampaign = AdCampaign::findOrFail($request->id);

        return $adCampaign->ads;
    }
}
