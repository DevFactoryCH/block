@extends('layouts.admin')

@section('content')

  <div class="row">

    <div class="col-sm-8">

      <div class="box box-primary">

        <div class="box-body">

          {{ Form::open(array('route' => $prefix . 'block.store')) }}

            <div class="form-group">
              {{ Form::label('title', trans('block::block.title')) }}
              {{ Form::text('title', NULL, array('class' =>'form-control')) }}
              {{ $errors->first('title', '<span class="text-danger">:message</span>') }}
            </div>

            <div class="form-group">
              {{ Form::label('body', trans('block::block.body')) }}
              {{ Form::textarea('body', NULL, array('class' => 'form-control')) }}
              {{ $errors->first('body', '<span class="text-danger">:message</span>') }}
            </div>
        
            {{ Form::submit(trans('block::block.add'), array('class' => 'btn btn-primary')) }}

          {{ Form::close() }}

        </div>

      </div>

    </div>

  </div>

@stop