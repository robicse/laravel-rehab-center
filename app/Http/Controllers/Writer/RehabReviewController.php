<?php

namespace App\Http\Controllers\Writer;
use App\Models\RehabReview;
 use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Helpers\ErrorTryCatch;
use Sohibd\Laravelslug\Generate;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Models\RehabCenter;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RehabReviewController extends Controller
{
    private $User;
    function __construct()
    {

        $this->middleware(function ($request, $next) {
            $this->User = Auth::user();
            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
       try {
            $data = RehabReview::with('rehabcenter')->whereuser_id(Auth::id())->latest();
            if ($request->ajax()) {
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($data) {
                        $btn = '<a href=' . url('rehab-center', $data->rehabcenter->slug) . ' class="btn btn-info btn-sm waves-effect" style="margin-left: 5px"><i class="fa fa-eye"></i></a>';
                        return $btn;
                    })
                    ->addColumn('status', function ($data) {
                        if ($data->status == 0) {
                            return 'Pending';
                        } else {
                            return 'Publish';
                        }
                    })
                   
                    ->rawColumns(['action','status'])
                    ->make(true);
            }

            return view('backend.writer.rehab_reviews.index');
        } catch (\Exception $e) {
            $response = ErrorTryCatch::createResponse(false, 500, 'Internal Server Error.', null);
            Toastr::error($response['message'], "Error");
            return back();
        }
    }

   
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $data = RehabReview::findOrFail(decrypt($id));
            $data->admin_seen=1;
            $data->save();
          return view('backend.common.rehab_reviews.edit')->with('rehabreviewdata', $data);
        } catch (\Exception $e) {
            DB::rollBack();
            $response = ErrorTryCatch::createResponse(false, 500, 'Internal Server Error.', null);
            Toastr::error($response['message'], "Error");
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
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
            $review =  RehabReview::find($id);
            if ($request->has('deletereview')) {
                RehabReview::destroy($id);
                    $rehab= RehabCenter::find($review->rehab_center);
                    $rehab->rating=RehabReview::wherestatus(1)->whererehab_center($review->rehab_center)->avg('rating')?:0;
                    $rehab->save();
                Toastr::warning("Rehab Review Delete Successfully", "Success");
            return redirect()->route(request()->segment(1) . '.rehab-review-lists.index');
            }
            DB::beginTransaction();
            $review->name = $request->name;
            $review->phone = $request->phone;
            $review->rating = $request->rating;
            $review->email = $request->email;
            $review->review_title = $request->review_title;
            $review->comment = $request->comment;
            $review->status = $request->status;
            $review->save();
            if ($review->status==1) {
             $rehab= RehabCenter::find($review->rehab_center);
             $rehab->rating=RehabReview::wherestatus(1)->whererehab_center($review->rehab_center)->avg('rating')?:0;
             $rehab->save();
            }
            
            DB::commit();
            Toastr::success("Rehab Review Update Successfully", "Success");
            return redirect()->route(request()->segment(1) . '.rehab-review-lists.index');
        } catch (\Exception $e) {
            DB::rollBack();
            $response = ErrorTryCatch::createResponse(false, 500, 'Internal Server Error.', null);
            Toastr::error($response['message'], "Error");
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $reha= RehabReview::find($id);
        RehabReview::destroy($id);
        $rehab= RehabCenter::find($reha->rehab_center);
        $rehab->rating=RehabReview::wherestatus(1)->whererehab_center($reha->rehab_center)->avg('rating')?:0;
        $rehab->save();
        return response()->json(['success' => true,],201);
    }

    public function updateStatus(Request $request)
    {
        $rehab = RehabReview::findOrFail($request->id);
        $rehab->status = $request->status;
        $rehab->admin_seen = 1;
        if ($rehab->save()) {
            $rehabrate= RehabCenter::find($rehab->rehab_center);
            $rehabrate->rating=RehabReview::wherestatus(1)->whererehab_center($rehab->rehab_center)->avg('rating')?:0;
            $rehabrate->save();
            return 1;
        }
        return 0;
    }
}
