@extends('layouts.blog')

@section('content')
    <div class="box box-widget">
        <div class="box-header with-border">
            <h1 class="box-title">{{ $post->title }}</h1><br/>
            <span>Posted on {{ date('M j, Y', strtotime($post->updated_at)) }} | By {{ $post->author->profile->name }}</span>
        </div>
        <div class="box-body">@php echo $post->body; @endphp</div>
    </div>
@endsection