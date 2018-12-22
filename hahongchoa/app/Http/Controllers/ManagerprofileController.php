<?php

namespace App\Http\Controllers;

use App\Imageroom;
use Illuminate\Http\Request;

class ManagerprofileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return view('managerroom');
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Imageroom  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Imageroom $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Imageroom  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Imageroom $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Imageroom  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Imageroom $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Imageroom  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Imageroom $profile)
    {
        //
    }
}
