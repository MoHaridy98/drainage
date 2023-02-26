<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Date;
use App\Models\Agrass;
use App\Models\Region;
use App\Models\City;
use App\Models\Project;
use App\Models\Farmer;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Carbon\Carbon;

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
        return view('pages.report.report',compact('projects','Vprojects'));
    }
    public function sewageReport()
    {
        //
        $projects = Project :: with('pdate')->select()->get();
        $Vprojects = Project :: with('pdate')->where('verified', 1 )->select()->get();
        return view('pages.report.sewage',compact('projects','Vprojects'));
    }
    public function spaceReport()
    {
        //
        $Vprojects = Project :: select('*','project.id')->join('date','project_id','=','project.id')->where('verified', 1 )->get();
        return view('pages.report.space',compact('Vprojects'));
    }
    public function space_date(Request $request)
    {
        $form = $request['dateAction'];
        $date =  date('d-m-Y',strtotime($request['date']));
        $year = Carbon::createFromFormat('d-m-Y', $date)->format('Y');
        $month = Carbon::createFromFormat('d-m-Y', $date)->format('m');
        switch($form){
            case 'all':
                $Vprojects = Project :: select('*','project.id')->join('date','project_id','=','project.id')->where('verified', 1 )->get();
                break;  
            case 'date':
                $Vprojects = Project :: select('*','project.id')->with('pdate')->where('verified', 1 )
                    ->join('date','project_id','=','project.id')
                    ->whereMonth('area_initial','=', $month)
                    ->whereYear('area_initial','=', $year)
                    ->get();
                break;
        }
        return view('pages.report.space',compact('Vprojects'));
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
        $projects = Project :: with('pdate','projectInstallment')->select()->find($id);
        // $Dates = Date ::with('projectDate')->select()->find($id);
        return view("pages.report.print",compact('projects'));
    }
    /**
     * Display the specified resource.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function allreport(Request $request )
    {
        //
        $Region = Region :: select()->get();
        $City = City :: select()->get();
        $Agrass = Agrass :: select()->get();
        return view("pages.report.all-report",compact('Region','City','Agrass'));
    }
    /**
     * Display the specified resource.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function allreport_project(Request $request)
    {
        $city = $request['city'];
        $region = $request['region'];
        $Projects = Project :: with('pdate','projectInstallment')->where('verified', 1 )->select()->get();
        // $City = City :: select()->where('id',$city)->get();
        // $Region = Region :: select()->where('id',$region)->get();
        // $Agrass = Agrass :: select()->get();
        // $Farmer = Farmer :: select()->with('assname','farmerBenifit')->where('association_id',$aid)->get();

        return view("pages.report.all-report",compact('Projects'));
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
