<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Console\View\Components\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TaskController extends Controller
{
    // View 
    public function index() {
        $tasks = Tasks::get();
        return view('tasks.index', ['tasks' => $tasks]);
    }

    public function create() {
        return view('tasks.create');
    }

    public function store(Request $request) {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]);

        $task = new Tasks();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->status = $request->status;
        $task->save();

        return back()->withSuccess('New task added successfully');
        //return redirect()->route('tasks.index')->with('success', 'Task updated successfully');

    }

    public function show($id) {
        $task = Tasks::where('id', $id)->first();
        return view('tasks.show',['task' => $task]);
    }

    public function edit($id) {
        $task = Tasks::where('id', $id)->first();
        return view('tasks.edit',['task' => $task]);
    }


    public function update(REQUEST $request,  $id ) {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]);

        $task = Tasks::where('id', $id)->first();

        $task->title = $request->title;
        $task->description = $request->description;
        $task->status = $request->status;
        $task->save();

        return back()->withSuccess('Task updated successfully');
    }

    public function destroy($id) {
        $task = Tasks::where('id', $id)->first();
        $task->delete();    
        return back()->withSuccess('Task Deleted successfully');
    }
    
}

