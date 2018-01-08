<div class="side-menu">
	<aside class="menu ml-2">
		<ul class="list-group">
			<li class="list-group-item {{ Route::current()->getName() == 'manage.dashboard' ? 'active' : ''}}"><a class="nav-link" href="{{route('manage.dashboard')}}">Dashboard</a></li>
			<li class="list-group-item {{ Route::current()->getName() == 'manage.frontend' ? 'active' : '' }}"><a class="nav-link" href="{{route('manage.frontend')}}">Manage FrontEnd</a></li>
			<li class="list-group-item {{ Request::is('manage/tags/*')  ? 'active' : '' }}"><a class="nav-link" href="{{route('tags.all')}}">Manage Tags</a></li>
			<li class="list-group-item {{ Route::current()->getName() == 'media.add' ? 'active' : '' }}"><a href="{{ route('media.add') }}" class="nav-link">Add Media</a></li>
			<li class="list-group-item {{ Request::is('manage/media/*') && Route::current()->getName() != 'media.add'  ? 'active' : '' }}"><a href="{{ route('media.all') }}" class="nav-link">All Media</a></li>
	
			<li class="list-group-item {{ Route::current()->getName() == 'album.add' ? 'active' : '' }}"><a href="{{ route('album.add') }}" class="nav-link">Add Album</a></li>
			<li class="list-group-item {{ Request::is('manage/album/*') && Route::current()->getName() != 'album.add'  ? 'active' : '' }}"><a href="{{ route('album.all') }}" class="nav-link">All Albums</a></li>
		</ul>
	</aside>
</div>