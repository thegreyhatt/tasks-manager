<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('requested_by') ? 'has-error' : ''}}">
    {!! Form::label('requested_by', 'Requested By', ['class' => 'control-label']) !!}
    {!! Form::text('requested_by', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('requested_by', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('date_requested') ? 'has-error' : ''}}">
    {!! Form::label('date_requested', 'Date Requested', ['class' => 'control-label']) !!}
    {!! Form::date('date_requested', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('date_requested', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('as_of') ? 'has-error' : ''}}">
    {!! Form::label('as_of', 'As Of', ['class' => 'control-label']) !!}
    {!! Form::date('as_of', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('as_of', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    {!! Form::label('status', 'Status', ['class' => 'control-label']) !!}
    {!! Form::select('status', json_decode('{"started":"Started","done":"Done","installed":"Installed","operational":"Operational","percent_complete":"Percent Complete"}', true), null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('verified_by') ? 'has-error' : ''}}">
    {!! Form::label('verified_by', 'Verified By', ['class' => 'control-label']) !!}
    {!! Form::text('verified_by', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('verified_by', '<p class="help-block">:message</p>') !!}
</div>
{{-- <div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    {!! Form::label('user_id', 'User Id', ['class' => 'control-label']) !!}
    {!! Form::number('user_id', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div> --}}


<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
    <a href="{{ URL::previous() }}" class="btn btn-default" >Cancel</a>
</div>
