<?php

namespace Database\Seeders;
use App\Models\User;
use App\Helpers\Helper;
use App\Models\Profile;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateSuperAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $info = User::latest()->first();
        if (is_null($info)) {
            $superAdmin = new User();
            $superAdmin->name = 'Admin';
            $superAdmin->username = 'admin';
            $superAdmin->user_type = 'Admin';
            $superAdmin->phone = '0177100000';
            $superAdmin->email = 'admin@gmail.com';
            $superAdmin->password = Hash::make('admin1234');
            $superAdmin->created_by_user_id = '1';
            $superAdmin->updated_by_user_id = '1';
            $superAdmin->status = '1';
            if ($superAdmin->save()) {
                $profile =  new Profile();
                $profile->user_id = $superAdmin->id;
                $profile->position ="admin";
                $profile->gender = "Male";
                $profile->save();
                $role = Role::create(['name' => 'Admin']);
                $superAdmin->assignRole('Admin');
                $permission = Permission::pluck('name');
                $role = Role::wherename('Admin')->first();
                $role->syncPermissions($permission);
                
            }
        } else {
            $superAdmin = User::first();
            $superAdmin->assignRole('Admin');
            $permission = Permission::pluck('name');
            $role = Role::wherename('Admin')->first();
            $role->syncPermissions($permission);
        }
    }
}
