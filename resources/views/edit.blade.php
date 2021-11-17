@extends('layouts.admin')

@section('content')

  <div class="row">

    <div class="col-sm-8">

      <div class="box box-primary">

        <div class="box-body">

          {{ Form::open(array('route' => array($prefix . 'block.update', $block->id), 'method' => 'PUT')) }}

            <div class="form-group">
              {{ Form::label('title', trans('block::block.title')) }}
              {{ Form::text('title', $block->title, array('class' =>'form-control')) }}
              {{ $errors->first('title', '<span class="text-danger">:message</span>') }}
            </div>

            <div class="form-group">
              {{ Form::label('body', trans('block::block.body')) }}
              {{ Form::textarea('body', $block->body, array('class' => 'form-control')) }}
              {{ $errors->first('body', '<span class="text-danger">:message</span>') }}
            </div>
        
            {{ Form::submit(trans('block::block.edit'), array('class' => 'btn btn-primary')) }}

          {{ Form::close() }}

        </div>

      </div>

    </div>

  </div>

@stop