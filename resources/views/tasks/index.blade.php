@extends('sbadmin2::page')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tasks</h6>
            </div>
            <div class="card-body">
                <a href="{{ route('tasks.create') }}" class="btn btn-success btn-sm" title="Add New Task">
                    <i class="fa fa-plus" aria-hidden="true"></i> Add New
                </a>

                {!! Form::open(['method' => 'GET', 'url' => route('tasks.index'), 'class' => 'form-inline my-2 my-lg-0 float-right', 'role' => 'search'])  !!}
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                    <span class="input-group-append">
                        <button class="btn btn-secondary" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
                {!! Form::close() !!}

                <br/>
                <br/>
                <div class="table-responsive">
                    <table class="table table-borderless table-hover table-condensed">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th colspan="2">Name</th>
                                <th>Requested By</th>
                                <th>Added By</th>
                                <th>Recorded</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($tasks as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td> <a href="{{ route('tasks.show', $item->id) }}">{{ $item->name }}</a> </td>
                                <td class="text-center" >
                                    <ul class="navbar-nav ml-auto">
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-ellipsis-h"></i>
                                            </a>
                                            <div class="dropdown-menu animated--fade-in" aria-labelledby="navbarDropdown">
                                                {{-- <a class="dropdown-item" href="{{ route('accounts.show', $item->id) }}">View Account</a> --}}
                                                <a class="dropdown-item" href="{{ route('tasks.edit', $item->id) }}">Edit Task</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#" onclick="event.preventDefault(); if(confirm('Delete?')){document.getElementById('{{ $item->id }}').submit()};">
                                                    {!! Form::open([
                                                        'method'=>'DELETE',
                                                        'url' => route('tasks.destroy', $item->id),
                                                        'style' => 'display:inline',
                                                        'id' => $item->id
                                                    ]) !!}
                                                    {!! Form::close() !!}
                                                    Delete
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                </td>
                                <td>{{ $item->requested_by }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($item->created_at))->diffForHumans() }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="pagination-wrapper"> {!! $tasks->appends(['search' => Request::get('search')])->render() !!} </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
