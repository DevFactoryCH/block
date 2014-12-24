@extends('layouts.admin')

@section('content')

  <p>
    <a href="{{ route('block.create') }}" class="btn btn-primary">
      @lang('block::block.add')
    </a>
  </p>


  <div class="row">
    <div class="col-sm-8">
      <div class="box box-primary">
        <div class="box-body">
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
                <td class="text-right ">
                  {{ Form::open(array('route' => array('block.destroy', $block->id), 'method' => 'DELETE', 'class' => 'pull-right')) }}
                    {{ Form::button(trans('block::block.delete'), array('class' => 'btn btn-xs btn-danger', 'type' => 'submit')) }}
                  {{ Form::close() }}
                  {{ Form::open(array('route' => array('block.edit', $block->id), 'method' => 'GET', 'class' => 'pull-right', 'style' => 'margin-right:5px')) }}
                    {{ Form::button(trans('block::block.edit'), array('class' => 'btn btn-xs btn-primary', 'type' => 'submit')) }}
                  {{ Form::close() }}


                </td>
              </tr>
            @endforeach
          </table>
        </div>
      </div>
    </div>
  </div>


@stop