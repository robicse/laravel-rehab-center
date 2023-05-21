<?php

namespace App\Http\Controllers\Common;
use App\Models\Subscribe;
use Illuminate\Http\Request;
use App\Helpers\ErrorTryCatch;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class SubscribeController extends Controller
{
    private $User;
    public function index(Request $request)
    {

        try {
            $User = $this->User;
          $data = Subscribe::latest();
           
            if ($request->ajax()) {

                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($data) use ($User) {
                       $btn = '<a href=' . route(request()->segment(1) . '.subscribes.edit', (encrypt($data->id))) . ' class="btn btn-info btn-sm waves-effect" style="margin-left: 5px"><i class="fa fa-edit"></i></a>';
                      return $btn;
                    })
                    ->addColumn('status', function ($data) {
                        if ($data->status == 0) {
                            return '<div class="form-check form-switch"><input type="checkbox" id="flexSwitchCheckDefault" onchange="updateStatus(this)" class="form-check-input"  value=' . $data->id . ' /></div>';
                        } else {
                            return '<div class="form-check form-switch"><input type="checkbox" id="flexSwitchCheckDefault" checked="" onchange="updateStatus(this)" class="form-check-input"  value=' . $data->id . ' /></div>';
                        }
                    })
                    
                    ->rawColumns(['action', 'status'])
                    ->make(true);
            }

            return view('backend.common.subscribes.index');
        } catch (\Exception $e) {
            $response = ErrorTryCatch::createResponse(false, 500, 'Internal Server Error.', null);
            Toastr::error($response['message'], "Error");
            return back();
        }
    }

    public function create()
    {
        try {
            
            return view('backend.common.subscribes.create');
        } catch (\Exception $e) {
            DB::rollBack();
            $response = ErrorTryCatch::createResponse(false, 500, 'Internal Server Error.', null);
            Toastr::error($response['message'], "Error");
            return back();
        }
    }
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'email' => 'required|email|min:1|max:100|unique:subscribes',
                
            ]
        );

         try {
            DB::beginTransaction();
            $subscribe =  new Subscribe();
            $subscribe->user_id = Auth::id();
            $subscribe->email = $request->email;
            $subscribe->status = $request->status;
            $subscribe->save();
            DB::commit();
            Toastr::success("Subscibe  Create Successfully", "Success");
            return redirect()->route(request()->segment(1) . '.subscribes.index');
        } catch (\Exception $e) {
            DB::rollBack();
            $response = ErrorTryCatch::createResponse(false, 500, 'Internal Server Error.', null);
            Toastr::error($response['message'], "Error");
            return back();
        }
    }

    public function edit($id)
    {
        try {
            $User = $this->User;
           $data = Subscribe::findOrFail(decrypt($id));
            return view('backend.common.subscribes.edit')->with('subscribe', $data);
        } catch (\Exception $e) {
            DB::rollBack();
            $response = ErrorTryCatch::createResponse(false, 500, 'Internal Server Error.', null);
            Toastr::error($response['message'], "Error");
            return back();
        }
    }
    public function update(Request $request,$id)
    {
        $this->validate(
            $request,
            [
                'email' => 'required|email|min:1|max:100|unique:subscribes,email,'.$id,
                
            ]
        );

         try {
            $subscribe =  Subscribe::find($id);
            if ($request->has('delete')) {
                Subscribe::destroy($id);
                Toastr::warning("Subscibe  Delete Successfully", "Success");
              return redirect()->route(request()->segment(1) . '.subscribes.index');
            }
            DB::beginTransaction();
            $subscribe->email = $request->email;
            $subscribe->status = $request->status;
            $subscribe->save();
            
            DB::commit();
            Toastr::success("Subscibe  Update Successfully", "Success");
            return redirect()->route(request()->segment(1) . '.subscribes.index');
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
     * @param  \App\Models\Subscribe  $subscribe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscribe $subscribe)
    {
        //
    }
    public function updateStatus(Request $request)
    {
        $rehab = Subscribe::findOrFail($request->id);
        $rehab->status = $request->status;
       if ($rehab->save()) {
            return 1;
        }
        return 0;
    }
}
