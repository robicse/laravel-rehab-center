<?php
namespace App\Http\Controllers\Common;

use File;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Redirect;
use App\Helpers\ErrorTryCatch;

class SliderController extends Controller
{
    function __construct()
    {

        $this->middleware(function ($request, $next) {
            $this->User = Auth::user();
            if ($this->User->status == 0) {
                $request->session()->flush();
                return redirect('login');
            }
            return $next($request);
        });

        $this->middleware('permission:sliders-list', ['only' => ['index', 'show']]);
        $this->middleware('permission:sliders-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:sliders-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:sliders-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {

        try {
            $User = $this->User;

            if ($User->user_type == 'Admin') {
                $data = Slider::whereuser_id($User->id)->latest();
            } else {
                $data = Slider::latest();
            }
            if ($request->ajax()) {

                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($data) use ($User) {
                        $btn = '';
                        if ($User->can('sliders-edit')) {
                            $btn = '<a href=' . route(request()->segment(1) . '.sliders.edit', $data->id) . ' class="btn btn-info btn-sm waves-effect" style="margin-left: 5px"><i class="fa fa-edit"></i></a>';
                        }
                        $btn .= '</span>';
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
                        return '<a title="Click for View" data-lightbox="roadtrip" href="' . asset($data->image) . '"><img id="demo-test-gallery" class="border-radius-lg shadow demo-gallery" src="' . asset($data->image) . '" height="40px" width="40px"  />';

                    })
                    ->rawColumns(['image', 'action', 'status'])
                    ->make(true);
            }

            return view('backend.common.sliders.index');
        } catch (\Exception $e) {
            $response = ErrorTryCatch::createResponse(false, 500, 'Internal Server Error.', null);
            Toastr::error($response['message'], "Error");
            return back();
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('backend.common.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'short_description' => 'required|min:1|max:350',
                'long_description' => 'required|min:3|max:1000',
                'image' => 'required',
            ],
            [
                'short_description.required' => "The Short Description name field is required",
                'short_description.min' => "The Short Description Minimum Length 1",
                'short_description.max' => "The Short Description Maximum Length 350",
                'long_description.required' => "The Long Description name field is required",
                'long_description.min' => "The Long Description Minimum Length 1",
                'long_description.max' => "The Long Description Maximum Length 1000",

            ]
        );

        try {
            DB::beginTransaction();
            $slider = new Slider();
            $slider->user_id = $this->User->id;
            $slider->short_description = $request->short_description;
            $slider->long_description = $request->long_description;
            $slider->image = $request->image;
            $slider->save();
            DB::commit();

            Toastr::success("Slider Created Successfully", "Success");
            return redirect()->route(request()->segment(1) . '.sliders.index');
        } catch (\Exception $e) {
            DB::rollBack();
            $response = ErrorTryCatch::createResponse(false, 500, 'Internal Server Error.', null);
            Toastr::error($response['message'], "Error");
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $User = $this->User;
            if ($User->user_type == 'Admin') {
                $data = Slider::whereuser_id($User->id)->findOrFail($id);
            } else {
                $data = Slider::findOrFail($id);
            }
            return view('backend.common.sliders.show')->with('slider', $data);
        } catch (\Exception $e) {
            DB::rollBack();
            $response = ErrorTryCatch::createResponse(false, 500, 'Internal Server Error.', null);
            Toastr::error($response['message'], "Error");
            return back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $User = $this->User;
            if ($User->user_type == 'Admin') {
                $data = Slider::whereuser_id($User->id)->findOrFail($id);
            } else {
                $data = Slider::findOrFail($id);
            }
            return view('backend.common.sliders.edit')->with('slider', $data);
        } catch (\Exception $e) {
            DB::rollBack();
            $response = ErrorTryCatch::createResponse(false, 500, 'Internal Server Error.', null);
            Toastr::error($response['message'], "Error");
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'short_description' => 'required|min:1|max:350',
                'long_description' => 'required|min:3|max:1000',
                'image' => 'required|min:1',

            ],
            [
                'short_description.required' => "The Short Description name field is required",
                'short_description.min' => "The Short Description Minimum Length 1",
                'short_description.max' => "The Short Description Maximum Length 350",
                'long_description.required' => "The Long Description name field is required",
                'long_description.min' => "The Long Description Minimum Length 1",
                'long_description.max' => "The Long Description Maximum Length 1000",

            ]
        );

        try {
            DB::beginTransaction();
            $slider = Slider::find($id);
            $slider->user_id = $this->User->id;
            $slider->short_description = $request->short_description;
            $slider->long_description = $request->long_description;
           $slider->image = $request->image;
            $slider->save();
            DB::commit();

            Toastr::success("Slider Update Successfully", "Success");
            return redirect()->route(request()->segment(1) . '.sliders.index');
        } catch (\Exception $e) {
            DB::rollBack();
            $response = ErrorTryCatch::createResponse(false, 500, 'Internal Server Error.', null);
            Toastr::error($response['message'], "Error");
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        //
    }
    public function updateStatus(Request $request)
    {
        $slider = Slider::findOrFail($request->id);
        $slider->status = $request->status;
        if ($slider->save()) {
            return 1;
        }
        return 0;
    }
}