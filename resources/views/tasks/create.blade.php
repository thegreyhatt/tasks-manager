@extends('sbadmin2::page')

@section('content')
    <div class="container">
        <div class="row">
            {{-- @include('admin.sidebar') --}}

            <div class="offset-3 col-md-6">
                <div class="card shadow">
                    <div class="card-header">Create New Task</div>
                    <div class="card-body">
                      {{--   <a href="{{ route('tasks.index') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br /> --}}

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::open(['url' => route('tasks.store'), 'class' => 'form-horizontal', 'files' => true]) !!}

                        @include ('tasks.form', ['formMode' => 'create'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
