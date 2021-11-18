@extends('block::layouts.admin')

@section('content')

  <p class="mb-2">
    <a href="{{ route('block.create') }}" class="btn btn-primary">
      @lang('block::block.add')
    </a>
  </p>

  <div class="card">
    <div class="card-body">
      <table class="table table-stripped">
        <thead>
          <tr>
            <th>@lang('block::block.title')</th>
            <th></th>
          </tr>
        </thead>
        @foreach ($blocks as $block)
          <tr>
            <td>{{ $block->title }}</td>
            <td class="text-right">
              {{ Form::open(['route' => ['block.destroy', $block->id], 'method' => 'DELETE', 'class' => 'float-end']) }}
                {{ Form::button(__('block::block.delete'), ['class' => 'btn btn-sm btn-danger', 'type' => 'submit']) }}
              {{ Form::close() }}
              {{ Form::open(['route' => ['block.edit', $block->id], 'class' => 'float-end']) }}
                {{ Form::button(__('block::block.edit'), ['class' => 'btn btn-sm btn-primary me-2', 'type' => 'submit']) }}
              {{ Form::close() }}
            </td>
          </tr>
        @endforeach
      </table>
    </div>
  </div>

@stop
