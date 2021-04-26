<?php

namespace App\Http\Controllers;

use App\Models\AuthenticatedUser;
use Illuminate\Http\Request;

class UserController extends Controller
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
     * @param  \App\Models\AuthenticatedUser  $authenticatedUser
     * @return \Illuminate\Http\Response
     */
    public function show(AuthenticatedUser $authenticatedUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AuthenticatedUser  $authenticatedUser
     * @return \Illuminate\Http\Response
     */
    public function edit(AuthenticatedUser $authenticatedUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AuthenticatedUser  $authenticatedUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AuthenticatedUser $authenticatedUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AuthenticatedUser  $authenticatedUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(AuthenticatedUser $authenticatedUser)
    {
        //
    }
}