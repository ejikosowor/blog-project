@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>Posts</h1>
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
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">All Posts</h3>
                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Category</th>
                            <th>Tags</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th></th>
                        </tr>
                            @foreach($posts as $post)
                            <tr>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->author->profile->name }}</td>
                                <td>{{ $post->category->name }}</td>
                                @if($post->tags->count() > 0)
                                    <td>
                                        @foreach($post->tags as $tag)
                                            <span class="label label-default">{{ $tag->name }}</span>
                                        @endforeach
                                    </td>
                                @else
                                    <td>-</td>
                                @endif
                                <td>{{ title_case($post->status->name) }}</td>
                                <td>{{ $post->updated_at }}</td>
                                <td><a href="{{ route('posts.edit', $post->id) }}" class="btn btn-xs">Edit</a></td>
                            </tr>
                            @endforeach
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
</section>
@endsection