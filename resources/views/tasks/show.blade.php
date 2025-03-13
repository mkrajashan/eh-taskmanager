@extends('layouts.app')
@section('main')


        <h5> Details
            <hr/>
            <nav class="my-3">
                <ol class="breadcrumb">
                   <li class="breadcrumb-item"><a href="/tasks">Home</a></li>
                   <li class="breadcrumb-item active">View Task</li>
                </ol>
           </nav>
           
           <div class="card">
                <div class="card-body">
                        <h5 class="card-title fw-bold"> Task Detail </h5>
                        <p class="card-text"> Title :- {{$task->title}} </p>
                        <p class="card-text"> Description:- {{$task->description}}   </p>
                        <p class="card-text"> Status:- {{ucfirst($task->status)}}   </p>
                        <p class="card-text"> Created At:- {{$task->created_at}}  </p>
                        <p class="card-text"> Updated At {{$task->updated_at}}  </p>
                </div>
           </div>
        </h5>
             <!--Row end -->

@endsection