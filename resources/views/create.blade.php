@extends('layouts.admin')

@section('content')

  <div class="row">
    <div class="col-sm-8">
      <div class="box box-primary">
        <div class="box-body">
          {{ Form::open(['route' => 'block.store']) }}
            <div class="form-group">
              {{ Form::label('title', __('block::block.title')) }}
              {{ Form::text('title', null, ['class' =>'form-control']) }}
              {{ $errors->first('title', '<span class="text-danger">:message</span>') }}
            </div>
            <div class="form-group">
              {{ Form::label('body', __('block::block.body')) }}
              {{ Form::textarea('body', null, ['class' => 'form-control']) }}
              {{ $errors->first('body', '<span class="text-danger">:message</span>') }}
            </div>
            {{ Form::button(__('block::block.add'), ['class' => 'btn btn-primary', 'type' => 'submit']) }}
          {{ Form::close() }}
        </div>
      </div>
    </div>
  </div>

@stop
