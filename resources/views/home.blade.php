@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>Dashboard</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard fa-fw"></i>Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>
<section class="content container-fluid">
    @if (session('status'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ session('status') }}
        </div>
    @endif
    @can('admin-access')
        @include('pages.partials._admin')
    @elsecan('author-access')
        @include('pages.partials._author')
    @elsecan('editor-access')
        @include('pages.partials._editor')
    @elsecan('contributor-access')
        @include('pages.partials._contributor')
    @endcan
</section>
@endsection