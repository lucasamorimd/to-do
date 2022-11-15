<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $data = [];

        $data['user'] = Auth::user();

        $filteredDate = $request->filter_date ?? date('Y-m-d');
        $carbonDate = Carbon::createFromDate($filteredDate);

        $data['now_date'] = $carbonDate->translatedFormat('d \d\e M\.');
        $data['day_next'] = $carbonDate->addDay(1)->format('Y-m-d');
        $data['day_before'] = $carbonDate->addDay(-2)->format('Y-m-d');
        $data['tasks'] = Task::whereDate('due_date', $filteredDate)->where('user_id', $data['user']->id)->get();
        $data['tasks_count'] = $data['tasks']->count();
        $data['done_tasks_count'] = $data['tasks']->where('is_done', true)->count();
        return view('home', $data);
    }
}
