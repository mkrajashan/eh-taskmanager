@extends('layouts.app')
@section('main')

    <h5><i class="bi bi-pencil-square"></i>Edit task</h5>
    <hr/>
    <nav class="my-3">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/tasks">Home</a></li>
            <li class="breadcrumb-item active">Edit </li>
         </ol>
    </nav>
    <div class="col-md-6">
        <form action="/tasks/{{$task->id}}" method="POST">
            @csrf
            @method('PUT') <!-- Spoofing PUT request -->
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" id="title" class="form-control 
                    @if($errors->has('title')) {{'is-invalid'}} @endif"
                    placeholder="Enter the title of the task" value="{{old('title', $task->title)}}">                    
                    </label>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" 
                            style="resize:none; height: 150px;"
                            class="form-control
                            @if($errors->has('description')) {{'is-invalid'}} @endif"                            
                            placeholder="Enter the Description">{{old('description', $task->title)}}</textarea>
                    </label>
                </div>
            </div>  

            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option value="pending" {{ old('status', $task->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="in_progress" {{ old('status', $task->status) == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                            <option value="completed" {{ old('status', $task->status) == 'completed' ? 'selected' : '' }}>Completed</option>
                        </select>                        
                    </label>
                </div>
            </div> 
            
            <div class="mb-3">
                <button type="submit" class="btn btn-dark">Update ss</button>
                <button type="submit" class="btn btn-danger">Clear All </button>
            </div>                     
        </form>

    </div>
    @endsection
