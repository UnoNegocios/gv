<?php

namespace App\Http\Controllers\api\v1\podcast;

use App\Http\Requests\podcast\StorePodcastRequest;
use App\Http\Requests\podcast\UpdatePodcastRequest;
use App\Models\Podcast;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Filters\podcast\PodcastFilter;
use App\Http\Resources\podcast\PodcastResource;

class PodcastController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return PodcastFilter::execute($request);
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
     * @param  \App\Http\Requests\StorePodcastRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePodcastRequest $request)
    {
        $validated = $request->validated();
        $podcast = Podcast::create(
            $validated
        );
        return response(null, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Podcast  $podcast
     * @return \Illuminate\Http\Response
     */
    public function show(Podcast $podcast)
    {
        return new PodcastResource($podcast);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Podcast  $podcast
     * @return \Illuminate\Http\Response
     */
    public function edit(Podcast $podcast)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePodcastRequest  $request
     * @param  \App\Models\Podcast  $podcast
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePodcastRequest $request, Podcast $podcast)
    {
        $validated = $request->validated();
        $podcast->update($validated);
        return response(null, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Podcast  $podcast
     * @return \Illuminate\Http\Response
     */
    public function destroy(Podcast $podcast)
    {
        $podcast->delete();
        return response(null, 204);
    }
}
