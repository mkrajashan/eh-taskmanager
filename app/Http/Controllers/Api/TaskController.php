<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tasks;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(count(Tasks::all())>0){
            return response()->json(Tasks::all());
        } else {
            return response()->json(['message' => 'No Task Found. Please try to add... ']);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
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

            return response()->json([
                'message' => 'Task created successfully',
                'task' => $task,
            ], Response::HTTP_CREATED);

        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $e->errors(),
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = Tasks::where('id', $id)->first();
        if (!$task) {
            return response()->json(['message' => 'Task not found'], Response::HTTP_NOT_FOUND);
        }

        return response()->json($task, Response::HTTP_OK);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $task = Tasks::where('id', $id)->first();
        if (!$task) {
            return response()->json(['message' => 'Task not found'], Response::HTTP_NOT_FOUND);
        }
        try {
            $request->validate([
                'title' => 'required',
                'description' => 'required',
                'status' => 'required'
            ]);

            $task->title = $request->title;
            $task->description = $request->description;
            $task->status = $request->status;
            $task->save();
            return response()->json([
                'message' => 'Task updated successfully',
                'task' => $task,
            ], Response::HTTP_OK);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $e->errors(),
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Tasks::where('id', $id)->first();
        if($task) {
            $task->delete();    
            return response()->json(['message' => 'Task deleted successfully']);
        }
        else {
            return response()->json(['message' => 'Task not found'], Response::HTTP_NOT_FOUND);
        }
    }
}
