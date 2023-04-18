<?php

namespace App\Http\Controllers;
use App\Models\Zipcode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OnChangeController extends Controller
{
    /**
     * get Zip Code Data.
     */
    public function getZipCode($id)
    {
        return Zipcode::wherestate($id)->get(['zip','city']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(RehabCenter $RehabCenter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RehabCenter $RehabCenter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RehabCenter $RehabCenter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RehabCenter $RehabCenter)
    {
        //
    }
}
