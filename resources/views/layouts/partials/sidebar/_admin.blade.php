<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    <!-- Optionally, you can add icons to the links -->
    <li class="active">
        <a href="{{ route('admin') }}">
            <i class="fa fa-dashboard fa-fw"></i>
            <span>Dashboard</span>
        </a>
    </li>
	<li class="treeview">
		<a href="#">
			<i class="fa fa-thumb-tack fa-fw"></i>
			<span>Posts</span>
			<span class="pull-right-container">
				<i class="fa fa-angle-left pull-right"></i>
			</span>
		</a>
		<ul class="treeview-menu">
			<li><a href="{{ route('posts.index') }}"><i class="fa fa-circle-o"></i>All Posts</a></li>
			<li><a href="{{ route('posts.create') }}"><i class="fa fa-circle-o"></i>New Post</a></li>
			<li><a href="{{ route('categories.index') }}"><i class="fa fa-circle-o"></i>Categories</a></li>
			<li><a href="{{ route('tags.index') }}"><i class="fa fa-circle-o"></i>Tags</a></li>
		</ul>
	</li>
	<li>
        <a href="#">
            <i class="fa fa-comments fa-fw"></i>
            <span>Comments</span>
        </a>
    </li>
    <li class="treeview">
		<a href="#">
			<i class="fa fa-users fa-fw"></i>
			<span>Users</span>
			<span class="pull-right-container">
				<i class="fa fa-angle-left pull-right"></i>
			</span>
		</a>
		<ul class="treeview-menu">
			<li><a href="#"><i class="fa fa-circle-o"></i>All Users</a></li>
			<li><a href="#"><i class="fa fa-circle-o"></i>New User</a></li>
			<li><a href="#"><i class="fa fa-circle-o"></i>Your Profile</a></li>
		</ul>
	</li>
	<li class="header">LABELS</li>
    <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
    <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
    <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
</ul>