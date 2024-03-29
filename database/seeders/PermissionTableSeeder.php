<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
   
        public function run()
        {
            $permission=array(
              'role-list',
              'role-create',
              'role-edit',
              'role-delete',
              'user-list',
              'user-create',
              'user-edit',
              'user-delete',
              'categories-list',
              'categories-create',
              'categories-edit',
              'categories-delete',    
              'sliders-list',
              'sliders-create',
              'sliders-edit',
              'sliders-delete',    
              'blogs-list',
              'blogs-create',
              'blogs-edit',
              'blogs-delete',    
            );
            foreach($permission as $v) {
                $newlist  = new Permission();
                $info=Permission::wherename($v)->first();
                if(empty($info)){
                  $newlist->guard_name ='web';
                $newlist->name =$v;
                $newlist->save();
              }
            }
        

    }
}
