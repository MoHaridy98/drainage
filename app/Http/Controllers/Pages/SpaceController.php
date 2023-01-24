<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Date;
use App\Models\Project;
use Illuminate\Http\Request;

class SpaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $projects = Project :: with('pdate')->select()->find($id);
        // $Dates = Date ::with('projectDate')->select()->find($id);
        return view("pages.space.create",compact('projects'));
    }

    public function space()
    {
        $projects = Project :: with('pdate')->select()->get();
        $Vprojects = Project :: with('pdate')->where('verified', 1 )->select()->get();
        $unVprojects = Project :: with('pdate')->where('verified', 0 )->where('has_changed', 0 )->select()->get();
        $chVprojects = Project :: with('pdate')->where('verified', 0 )->where('has_changed', 1 )->select()->get();
        return view("pages.space.space",compact('projects','Vprojects','unVprojects','chVprojects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request , $id)
    {
        switch($request['verified']){
            case NULL:
                $projects = Project:: where ('id', $id)-> update(([
                    'net_acre' => $request['net_acre'],
                    'net_carat' => $request['net_carat'],
                    'net_share' => $request['net_share'],
                    'has_changed' => 1,
                    'verified' => 0,
                ]));
                $Dates = Date:: where ('project_id', $id)-> update(([
                    'enclose_start' => $request['enclose_start'],
                    'enclose_end' => $request['enclose_end'],
                    'view_start' => $request['view_start'],
                    'view_end' => $request['view_end'],
                    'opposition_start' => $request['opposition_start'],
                    'opposition_end' => $request['opposition_end'],
                    'area_final' => $request['area_final'],
                    'tax_final' => $request['tax_final'],
                ]));
                return redirect()->route('space.list') -> with(['success' => 'تمت الاضافة بنجاح']);
                break;
            case !NULL:
                $projects = Project:: where ('id', $id)-> update(([
                    'net_acre' => $request['net_acre'],
                    'net_carat' => $request['net_carat'],
                    'net_share' => $request['net_share'],
                    'has_changed' => 0,
                    'verified' => 1,
                ]));
                $Dates = Date:: where ('project_id', $id)-> update(([
                    'enclose_start' => $request['enclose_start'],
                    'enclose_end' => $request['enclose_end'],
                    'view_start' => $request['view_start'],
                    'view_end' => $request['view_end'],
                    'opposition_start' => $request['opposition_start'],
                    'opposition_end' => $request['opposition_end'],
                    'area_final' => $request['area_final'],
                    'tax_final' => $request['tax_final'],
                ]));
                return redirect()->route('space.list') -> with(['success' => 'تم الاعتماد بنجاح']);
                break;
        }
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
    }
}
