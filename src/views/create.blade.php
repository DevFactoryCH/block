{{ Form::open(array('route' => 'block.store')) }}

  <div class="form-group">
   {{ Form::label('title', 'block::block.title') }}
   {{ Form::text('title', NULL) }}
  </div>

  <div class="form-group">
   {{ Form::label('id', 'block::block.block_id') }}
   {{ Form::text('id', NULL) }}
  </div>

  <div class="form-group">
    {{ Form::label('body', 'block::block.body') }}
    {{ Form::textarea('body') }}
  </div>

  {{ Form::submit('block::block.send') }}

{{ Form::close() }}