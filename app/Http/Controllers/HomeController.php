<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Category;
use App\Models\Installment;
use App\Models\Project;
use App\Models\User;
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
        $orderCharts = $this->orderChart();
        $users = $this->userChart();
        return view('home',compact('orderCharts','users'));
    }
    public function orderChart()
    {
        $masterYear = array();
        $labelsYear = array();

        array_push($masterYear, Project::whereMonth('created_at', Carbon::now(env('timezone')))->count());
        for ($i = 1; $i <= 11; $i++)
        {
            if ($i >= Carbon::now(env('timezone'))->month)
            {
                array_push($masterYear, Project::whereMonth('created_at',Carbon::now(env('timezone'))->subMonths($i))->whereYear('created_at', Carbon::now(env('timezone'))->subYears(1))->count());
            }
            else
            {
                array_push($masterYear, Project::whereMonth('created_at', Carbon::now(env('timezone'))->subMonths($i))->whereYear('created_at', Carbon::now(env('timezone'))->year)->count());
            }
        }

        array_push($labelsYear, Carbon::now(env('timezone'))->format('M-y'));
        for ($i = 1; $i <= 11; $i++)
        {
            array_push($labelsYear, Carbon::now(env('timezone'))->subMonths($i)->format('M-y'));
        }
        return ['data' => json_encode($masterYear), 'label' => json_encode($labelsYear)];
    }

    public function userChart()
    {
        $now = Carbon::today();
        $month = [];
        $service = [];
        $user = [];
        for ($i = 0; $i < 12; $i++)
        {
            $d =  Installment::whereMonth('created_at', $now->month)->whereYear('created_at', $now->year)->get();
            $s =  Project::whereMonth('created_at', $now->month)->whereYear('created_at', $now->year)->get();
            array_push($month, $now->format('M'));
            array_push($service, $d->count());
            array_push($user, $s->count());
            $now =  $now->subMonth();
        }

        $master['service'] = json_encode($service);
        $master['month'] = json_encode($month);
        $master['user'] = json_encode($user);
        return $master;
    }

}
