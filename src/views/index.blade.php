@extends('layouts.admin')

@section('content')

  <p>
    <a href="{{ route($prefix . 'block.create') }}" class="btn btn-primary">
      {{ Lang::get('block::block.add') }}
    </a>
  </p>


  <div class="row">
    <div class="col-sm-8">
      <div class="box box-primary">
        <div class="box-body">

          @foreach ($regions as $id => $region)
            <h3>{{ $region }}</h3>
            <?php
            $ids[] = '#sortable-'. $id;
            ?>
            <ul id="sortable-{{ $id }}" class="todo-list ui-sortable connectedSortable">
              @forelse(Devfactory\Block\Models\Block::where('region', '=', $id)->orderby('weight', 'ASC')->get() as $block)
                <li id="block-{{ $block->id }}">
                  <span class="handle ui-sortable-handle">
                    <i class="fa fa-ellipsis-v"></i>
                    <i class="fa fa-ellipsis-v"></i>
                  </span>
                  {{ $block->title }}
                  {{ Form::open(array('route' => array($prefix . 'block.destroy', $block->id), 'method' => 'DELETE', 'class' => 'pull-right')) }}
                  {{ Form::button(trans('block::block.delete'), array('class' => 'btn btn-xs btn-danger', 'type' => 'submit')) }}
                  {{ Form::close() }}
                  {{ Form::open(array('route' => array($prefix . 'block.edit', $block->id), 'method' => 'GET', 'class' => 'pull-right', 'style' => 'margin-right:5px')) }}
                  {{ Form::button(trans('block::block.edit'), array('class' => 'btn btn-xs btn-primary', 'type' => 'submit')) }}
                  {{ Form::close() }}
                </li>
                @empty
                <li class="ui-state-disabled no-block"><h4>{{ Lang::get('block::block.empty') }}</h4></li>
              @endforelse
            </ul>
          @endforeach

          <h3>{{ Lang::get('block::block.disabled') }}</h3>
          <?php
          $ids[] = '#sortable-disabled';
          ?>
          <ul id="sortable-disabled" class="todo-list ui-sortable connectedSortable">
            @forelse ($blocks_disabled as $block)
              <li id="block-{{ $block->id }}" class="ui-state-default">
                <span class="handle ui-sortable-handle">
                  <i class="fa fa-ellipsis-v"></i>
                  <i class="fa fa-ellipsis-v"></i>
                </span>
                {{ $block->title }}
                {{ Form::open(array('route' => array($prefix . 'block.destroy', $block->id), 'method' => 'DELETE', 'class' => 'pull-right')) }}
                {{ Form::button(trans('block::block.delete'), array('class' => 'btn btn-xs btn-danger', 'type' => 'submit')) }}
                {{ Form::close() }}
                {{ Form::open(array('route' => array($prefix . 'block.edit', $block->id), 'method' => 'GET', 'class' => 'pull-right', 'style' => 'margin-right:5px')) }}
                {{ Form::button(trans('block::block.edit'), array('class' => 'btn btn-xs btn-primary', 'type' => 'submit')) }}
                {{ Form::close() }}
              </li>
              @empty
              <li class="ui-state-disabled no-block"><h4>{{ Lang::get('block::block.empty') }}</h4></li>
            @endforelse
          </ul>
        </div>
      </div>
    </div>
  </div>

@stop

@section('js')
  <script>
   jQuery(function() {
     jQuery("<?php echo implode(',', $ids); ?>").sortable({
       placeholder: "sort-highlight",
       connectWith: ".connectedSortable",
       items: "li:not(.ui-state-disabled)",
       forcePlaceholderSize: true,
       zIndex: 999999,
       update: function( event, ui ) {
         var data = $(this).sortable("serialize");

         // add new empty li or remove the no block 
         if(!data) {
           $('#' + $(this).attr('id')).append('<li class="ui-state-disabled no-block"><h4>{{ Lang::get('block::block.empty') }}</h4></li>');
         } else {
           $('#' + $(this).attr('id')).children('.no-block').remove();
         }

         $.ajax({
           type: "GET",
           url: "/{{ rtrim($prefix, '.') }}/block/order/"+ $(this).attr('id').split('-')[1],
           data: data,
           context: document.body,
           success: function(){
           }
         });

       }
     }).disableSelection();
   });
  </script>
@stop
