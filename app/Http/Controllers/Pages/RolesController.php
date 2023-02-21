<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $roles = Role::select()->get();
        return view('pages.users.roles',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::select()->get();
        $permissions = Permission::select()->get();
        return view('pages.users.add-permission',compact('roles','permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'bail|required|unique:roles',
            'permissions' => 'bail|required',
        ]);

        $role = Role::create(['name' => $request->name]);
        $per =  Permission::whereIn('id', $request->permissions)->get();
        $role->syncPermissions($per);
        return redirect()->route('Roles')->with(['success' => 'تم التسجيل بنجاح']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
       // $user = auth()->user();
        $permissions = Permission::get();
        $roles = Role::with('permissions')->find($id);
        return view('pages.users.editroles',compact('roles','permissions'));
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
        //
        $request->validate([
            'permissions' => 'bail|required',
        ]);
        $roles = Role::find($id);
        $per =  Permission::whereIn('id', $request->permissions)->get();
        $roles->syncPermissions($per);
        return redirect()->route('Roles')->with(['success' => 'تم التعديل بنجاح']);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $role = Role::find($id);
        $role->delete();
        return redirect()->route('Roles')->with(['success' => 'تم الحذف بنجاح']);
    }
}
