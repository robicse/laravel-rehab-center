<?php
namespace App\Http\Controllers\Common;
use DB;
use File;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Helpers\ErrorTryCatch;
use Sohibd\Laravelslug\Generate;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
        $profile=User::with('profile')->find(Auth::id());
        return view('backend.common.profiles.index')->with('profileInfo',$profile);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showProfileForm()
    {
        $user= User::join('profiles', 'profiles.user_id', '=', 'users.id')->select('users.*','profiles.gender','profiles.position','profiles.fax','profiles.country','profiles.state','profiles.office_phone','profiles.company_name','profiles.company_address','profiles.google_location_link','profiles.facebook_link','profiles.twitter_link','profiles.linkedin_link','profiles.facts','profiles.company_logo','profiles.description')->findOrFail(Auth::id());
        if($user->user_type=='Company'){
            return view('backend.common.profiles.update_company_profile')->with('user',$user); 
        }
        else{
            $profile=User::with('profile')->find(Auth::id());
            return view('backend.common.profiles.index')->with('profileInfo',$profile); 
        }
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function profilesUpdate(Request $request)
    {
        
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.Auth::id(),
            'description' => 'required|min:1|max:5000',
            'phone' => 'required|min:9|max:30',
            'gender' => 'required',
            'country' => 'required',
            'state' => 'required',
            'zip_code' => 'required',
            
         
        ]);
                
                $user = User::find(Auth::id());
                $name = $request->name;
                $user->name=$name;
                $user->phone=$request->phone;
               $user->zip_code = $request->zip_code;
                $user->ip_address = $request->ip();
                
                if ($request->hasFile('image')) {
                    $this->validate($request, [
                        'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:1024',
    
                    ]);
                    Storage::delete(@$user->image);
                    $user->image = ($request->image->store());
                }
               
                $user->updated_by_user_id =  Auth::id();
                if ($user->save()) {
                    $profile = Profile::whereuser_id(Auth::id())->first();
                    $profile->position = $request->position;
                    $profile->gender = $request->gender;
                   $profile->country = $request->country;
                    $profile->state = $request->state;
                   $profile->facebook_link = $request->facebook_link;
                    $profile->twitter_link = $request->twitter_link;
                    $profile->linkedin_link = $request->linkedin_link;
                   $profile->description = $request->description;
                    
                    $profile->save();
                    Toastr::success("Profile Update Successfully", "Success");
                    return redirect()->route(request()->segment(1) . '.setting.index');
        
                }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function passwordUpdate(Request $request)
    {
       
        $this->validate($request, [
            'password' => 'required|min:6|max:30',
            'confirm' => 'required|same:password',
      
          ]);
          if (!Hash::check($request->currentpassword, Auth::user()->password)) {
            Toastr::success("Current password wrong", "Warning");
            return redirect()->route(request()->segment(1) . '.setting.index');
          } else {
      
            User::find(Auth::user()->id)->update(array('remember_token' => null));
            $userinfo = User::find(Auth::user()->id)->update(array(
              'password' => Hash::make($request->confirm),
            ));
          }
          if ($userinfo) {
            Toastr::success("Password change successfully done", "Success");
            Auth::logout();
            return back();
           
          }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
