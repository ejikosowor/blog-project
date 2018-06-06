<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->profile->name }}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        @can('admin-access')
            @include('layouts.partials.sidebar._admin')
        @elsecan('author-access')
            @include('layouts.partials.sidebar._author')
        @elsecan('editor-access')
            @include('layouts.partials.sidebar._editor')
        @elsecan('contributor-access')
            @include('layouts.partials.sidebar._contributor')
        @endcan
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>