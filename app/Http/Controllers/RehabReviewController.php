<?php

namespace App\Http\Controllers;
use App\Models\RehabReview;
use Illuminate\Http\Request;
use App\Helpers\ErrorTryCatch;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RehabReviewController extends Controller
{
    public function store(Request $request)
    {

        $this->validate(
            $request,
            [ 
                'name' => 'required|min:1|max:100',
                'phone' => 'required|min:1|max:30',
                'email' => 'required|email|min:1|max:100',
                'review_title' => 'required|min:1|max:198',
                'comment' => 'required|min:3|max:4000',
                'rating' => 'required',
                
            ],
            [
                'review_title.required' => "The review field is required",
                'review_title.min' => "The review minimum length 1",
                'review_title.max' => "The review  maximum length 190",
                
            ]
        );

        try {
           
            DB::beginTransaction();
           
            $review = new RehabReview();
            $review->rehab_center = $request->rehab_id;
            $review->user_id = Auth::id()?:'Null';
            $review->name = $request->name;
            $review->phone = $request->phone;
            $review->rating = $request->rating;
            $review->email = $request->email;
            $review->review_title = $request->review_title;
            $review->comment = $request->comment;
            $review->save();
            DB::commit();
          Session::flash('message', 'Review Sent Successfully!');
        return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            Session::flash('message', 'Something went wrong! Please try again !');
            return redirect()->back();
        }
    }
}
