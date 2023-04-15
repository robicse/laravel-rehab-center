<?php

namespace App\Http\Controllers\Writer;
use App\Models\RehubCenter;
use Illuminate\Http\Request;
use App\Helpers\ErrorTryCatch;
use Sohibd\Laravelslug\Generate;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class RehubCenterController extends Controller
{
    private $User;
    function __construct()
    {

        $this->middleware(function ($request, $next) {
            $this->User = Auth::user();
            if ($this->User->status == 0) {
                Toastr::warning("Your Account Deactive", "info");
                $request->session()->flush();
                return redirect('login');
            }
            return $next($request);
        });

       
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
           
            $User = $this->User;
             $data = RehubCenter::whereuser_id($User->id)->latest();
            if ($request->ajax()) {
               return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($data) use ($User) {
                        $btn = '<a href=' . route(request()->segment(1) . '.rehub-lists.edit', (encrypt($data->id))) . ' class="btn btn-info btn-sm waves-effect" style="margin-left: 5px"><i class="fa fa-edit"></i></a>';
                        return $btn;
                    })
                    ->addColumn('status', function ($data) {
                        if ($data->status == 0) {
                            return 'Pending';
                        } else {
                            return 'Publish';
                        }
                    })
                    ->addColumn('image', function ($data) {
                        return '<a title="Click for View" data-lightbox="roadtrip" href="' . asset($data->image) . '"><img id="demo-test-gallery" class="border-radius-lg shadow demo-gallery" src="' . asset($data->image) . '" height="40px" width="40px"/>';
                    })
                    ->addColumn('link', function ($data) {
                        return '<a title="Click for View" target="_blank" href="' . url('blog', $data->slug) . '"><i class="fa fa-link"></i></a>';
                    })
                    ->rawColumns(['image', 'action', 'status', 'link'])
                    ->make(true);
            }

            return view('backend.writer.rehub_centers.index');
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
    public function show(RehubCenter $rehubCenter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RehubCenter $rehubCenter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RehubCenter $rehubCenter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RehubCenter $rehubCenter)
    {
        //
    }
}
