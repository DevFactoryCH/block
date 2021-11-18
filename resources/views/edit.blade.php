@extends('block::layouts.admin')

@section('content')

  <div class="card">
    <div class="card-body">
      {{ Form::open(['route' => ['block.update', $block->id], 'method' => 'PUT']) }}
        <div class="mb-3">
          {{ Form::label('title', __('block::block.title')) }}
          {{ Form::text('title', $block->title, ['class' =>'form-control']) }}
          {!! $errors->first('title', '<span class="text-danger">:message</span>') !!}
        </div>
        <div class="mb-3">
          {{ Form::label('body', __('block::block.body')) }}
          {{ Form::textarea('body', $block->body, ['class' => 'form-control']) }}
          {!! $errors->first('body', '<span class="text-danger">:message</span>') !!}
        </div>
        {{ Form::button(__('block::block.edit'), ['class' => 'btn btn-primary', 'type' => 'submit']) }}
      {{ Form::close() }}
    </div>
  </div>

@stop
