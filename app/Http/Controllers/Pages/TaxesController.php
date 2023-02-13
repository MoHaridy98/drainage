<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Date;
use App\Models\Project;
use App\Models\Agrass;
use App\Models\Region;
use App\Models\City;
use App\Models\Farmer;
use App\Models\Benefits;
use App\Models\Installment;
use Illuminate\Http\Request;
use DB;

class TaxesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $farmer = Benefits :: select()->with('farmerName.assname','farmerName.assname.regionname','farmerName.assname.regionname.cityname')->get();
        // $project = Benefits :: select(DB::raw("SUM(Total_installment) as Total_installment , project_id"))->with('projectName','projectName.pdate')->groupBy('project_id')->get();
        $projectTotal = DB::table('installment')
            ->rightjoin('project', 'project.id', '=', 'installment.project_id')
            ->join('date' , DB::raw('date.tax_final IS NOT NULL  AND date.project_id'), '=', 'project.id')
            ->select('project.id','project.name','project.total_cost' , DB::raw('COALESCE(SUM(installment.amount),0) as amount'))
            ->groupBy('project.id', 'project.total_cost','project.name')
            ->get();
        return view("pages.taxes.taxes" , compact('farmer','projectTotal'));
        
    }

    public function taxCreate($id)
    {
        //
        $project = Project :: with('pdate')->select()->find($id);
        $installment = Installment :: select(DB::raw("SUM(amount) as amount"))->where('project_id',$id)->groupBy('project_id')->get();
        return view("pages.taxes.create", compact('project','installment'));
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
