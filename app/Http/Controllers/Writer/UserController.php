<?php
namespace App\Http\Controllers\Writer;
use DB;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Helpers\ErrorTryCatch;
use Yajra\DataTables\DataTables;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private $User;
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

       
    }
    public function index()
    {
        
		
       return view('backend.writer.profile.index');
       
    }


    public function edit($id)
    {
        $user = User::find(decrypt($id));
        return view('backend.writer.profile.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
        $this->validate($request, [
            'name' => 'required|min:1|max:198',
            'zip_code' => 'required|min:1|max:20',
            'email' => 'required|email|unique:users,email,'.$id,
           ]);

       

        $user = User::find($id);
        $user->name =$request->name;
        $user->email =$request->email;
        $user->zip_code =$request->zip_code;
       if($request->password !==null){
            $this->validate($request, [
                'password' => 'required|min:8|max:30|same:confirm-password',
                ]);
         $user->password =Hash::make($request->password);
        }
        $user->save();
        Toastr::success("Profile Update Successfully", "Success");
        return redirect()->route(request()->segment(1) . '.writer-profile.index');
    }
    
}
