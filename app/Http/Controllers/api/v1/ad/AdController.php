<?php

namespace App\Http\Controllers\api\v1\ad;

use App\Http\Requests\ad\StoreAdRequest;
use App\Http\Requests\ad\UpdateAdRequest;
use App\Models\Ad;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\ad\AdResource;


class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AdResource::collection(Ad::paginate(15));
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
     * @param  \App\Http\Requests\StoreAdRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdRequest $request)
    {
        $validated = $request->validated();
        $ad = Ad::create(
            $validated
        );
        return response(null, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function show(Ad $ad)
    {
        return new AdResource($ad);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function edit(Ad $ad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdRequest  $request
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdRequest $request, Ad $ad)
    {
        $validated = $request->validated();
        
        $ad->update($validated);
        return response(null, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ad $ad)
    {
        $ad->delete();
        return response(null, 204);
    }

    public function files(Request $request){
        $fileName = time() . '.' . $request->file->getClientOriginalExtension();
        $request->file->move(public_path('../public/files'), $fileName);
        return response()->json(['file' => $fileName]);
    }  
}
