@extends('layouts.app')
@section('main')

    <div class="d-flex justify-content-between">
       <h5><i class="bi bi-list-task"></i>
           Task Details
       </h5>

       <a href="tasks/create" class="btn btn-primary"><i class="bi bi-plus-circle"></i>
           Add New Task
       </a>
    </div>

    <div class="col-md-12 table-responsive mt-3">
       <table class="table table-bordered">
           <thead>
               <tr>
                   <th>
                       S.No
                   </th>
                   <th>
                       Title
                   </th>
                   <th>
                       Description
                   </th>
                   <th>
                       Status
                   </th>
                   <th>
                       Created On
                   </th>
                   <th>
                       Updated On
                   </th>   
                   <th>
                       Action
                   </th>                                                                   
               </tr>                            
           </thead>
           <tbody>
                @foreach ($tasks as $task)
                     <tr>
                        <td>{{$loop->iteration}}</td>
                        <td><a href="/tasks/{{$task->id}}/">{{$task->title}}</a></td>
                        <td>{{$task->description}}</td>
                        <td>{{$task->status}}</td>
                        <td>{{$task->created_at}}</td>
                        <td>{{$task->updated_at}}</td>
                        <td>
                            <a href="/tasks/{{$task->id}}/edit" class="btn btn-dark btn-sm"><i class="bi bi-pencil-square"></i></a>

                            <form action="/tasks/{{$task->id}}" method="POST" 
                                onsubmit="return confirm('Are you sure you want to delete this task?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>                            
                            </form>
                            
                            <!--<a href="/tasks/{{$task->id}}/delete" onclick="return confirm('Delete')"
                            class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>-->
                        </td>
                    </tr>
               @endforeach
           </tbody>
       </table>

    </div>
    <!--Row end -->

@endsection