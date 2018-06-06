@extends('layouts.app')

@section('headerlinks')
<link rel="stylesheet" href="{{ asset('bower_components/select2/dist/css/select2.min.css') }}">
@endsection

@section('content')
<section class="content-header">
    <h1>Posts<small>New Post</small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard fa-fw"></i>Home</a></li>
        <li class="active">Posts</li>
    </ol>
</section>
<section class="content container-fluid">
    @if (session('status'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ session('status') }}
        </div>
    @endif
    <div class="row">
        {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT']) !!}
        <div class="col-md-8">
            <div class="box box-info">
                <div class="box-body">
                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                        {{ Form::label('title', 'Title', ["class" => "control-label"]) }}
                        {{ Form::text('title', null, ["class" => "form-control", "placeholder" => "Title"]) }}
                        @if ($errors->has('title'))
                            <span class="help-block">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                        {{ Form::label('slug', 'Slug', ["class" => "control-label"]) }}
                        {{ Form::text('slug', null, ["class" => "form-control", "placeholder" => "Title"]) }}
                        @if ($errors->has('slug'))
                            <span class="help-block">
                                <strong>{{ $errors->first('slug') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('excerpt') ? ' has-error' : '' }}">
                        {{ Form::label('excerpt', 'Excerpt', ["class" => "control-label"]) }}
                        {{ Form::textarea('excerpt', null, ["class" => "form-control", "rows" => 5, "placeholder" => "Excerpt"]) }}
                        @if ($errors->has('excerpt'))
                            <span class="help-block">
                                <strong>{{ $errors->first('excerpt') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                        {{ Form::label('body', 'Body', ["class" => "control-label"]) }}
                        {{ Form::textarea('body', null, ["class" => "form-control", "rows" => 10, "cols" => "80", "placeholder" => "Body"]) }}
                        @if ($errors->has('body'))
                            <span class="help-block">
                                <strong>{{ $errors->first('body') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <div class="col-md-4">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Post Meta-Data</h3>
                    <div class="pull-right box-tools">
                        <button type="button" class="btn btn-info btn-xs" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                        {{ Form::label('category_id', 'Category', ["class" => "control-label"]) }}
                        {{ Form::select('category_id', $categories, null, ["class" => "form-control", "placeholder" => "Select Category"]) }}
                        @if ($errors->has('category_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('category_id') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('tags') ? ' has-error' : '' }}">
                        {{ Form::label('tags', 'Tags', ["class" => "control-label"]) }}
                        {{ Form::select('tags[]', $tags, null, ["class" => "form-control select2-multi", "multiple" => "multiple"]) }}
                        @if ($errors->has('tags'))
                            <span class="help-block">
                                <strong>{{ $errors->first('tags') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('status_id') ? ' has-error' : '' }}">
                        {{ Form::label('status_id', 'Status', ["class" => "control-label"]) }}
                        {{ Form::select('status_id', $stats, null, ["class" => "form-control", "placeholder" => "Select Status"]) }}
                        @if ($errors->has('status_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('status_id') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary pull-right">Update</button>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</section>
@endsection

@section('footerscripts')
<script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<script>
  $(function () {
    tinymce.init({
      selector: '#body',
      height: 300,
      theme: 'modern',
      plugins: [
        'advlist autolink lists link image charmap print preview hr anchor pagebreak',
        'searchreplace wordcount visualblocks visualchars code fullscreen',
        'insertdatetime media nonbreaking save table contextmenu directionality',
        'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
      ],
      toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
      toolbar2: 'print preview media | forecolor backcolor emoticons | codesample',
      image_advtab: true
    });
    $(".select2-multi").select2();
    $(".select2-multi").select2().val({!! json_encode($post->tags()->allRelatedIds()) !!}).trigger('change');
  })
</script>
@endsection