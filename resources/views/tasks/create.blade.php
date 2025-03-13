@extends('layouts.app')
@section('main')

    <h5><i class="bi bi-plus-square-fill"></i>Add New task</h5>
    <hr/>
    <nav class="my-3">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/tasks">Home</a></li>
            <li class="breadcrumb-item active">Add New</li>
         </ol>
    </nav>
    <div class="col-md-6">
        <form action="/tasks/store" method="POST">
            @csrf
            @method('POST') <!-- Spoofing PUT request -->
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" id="title" class="form-control 
                    @if($errors->has('title')) {{'is-invalid'}} @endif"
                    placeholder="Enter the title of the task" value="{{old('title')}}">                    
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
                            placeholder="Enter the Description">{{old('description')}}</textarea>
                    </label>
                </div>
            </div>  

            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option value="pending">Pending</option>
                            <option value="in_progress">In Progress</option>
                            <option value="completed">Completed</option>
                        </select>
                    </label>
                </div>
            </div> 
            
            <div class="mb-3">
                <button type="submit" class="btn btn-dark">Save </button>
                <button type="submit" class="btn btn-danger">Clear All </button>
            </div>                     
        </form>

    </div>
    @endsection
