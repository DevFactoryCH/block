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
            {{ Form::label('region', trans('block::block.regions')) }}
            {{ Form::select('region', $regions, null, array('class' => 'form-control')) }}
            {{ $errors->first('region', '<span class="text-danger">:message</span>') }}
          </div>

          <div class="form-group">
            {{ Form::label('body', trans('block::block.body')) }}
            {{ Form::textarea('body', NULL, array('class' => 'form-control')) }}
            {{ $errors->first('body', '<span class="text-danger">:message</span>') }}
          </div>

          <div class="form-group">
            {{ Form::label('format', trans('block::block.visibility')) }}
            {{ Form::select('format', Block::formats(), null, array('class' => 'form-control')) }}
            {{ $errors->first('format', '<span class="text-danger">:message</span>') }}
          </div>

          <div class="form-group">
            {{ Form::label('pages', trans('block::block.page')) }}
            {{ Form::textarea('pages', NULL, array('class' => 'form-control')) }}
            {{ $errors->first('pages', '<span class="text-danger">:message</span>') }}
          </div>

          {{ Form::submit(trans('block::block.add'), array('class' => 'btn btn-primary')) }}

          {{ Form::close() }}

        </div>

      </div>

    </div>

  </div>

@stop

@section('css')
  {{ HTML::style('packages/devfactory/block/css/summernote.css') }}
@stop

@section('js')
  {{ HTML::script('packages/devfactory/block/js/summernote.js') }}
  <script>
   jQuery(function() {
     // Summernote wysiwyg editor
     $('#body').summernote({
         height: 150,
         toolbar: [
           ['style', ['bold', 'italic', 'underline', 'clear']],
           ['font', ['strikethrough']],
           ['fontsize', ['fontsize']],
           ['para', ['ul', 'ol', 'paragraph']],
           ['insert', ['picture', 'link', 'video', 'codeview']]
         ]
       });

     $('.form_group').on('blur', '.note-editable', function() {
       $('.summernote').destroy();
     });
     $('textarea.summernote').click();
   });
  </script>
@stop
