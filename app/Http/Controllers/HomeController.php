<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Category;
use App\Models\Installment;
use App\Models\Project;
use App\Models\User;
use App\Models\Date;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $now = Carbon::today()->format('y-m-d');
        $project = Project :: with('pdate')->get();
        $installment = Installment :: get();
        $end =  Date::whereDate('end','<=', $now)->get();

        $users = $this->userChart();
        return view('home',compact('users','project','installment','end'));
    }

    public function userChart()
    {
        $now = Carbon::today();
        $month = [];
        $service = [];
        $user = [];
        for ($i = 0; $i < 12; $i++)
        {
            $end =  Date::whereMonth('end', $now->month)->whereYear('end', $now->year)->get();
            $start =  Date::whereMonth('excution', $now->month)->whereYear('excution', $now->year)->get();
            array_push($month, $now->format('M').' '.$now->format('Y'));
            array_push($service, $end->count());
            array_push($user, $start->count());
            $now =  $now->subMonth();
        }

        $master['service'] = json_encode($service);
        $master['month'] = json_encode($month);
        $master['user'] = json_encode($user);
        return $master;
    }

}
