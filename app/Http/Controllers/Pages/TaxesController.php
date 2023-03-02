<?php

namespace App\Http\Controllers\Pages;
use App\Models\Project;
use App\Http\Controllers\Controller;
use App\Models\Date;
use App\Models\Agrass;
use App\Models\Region;
use App\Models\City;
use App\Models\Farmer;
use App\Models\Benefits;
use App\Models\Installment;
use Illuminate\Http\Request;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB as DB;

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
        //$farmer = Benefits :: select()->with('farmerName.assname','farmerName.assname.regionname','farmerName.assname.regionname.cityname')->get();
        // $project = Benefits :: select(DB::raw("SUM(Total_installment) as Total_installment , project_id"))->with('projectName','projectName.pdate')->groupBy('project_id')->get();
        $projectTotal = DB::table('installment')
            ->rightjoin('project', 'project.id', '=', 'installment.project_id')
            ->join('date' , DB::raw('date.tax_final IS NOT NULL  AND date.project_id'), '=', 'project.id')
            ->select('project.id','date.tax_final','project.name','project.total_cost' , DB::raw('COALESCE(SUM(installment.amount),0) as amount'))
            ->groupBy('project.id', 'project.total_cost','project.name','date.tax_final')
            ->get();
        return view("pages.taxes.taxes" , compact('projectTotal'));

    }

    public function dues($id){
        $projects = Project :: with('pdate')->select()->find($id);
        $City = City :: select()->get();
        $Region = Region :: select()->get();
        $Agrass = Agrass :: select()->get();
        $Benefits = Benefits :: select()->where('project_id',$id)->get();
        $FarmerAll = Farmer :: select()->with('assname','farmerBenifit')->get();
        return view("pages.taxes.dues",compact('FarmerAll','Benefits','projects','Agrass','City','Region'));
    }

    public function taxCreate($id)
    {
        $now = Carbon::today();
        $project = Project :: with('pdate')->select()->find($id);
        // $installment = DB::table('installment')
        // ->select(DB::raw('SUM(amount) as amount'))
        // ->where('project_id',$id)
        // ->get();
        $installment = Installment :: select()->where('project_id',$id)->get();
        $inst = Installment :: where('project_id',$id)->sum('amount');
        $totalYear = Installment:: select('amount')->whereYear('date',$now->year)
            ->where('project_id',$id)->sum('amount');
        $date =  date('d-m-Y',strtotime($project->pdate->tax_final));
        $year = Carbon::createFromFormat('d-m-Y', $date)->format('Y');
        return view("pages.taxes.create", compact('project','installment','inst','year','totalYear'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        try
        {
            $installment = Installment:: create(([
                'date' => $request['date'],
                'amount' => $request['amount'],
                'project_id' => $id,
            ]));
            return redirect()->back()-> with(['success' => 'تم التسجيل بنجاح']);
        }
        catch(\Exception $ex)
        {
            return redirect()->back()-> with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد' . $ex]);
        }
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
        try{
            $item = Installment :: find($id);
            if($item)$item->forcedelete();
            $item->forcedelete();
            return redirect()->back()-> with(['success' => 'تم الحذف!']);
        }catch(\Exception $ex){
            return redirect()->back()-> with(['error' => 'خطأ' + $ex]);
        }
    }
}
