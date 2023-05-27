<?php

namespace App\Http\Controllers\Common;

use File;
use App\Models\User;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Helpers\ErrorTryCatch;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class SettingController extends Controller
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
    public function index(Request $request)
    {
        try {
            $User = $this->User;
            if ($User->user_type == 'Superadmin') {
                $data = Setting::firstOrFail();
               
            } else {
                $data = Setting::whereuser_id($User->id)->firstOrFail();
            }
           $profileInfo= User::with('profile')->find(Auth::id());
            return view('backend.common.setting.newindex',compact('profileInfo'))->with('settingDetail',$data);
            // return view('backend.common.setting.index')->with('settingDetail',$data);
        } catch (\Exception $e) {
            $response = ErrorTryCatch::createResponse(false, 500, 'Internal Server Error.', null);
            Toastr::error($response['message'], "Error");
            return back();
        }
    }

  
    public function edit($id)
    {
         try {
            $User = $this->User;
            if ($User->user_type == 'Admin') {
                $data =  Setting::findOrFail(decrypt($id));
            } else {
                $data = Setting::whereuser_id($User->id)->findOrFail(decrypt($id));
            }
            return view('backend.common.setting.edit')->with('setting', $data);
        } catch (\Exception $e) {
            DB::rollBack();
            $response = ErrorTryCatch::createResponse(
                false,
                500,
                'Internal Server Error.',
                null
            );
            Toastr::error($response['message'], 'Error');
            return back();
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|min:1|max:290',
            ]
        );

         try {
             DB::beginTransaction();
            $setting = Setting::find($id);
            $setting->user_id = $this->User->id;
            $setting->name = $request->name;
            $setting->title = $request->title;
            $setting->phone = $request->phone;
            $setting->email = $request->email;
            $setting->address = $request->address;
            $setting->description = $request->description;
            $setting->facebook = $request->facebook;
            $setting->youtube = $request->youtube;
            $setting->twitter = $request->twitter;
            $setting->instagram = $request->instagram;
            $setting->meta_title = $request->meta_title;
            $setting->meta_description = $request->meta_description;
            if ($request->hasFile('favicon')) {
                $this->validate($request, [
                    'favicon' =>
                        'required|image|mimes:jpeg,png,jpg,gif,webp|max:1024',
                ]);
                Storage::delete($setting->favicon);
                $setting->favicon = $request->favicon->store('/');
            }
            if ($request->hasFile('logo')) {
                $this->validate($request, [
                    'logo' =>
                        'required|image|mimes:jpeg,png,jpg,gif,webp|max:1024',
                ]);
                Storage::delete($setting->logo);
                $setting->logo = $request->logo->store('/');
            }
            if ($request->hasFile('footer_logo')) {
                $this->validate($request, [
                    'footer_logo' =>
                        'required|image|mimes:jpeg,png,jpg,gif,webp|max:1024',
                ]);
                Storage::delete($setting->footer_logo);
                $setting->footer_logo = $request->footer_logo->store('/');
            }
            if ($request->hasFile('admin_logo')) {
                $this->validate($request, [
                    'admin_logo' =>
                        'required|image|mimes:jpeg,png,jpg,gif,webp|max:1024',
                ]);
                Storage::delete($setting->admin_logo);
                $setting->admin_logo = $request->admin_logo->store('/');
            }
            $setting->save();
            Cache::forget('setting'); 
             DB::commit();
            Toastr::success('Setting Update Successfully', 'Success');
            return redirect()->route(request()->segment(1) . '.setting.index');
        } catch (\Exception $e) {
            DB::rollBack();
            $response = ErrorTryCatch::createResponse(
                false,
                500,
                'Internal Server Error.',
                null
            );
            Toastr::error($response['message'], 'Error');
            return back();
        }
    }

    public function destroy(Setting $setting)
    {
        //
    }

    public function smtpIndex()
    {
        return view('backend.common.setting.smtp');
    }

    public function envKeyUpdate(Request $request)
    {
        foreach ($request->types as $key => $type) {
            $this->overWriteEnvFile($type, $request[$type]);
        }

        Toastr::success("SMTP updated successfully", "Success");
        return back();
    }

    public function overWriteEnvFile($type, $val)
    {
        if (env('DEMO_MODE') != 'On') {
            $path = base_path('.env');
            if (file_exists($path)) {
                $val = '"' . trim($val) . '"';
                if (is_numeric(strpos(file_get_contents($path), $type)) && strpos(file_get_contents($path), $type) >= 0) {
                    file_put_contents($path, str_replace(
                        $type . '="' . env($type) . '"', $type . '=' . $val,
                        file_get_contents($path)
                    )
                    );
                } else {
                    file_put_contents($path, file_get_contents($path) . "\r\n" . $type . '=' . $val);
                }
            }
        }
    }


}
