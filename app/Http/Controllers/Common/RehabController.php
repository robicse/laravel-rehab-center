<?php

namespace App\Http\Controllers\Common;
use App\Models\User;
use App\Models\RehabCenter;
use App\Models\RehabSlider;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Helpers\ErrorTryCatch;
use Sohibd\Laravelslug\Generate;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use App\Notifications\Usernotification;
use Illuminate\Support\Facades\Storage;

class RehabController extends Controller
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

            $data = RehabCenter::with('user')->latest();
            if ($request->ajax()) {
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($data) {
                        $btn = '<a href=' . route(request()->segment(1) . '.rehab-lists.edit', (encrypt($data->id))) . ' class="btn btn-info btn-sm waves-effect" style="margin-left: 5px"><i class="fa fa-edit"></i></a><button type="button"   title="Delete"   id="deleteBtn" rid="' . $data->id . '" class="btn btn-danger btn-sm waves-effect"><i class="fas fa-trash"></i></button>';
                        return $btn;
                    })
                    ->addColumn('status', function ($data) {
                        if ($data->status == 0) {
                            return '<div class="form-check form-switch"><input type="checkbox" id="flexSwitchCheckDefault" onchange="updateStatus(this)" class="form-check-input"  value=' . $data->id . ' /></div>';
                        } else {
                            return '<div class="form-check form-switch"><input type="checkbox" id="flexSwitchCheckDefault" checked="" onchange="updateStatus(this)" class="form-check-input"  value=' . $data->id . ' /></div>';
                        }
                    })
                    ->addColumn('image', function ($data) {
                        return '<a title="Click for View" data-lightbox="roadtrip" href="' . asset($data->image) . '"><img id="demo-test-gallery" class="border-radius-lg shadow demo-gallery" src="' . asset($data->image) . '" height="40px" width="40px"/>';
                    })
                    ->addColumn('link', function ($data) {
                        return '<a title="Click for View" target="_blank" href="' . url('rehab-center', $data->slug) . '"><i class="fa fa-link"></i></a>';
                    })
                    ->rawColumns(['image', 'action', 'status', 'link'])
                    ->make(true);
            }

            return view('backend.common.rehab_centers.index');
        } catch (\Exception $e) {
            $response = ErrorTryCatch::createResponse(false, 500, 'Internal Server Error.', null);
            Toastr::error($response['message'], "Error");
            return back();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.common.rehab_centers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->validate(
            $request,
            [
                'rehab_name' => 'required|min:1|max:198',
                'email_address' => 'required|email|min:1|max:198',
                'description' => 'required|min:1',
                'address' => 'required|min:1|max:400',
                'facilities.*' => 'required',
                'insurance_accepts.*' => 'required',
                'phone_number' => 'required|min:9',
                'country_name' => 'required',
                'state_name' => 'required',
                'zip_code' => 'required',
                'short_description' => 'required|min:250|max:500',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:1024',

            ],
            [
                'short_description.required' => "The Short Description name field is required",
                'short_description.min' => "The Short Description Minimum Length 250",
                'short_description.max' => "The Short Description Maximum Length 500",



            ]
        );

        try {
            DB::beginTransaction();
            $rehab = new RehabCenter();
            $rehab->user_id = $this->User->id;
            $rehab->rehab_name = $request->rehab_name;
            $rehab->state_name = $request->state_name;
            $rehab->country_name = $request->country_name;
            $rehab->phone_number = $request->phone_number;
            $rehab->address = $request->address;
            $rehab->website = $request->website;
            $rehab->zip_code = $request->zip_code;
            $rehab->category_id = 1;
            $rehab->slug = Generate::Slug($request->rehab_name . $request->country_name . $request->state_name . $request->zip_code);
            $rehab->meta_title =  $request->rehab_name;
            $rehab->meta_description = Str::words($request->short_description, '30');
            $rehab->short_description = $request->short_description;
            $rehab->description = $request->description;
            $rehab->fax_number = $request->fax_number;
            $rehab->email_address = $request->email_address;
            $rehab->map_lat = $request->map_lat;
            $rehab->map_lng = $request->map_lng;
            $rehab->facilities = json_encode($request->facilities);
            $rehab->insurance_accepts = json_encode($request->insurance_accepts);
            $rehab->youtube = $request->youtube;
            $rehab->twitter = $request->twitter;
            $rehab->pinterest = $request->pinterest;
            $rehab->facebook = $request->facebook;
            $rehab->created_by_user_id = Auth::id();
            $rehab->updated_by_user_id = Auth::id();
            $rehab->json_screma = $request->json_screma;
            $rehab->status = $request->status;
            $rehab->image = $request->image->store('/');
            $rehab->save();

            if ($request->hasFile('slider_image')) {
                $this->validate(
                    $request,
                    ['slider_image.*' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:1024']
                );

                foreach ($request->slider_image as  $thumphoto) {
                    $slider = new RehabSlider();
                    $slider->rehab_center = $rehab->id;
                    $slider->slider_image = $thumphoto->store('/');
                    $slider->save();
                }
            }
            
            DB::commit();
            Toastr::success("Rehab Center  Created Successfully", "Success");
            return redirect()->route(request()->segment(1) . '.rehab-lists.index');
        } catch (\Exception $e) {
            DB::rollBack();
            $response = ErrorTryCatch::createResponse(false, 500, 'Internal Server Error.', null);
            Toastr::error($response['message'], "Error");
            return back();
        }
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
    public function edit($id)
    {
        try {
            $data = RehabCenter::with('rehabslider')->findOrFail(decrypt($id));
            if($data->admin_seen==0){
                $message = [
                    'message' => 'Hi ' . Auth::user()->name . ' . Just Seen Your  ' .$data->rehab_name ,
    
                ];
                User::find($data->user_id)->notify(new Usernotification($message));
            }
            $data->admin_seen=1;
            $data->save();
            $jsonInsuranceAccepts = json_decode($data->insurance_accepts); {
                $insurance = array();
                for ($i = 0; $i < count($jsonInsuranceAccepts); $i++) {
                    $insurance[] = array('name' => ($jsonInsuranceAccepts[$i]));
                }
                $insuranceAccepts = collect($insurance)->pluck('name', 'name');
            }
            return view('backend.common.rehab_centers.edit', compact('insuranceAccepts'))->with('rehabdata', $data);
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
                'rehab_name' => 'required|min:1|max:198',
                'email_address' => 'required|email|min:1|max:198',
                'description' => 'required|min:1',
                'address' => 'required|min:1|max:400',
                'facilities.*' => 'required',
                'insurance_accepts.*' => 'required',
                'phone_number' => 'required|min:9',
                'country_name' => 'required',
                'state_name' => 'required',
                'zip_code' => 'required',
                'short_description' => 'required|min:250|max:500',

            ],
            [
                'short_description.required' => "The Short Description name field is required",
                'short_description.min' => "The Short Description Minimum Length 250",
                'short_description.max' => "The Short Description Maximum Length 500",

            ]
        );

        try {
            DB::beginTransaction();
            $rehab = RehabCenter::find($id);
            $rehab->rehab_name = $request->rehab_name;
            $rehab->state_name = $request->state_name;
            $rehab->country_name = $request->country_name;
            $rehab->phone_number = $request->phone_number;
            $rehab->address = $request->address;
            $rehab->website = $request->website;
            $rehab->zip_code = $request->zip_code;
            $rehab->category_id = 1;
            $rehab->slug = Generate::Slug($request->rehab_name . $request->country_name . $request->state_name . $request->zip_code);
            $rehab->meta_title =  $request->rehab_name;
            $rehab->meta_description = Str::words($request->short_description, '30');
            $rehab->short_description = $request->short_description;
            $rehab->description = $request->description;
            $rehab->fax_number = $request->fax_number;
            $rehab->email_address = $request->email_address;
            $rehab->map_lat = $request->map_lat;
            $rehab->map_lng = $request->map_lng;
            $rehab->facilities = json_encode($request->facilities);
            $rehab->insurance_accepts = json_encode($request->insurance_accepts);
            $rehab->youtube = $request->youtube;
            $rehab->twitter = $request->twitter;
            $rehab->pinterest = $request->pinterest;
            $rehab->facebook = $request->facebook;
           $rehab->json_screma = $request->json_screma;
            $rehab->status = $request->status;
            $rehab->updated_by_user_id = Auth::id();
            if ($request->hasFile('image')) {
                $this->validate($request,
                    [
                        'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:1024'
                    ]
                );
                Storage::delete(@$rehab->image);
                $rehab->image = $request->image->store('/');
            }
            $rehab->save();
            if ($request->hasFile('slider_image')) {
                $this->validate(
                    $request,
                    ['slider_image.*' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:1024']
                );

                foreach ($request->slider_image as  $thumphoto) {
                    $slider = new RehabSlider();
                    $slider->rehab_center = $rehab->id;
                    $slider->slider_image = $thumphoto->store('/');
                    $slider->save();
                }
            }
            
            DB::commit();
            Toastr::success("Rehab Center Created Successfully", "Success");
            return redirect()->route(request()->segment(1) . '.rehab-lists.index');
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
       
        $rehab = RehabCenter::with('rehabslider')->findOrFail($id);
        foreach ($rehab->rehabslider as  $info) {
            $slider = RehabSlider::find($info->id);
            Storage::delete(@$slider->slider_image);
            $slider->delete();
        }
         Storage::delete(@$rehab->image);
        $rehab->delete();
        return response()->json(['success' => true,],201);
    }

    public function updateStatus(Request $request)
    {
        $rehab = RehabCenter::findOrFail($request->id);
        if($rehab->admin_seen==0){
            $data = [
                'message' => 'Hi ' . Auth::user()->name . ' . Just Seen Your  ' .$rehab->rehab_name ,

            ];
            User::find($rehab->user_id)->notify(new Usernotification($data));
        }
        if($rehab->status==0){
            $data = [
                'message' => 'Hi ' . Auth::user()->name . ' . Just Approve Your  ' .$rehab->rehab_name ,

            ];
            User::find($rehab->user_id)->notify(new Usernotification($data));
        }
        $rehab->status = $request->status;
        $rehab->admin_seen = 1;
        if ($rehab->save()) {
            return 1;
        }
        return 0;
    }
}
