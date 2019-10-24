<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $keyword = implode('%', str_split($keyword));
        $perPage = 25;

        if (!empty($keyword)) {
            $tasks = Task::where('name', 'LIKE', "%$keyword%")
                ->orWhere('requested_by', 'LIKE', "%$keyword%")
                ->orWhere('date_requested', 'LIKE', "%$keyword%")
                ->orWhere('as_of', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->orWhere('verified_by', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $tasks = Task::latest()->paginate($perPage);
        }

        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'name' => 'required',
			'requested_by' => 'required',
			'date_requested' => 'required',
			'as_of' => 'required',
			'status' => 'required',
			'verified_by' => 'required'
		]);
        $requestData = $request->all();
        $requestData['user_id'] = Auth::id();
        
        Task::create($requestData);

        return redirect(route('tasks.index'))->with('flash_message', 'Task added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $task = Task::findOrFail($id);

        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $task = Task::findOrFail($id);

        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'name' => 'required',
			'requested_by' => 'required',
			'date_requested' => 'required',
			'as_of' => 'required',
			'status' => 'required',
			'verified_by' => 'required'
		]);
        $requestData = $request->all();
        $requestData['user_id'] = Auth::id();
        
        $task = Task::findOrFail($id);
        $task->update($requestData);

        return redirect(route('tasks.index'))->with('flash_message', 'Task updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Task::destroy($id);

        return redirect(route('tasks.index'))->with('flash_message', 'Task deleted!');
    }
}
