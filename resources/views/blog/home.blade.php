@extends('layouts.blog')

@section('content')
    @foreach($posts as $post)
    @php
        $url = date('Y', strtotime($post->updated_at)).'/'.date('j', strtotime($post->updated_at)).'/'.$post->slug
    @endphp
    <div class="box box-widget">
        <div class="box-header with-border">
            <h1 class="box-title">
                <a href="{{ route('blog.post', $post->slug) }}">{{ $post->title }}</a>
            </h1><br/>
            <span>Posted on {{ date('M j, Y', strtotime($post->updated_at)) }} | By {{ $post->author->profile->name }}</span>
        </div>
        <div class="box-body">{{ $post->excerpt }}</div>
    </div>
    @endforeach
@endsection