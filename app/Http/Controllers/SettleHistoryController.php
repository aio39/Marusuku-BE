<?php

namespace App\Http\Controllers;

use App\Models\SettleHistory;
use App\Http\Requests\StoreSettleHistoryRequest;
use App\Http\Requests\UpdateSettleHistoryRequest;

class SettleHistoryController extends Controller
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
     * @param  \App\Http\Requests\StoreSettleHistoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSettleHistoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SettleHistory  $settleHistory
     * @return \Illuminate\Http\Response
     */
    public function show(SettleHistory $settleHistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SettleHistory  $settleHistory
     * @return \Illuminate\Http\Response
     */
    public function edit(SettleHistory $settleHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSettleHistoryRequest  $request
     * @param  \App\Models\SettleHistory  $settleHistory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSettleHistoryRequest $request, SettleHistory $settleHistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SettleHistory  $settleHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SettleHistory $settleHistory)
    {
        //
    }
}
