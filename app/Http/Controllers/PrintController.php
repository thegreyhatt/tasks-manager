<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class PrintController extends Controller
{
    public function index(Request $request)
    {
    	$start_date = $request->start_date;
    	$end_date = $request->end_date;
    	$tasks = Task::whereBetween('created_at', [$request->start_date.' 00:00:00', $request->end_date.' 23:59:59'])->latest()->get();

    	return view('print.index', compact('tasks', 'start_date', 'end_date'));
    }
}
