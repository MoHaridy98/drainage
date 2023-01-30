<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Agrass;
use App\Models\Region;
use App\Models\City;
use App\Models\Farmer;
use Illuminate\Http\Request;

class AgrController extends Controller
{
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    public function agrCreate()
    {
        //
        $Region = Region :: select()->get();
        $City = City :: select()->get();
        return view("pages.agr.create",compact('Region', 'City'));
    }

    public function agr()
    {
        //
        $Agrass = Agrass :: select()->get();
        //$phone = Agrass::find(1)->agrRegion;
        //$Agrass = Agrass :: with('agrRegion')->select()->get();
        return view("pages.agr.agr",compact('Agrass'));
    }
    
    public function agrEdit($id)
    {
        //
        //$Dates = Date ::with('projectDate')->select()->find($id);
        $City = City :: select()->get();
        $Region = Region :: select()->get();
        $Agrass = Agrass :: select()->find($id);
        $Farmer = Farmer :: select()->where('association_id',$id)->get();
        return view("pages.agr.edit",compact('Agrass','Farmer','City','Region'));
    }
    
    public function farmer()
    {
        //
        $Farmer = Farmer :: select()->get();
        return view("pages.agr.farmer",compact('Farmer'));
    }
    
    public function farmerCreate()
    {
        $City = City :: select()->get();
        $Region = Region :: select()->get();
        $Agrass = Agrass :: select()->get();
        return view("pages.agr.farmerCreate",compact('Region', 'City','Agrass'));
    }
    
    public function farmerEdit($id)
    {
        //
        $City = City :: select()->get();
        $Region = Region :: select()->get();
        $Agrass = Agrass :: select()->get();
        $Farmer = Farmer :: select()->find($id);
        return view("pages.agr.farmerEdit",compact('Agrass','Farmer','City','Region'));
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

        $agr_ass = Agrass:: create(([
            'name' => $request['agr_name'],
            'region_id' => $request['region'],
        ]));
        return redirect()->route('agr.create') -> with(['success' => 'تم التسجيل بنجاح']);
    }

    public function farmerStore(Request $request)
    {
        for($i = 0 ; $i< count($request->farmer_name) ; $i++){
            $farmer_name[] = $request->farmer_name[$i];
            $acre[] = $request->acre[$i];
            $carat[] = $request->carat[$i];
            $share[] = $request->share[$i];

            $farmer = Farmer:: create(([
                'name' => $farmer_name[$i],
                'acre' => $acre[$i],
                'carat' => $carat[$i],
                'share' => $share[$i],
                'association_id' => $request['agr_ass'],
            ]));
        }
        return redirect()->route('agr.farmerCreate') -> with(['success' => 'تم التسجيل بنجاح']);
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
