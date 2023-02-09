<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Date;
use App\Models\Agrass;
use App\Models\Region;
use App\Models\City;
use App\Models\Project;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $projects = Project :: with('pdate')->select()->get();
        $Vprojects = Project :: with('pdate')->where('verified', 1 )->select()->get();
        $unVprojects = Project :: with('pdate')->where('verified', 0 )->where('has_changed', 0 )->select()->get();
        $chVprojects = Project :: with('pdate')->where('verified', 0 )->where('has_changed', 1 )->select()->get();
        return view('pages.report.report',compact('projects','Vprojects','unVprojects','chVprojects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function print($id)
    {
        //
        $projects = Project :: with('pdate')->select()->find($id);
        // $Dates = Date ::with('projectDate')->select()->find($id);
        return view("pages.report.print",compact('projects'));
    }
    /**
     * Display the specified resource.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function allreport()
    {
        //
        $Region = Region :: select()->get();
        $City = City :: select()->get();
        $Agrass = Agrass :: select()->get();
        $projects = Project :: with('pdate')->select()->get();
        return view("pages.report.all-report",compact('Region','City','Agrass','projects'));
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
