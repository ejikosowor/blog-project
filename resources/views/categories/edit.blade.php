@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>Categories</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard fa-fw"></i>Home</a></li>
        <li class="active">Categories</li>
    </ol>
</section>
<section class="content container-fluid">
    @if (session('status'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ session('status') }}
        </div>
    @endif
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Category</h3>
        </div>
        <div class="box-body">
            {!! Form::model($category, ['route' => ['categories.update', $category->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    {{ Form::label('name', 'Name', ["class" => "col-sm-2 control-label"]) }}
                    <div class="col-sm-10">
                        {{ Form::text('name', null, ["class" => "form-control"]) }}
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                    {{ Form::label('slug', 'Slug', ["class" => "col-sm-2 control-label"]) }}
                    <div class="col-sm-10">
                        {{ Form::text('slug', null, ["class" => "form-control"]) }}
                        @if ($errors->has('slug'))
                            <span class="help-block">
                                <strong>{{ $errors->first('slug') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('parent_id') ? ' has-error' : '' }}">
                    {{ Form::label('parent_id', 'Parent', ["class" => "col-sm-2 control-label"]) }}
                    <div class="col-sm-10">
                        {{ Form::select('parent_id', $parents, null, ["class" => "form-control", "placeholder" => "None"]) }}
                    </div>
                </div>
                <div class="form-group{{ $errors->has('Description') ? ' has-error' : '' }}">
                    {{ Form::label('description', 'Description', ["class" => "col-sm-2 control-label"]) }}
                    <div class="col-sm-10">
                        {{ Form::textarea('description', null, ["class" => "form-control", "rows" => 3]) }}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-2">
                    </div>
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Update Category</button>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
        <!-- /.box-body -->
    </div>
</section>
@endsection