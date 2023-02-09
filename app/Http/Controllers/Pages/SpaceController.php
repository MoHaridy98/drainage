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

    public function dues($id){
        $projects = Project :: with('pdate')->select()->find($id);
        $City = City :: select()->get();
        $Region = Region :: select()->get();
        $Agrass = Agrass :: select()->get();
        $FarmerAll = Farmer :: select()->with('assname','farmerBenifit')->get();
        return view("pages.space.dues",compact('FarmerAll','projects','Agrass','City','Region'));
    }
    public function duesCreate(Request $request , $pid){
        $aid = $request['agr_ass'];
        $projects = Project :: with('pdate')->select()->find($pid);
        $City = City :: select()->get();
        $Region = Region :: select()->get();
        $Agrass = Agrass :: select()->get();
        $Farmer = Farmer :: select()->with('assname','farmerBenifit')->where('association_id',$aid)->get();
        $FarmerAll = Farmer :: select()->with('assname','farmerBenifit')->get();
        return view("pages.space.dues",compact('FarmerAll','projects','Agrass','Farmer','City','Region'));
    }
    public function duesStore(Request $request)
    {
        try{
            for($i = 0 ; $i< count($request->fid) ; $i++){
                $cost[] = $request->cost[$i];
                $farmer_id[] = $request->fid[$i];
                $farmer_benifit = Benefits:: select('farmer_id')->where('farmer_id',$farmer_id[$i])->value('farmer_id');
                //return response()->json([$farmer_benifit]);
                if($farmer_benifit == NULL){
                    $benefits = Benefits:: create(([
                        'Total_installment' => $cost[$i],
                        'farmer_id' => $farmer_id[$i],
                        'project_id' => $request['pid'],
                    ]));
                }else{
                    $benefits = Benefits:: where ('farmer_id', $farmer_id[$i])-> update(([
                        'Total_installment' => $cost[$i],
                        'project_id' => $request['pid'],
                    ]));
                }
            }
            return redirect()->route('space.dues' , $request['pid']) -> with(['success' => 'تمت الاضافة بنجاح']);
        }catch(\Exception $ex){
            return redirect()->route('space.dues' , $request['pid']) -> with(['error' => 'خطأ' . $ex]);
        }
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
