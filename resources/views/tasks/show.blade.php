@extends('sbadmin2::page')

@section('content')
    {{-- <div class="container"> --}}
        <div class="row">
            {{-- @include('admin.sidebar') --}}

            <div class="col-md-6 offset-md-3">
                <div class="card shadow">
                    <div class="card-header">Task {{ $task->id }}</div>
                    <div class="card-body">

                        <a href="{{ route('tasks.index') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                  {{--   <tr>
                                        <th>ID</th><td>{{ $task->id }}</td>
                                    </tr> --}}
                                    <tr><th> Name </th><td> {{ $task->name }} </td></tr>
                                    <tr><th> Requested By </th><td> {{ $task->requested_by }} </td></tr>
                                    <tr><th> Date Requested </th><td> {{ date('M d, Y', strtotime($task->date_requested)) }} </td></tr>
                                    <tr><th> As Of </th><td> {{ date('M d, Y', strtotime($task->as_of)) }} </td></tr>
                                    <tr><th> Status </th><td> {{ $task->status }} </td></tr>
                                    <tr><th> Verified By </th><td> {{ $task->verified_by }} </td></tr>
                                    {{-- <tr><th> User Id </th><td> {{ $task->user->name }} </td></tr> --}}
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="card-footer">
                        <a href="{{ route('tasks.edit', $task->id) }}" title="Edit Task"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => route('tasks.destroy', $task->id),
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => 'Delete Task',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    {{-- </div> --}}
@endsection
