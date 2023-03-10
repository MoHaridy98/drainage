<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Date;
use Illuminate\Http\Request;

class SewageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view("pages.sewage.create");
    }

    public function sewage()
    {
        //
        //$phone = Project::find(7)->pdate;
        $projects = Project :: with('pdate')->select()->get();
        $Vprojects = Project :: with('pdate')->where('verified', 1 )->select()->get();
        $unVprojects = Project :: with('pdate')->where('verified', 0 )->select()->get();
        return view("pages.sewage.sewage",compact('projects','Vprojects','unVprojects'));
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
        $Dates = Date ::with('projectDate')->select()->find($id);
        $projects = Project :: with('pdate')->select()->find($id);
        return view("pages.sewage.edit",compact('projects','Dates'));
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
        try{
            $project = Project :: with('pdate')->select()->find($id);
            //return redirect()->route('sewage.list') -> with(['success' => '--> ' . $project->pdate->project_id]);
            if(!$project){
                return redirect()->route('sewage.list')->with(['error' => '?????????? ?????? ??????????']);
            }
            $project -> update(([
                'name' => $request['name'],
                'acre' => $request['acre'],
                'carat' => $request['carat'],
                'share' => $request['share'],
                'total_cost' => $request['total_cost'],
                'has_changed' => 1,
                'verified' => 0,


            ]));
            try{
                $project->pdate->project_id;
                $project = Date:: where ('project_id', $id)-> update(([
                    'excution' => $request['excution'],
                    'end' => $request['end'],
                    'area_initial' => $request['area_initial'],
                    'tax_initial' => $request['area_initial'],
                ]));
                return redirect()->route('sewage.list') -> with(['success' => '???? ?????????????? ??????????']);
            }catch(\Exception $ex){
                $project = Date:: create(([
                    'excution' => $request['excution'],
                    'end' => $request['end'],
                    'area_initial' => $request['area_initial'],
                    'tax_initial' => $request['area_initial'],
                    'project_id' => $id ,
                ]));
                return redirect()->route('sewage.list') -> with(['success' => '???? ?????????????? ??????????']);
            }
        }catch(\Exception $ex){
            return redirect()->route('sewage.list') -> with(['error' => '??????' . $ex]);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project :: with('pdate','projectBenifit','projectInstallment')->select()->find($id);
        // try{
        //     try{
        //         $project->pdate->id;
        //         $project->pdate->forcedelete();
        //     }catch(\Exception $ex){}
        //     try{

        //         $project->projectInstallment->id;
        //         $project->projectInstallment->forcedelete();
        //     }catch(\Exception $ex){}
        //     try{
        //         $project->projectBenifit->id;
        //         $project->projectBenifit->forcedelete();
        //     }catch(\Exception $ex){}

        //     $project->forcedelete();
        //     return redirect()->route('sewage.list') -> with(['success' => '???? ??????????!']);
        // }catch(\Exception $ex){
        //     return redirect()->route('sewage.list') -> with(['error' => '??????' .$ex]);
        // }
    }
}
