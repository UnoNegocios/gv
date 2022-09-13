<?php

namespace App\Http\Controllers\api\v1\podcast_serie;

use App\Http\Requests\podcast_serie\StorePodcastSerieRequest;
use App\Http\Requests\podcast_serie\UpdatePodcastSerieRequest;
use App\Models\PodcastSerie;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\podcast_serie\PodcastSerieResource;
use App\Http\Filters\podcast_serie\PodcastSerieFilter;


class PodcastSerieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return PodcastSerieFilter::execute($request);
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
     * @param  \App\Http\Requests\StorePodcastSerieRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePodcastSerieRequest $request)
    {
        $validated = $request->validated();
        $podcastSerie = PodcastSerie::create(
            $validated
        );
        return response(null, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PodcastSerie  $podcastSerie
     * @return \Illuminate\Http\Response
     */
    public function show(PodcastSerie $podcastSerie)
    {
        return new PodcastSerieResource($podcastSerie);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PodcastSerie  $podcastSerie
     * @return \Illuminate\Http\Response
     */
    public function edit(PodcastSerie $podcastSerie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePodcastSerieRequest  $request
     * @param  \App\Models\PodcastSerie  $podcastSerie
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePodcastSerieRequest $request, PodcastSerie $podcastSerie)
    {
        $validated = $request->validated();
        
        $podcastSerie->update($validated);
        return response(null, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PodcastSerie  $podcastSerie
     * @return \Illuminate\Http\Response
     */
    public function destroy(PodcastSerie $podcastSerie)
    {
        $podcastSerie->delete();
        return response(null, 204);
    }

    public function files(Request $request){
        $fileName = time() . '.' . $request->file->getClientOriginalExtension();
        $request->file->move(public_path('../public/files'), $fileName);
        return response()->json(['file' => $fileName]);
    }  
}
