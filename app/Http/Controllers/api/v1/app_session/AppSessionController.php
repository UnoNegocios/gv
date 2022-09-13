<?php

namespace App\Http\Controllers\api\v1\app_session;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAppSessionRequest;
use App\Http\Requests\UpdateAppSessionRequest;
use App\Models\AppSession;
use App\Http\Filters\app_session\AppSessionFilter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppSessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return AppSessionFilter::execute($request);
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
     * @param  \App\Http\Requests\StoreAppSessionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $app_session = AppSession::create([
            'user_id' => Auth::user()->id
        ]);
        return response(null, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AppSession  $appSession
     * @return \Illuminate\Http\Response
     */
    public function show(AppSession $appSession)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AppSession  $appSession
     * @return \Illuminate\Http\Response
     */
    public function edit(AppSession $appSession)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAppSessionRequest  $request
     * @param  \App\Models\AppSession  $appSession
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAppSessionRequest $request, AppSession $appSession)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AppSession  $appSession
     * @return \Illuminate\Http\Response
     */
    public function destroy(AppSession $appSession)
    {
        //
    }
}
