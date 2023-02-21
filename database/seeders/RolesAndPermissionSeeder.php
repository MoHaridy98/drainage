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
        $arrayOfPermissionsNames =[
            'agr','agr.create','agr.edit','farmer','farmarCreate','farmarEdite','all-report',
            'print','report','sewage','sewage.create','sewage.edite','space','space.create',
            'dues','taxes','taxes.create','home','users','roles'


        ];

        $permissions = collect($arrayOfPermissionsNames)->map(function($permissions){
            return ['name'=>$permissions , 'guard_name'=>'web'];
        });

        Permission :: insert ($permissions->toArray());
        $role = Role :: create(['name'=>'super_admin'])
        ->givePermissionTo($arrayOfPermissionsNames);
    }
}
