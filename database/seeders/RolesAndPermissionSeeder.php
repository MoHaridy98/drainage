<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        //site permissions
        $arrayOfPermissionsNames =[
            'agr','agr.create','agr.edit','farmer','farmar.create','farmar.edite','report.all',
            'report.print','report','report.sewage','report.space','sewage.create','sewage.edit',
            'sewage','space.create','space.dues','space','taxes.create','taxes.dues','taxes','home',
            'users','users.add','users.edit','roles','roles.add','roles.edit'
        ];
        $permissions = collect($arrayOfPermissionsNames)->map(function($permissions){
            return ['name'=>$permissions , 'guard_name'=>'web'];
        });
        Permission :: insert ($permissions->toArray());

        //site users
        $arrayOfRoles =[
            'super_admin','الصرف','المساحة','الزراعة','الضرائب','user'
        ];
        $roles = collect($arrayOfRoles)->map(function($roles){
            return ['name'=>$roles];
        });
        Role :: insert ($permissions->toArray());
    }
}
