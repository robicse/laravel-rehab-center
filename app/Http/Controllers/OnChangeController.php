<?php

namespace App\Http\Controllers;
use App\Models\Zipcode;
use App\Models\RehabSlider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Storage;

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
    public function deleteSliderImage($id)
    {
        
      $slider =  RehabSlider::find($id);
      $slider = Storage::delete(@$slider->slider_image);
      RehabSlider::whereid($id)->delete();
      return response(true);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //
    }
}
