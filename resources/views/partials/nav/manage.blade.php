<div class="side-menu">
	<aside class="menu ml-2">
		<p>
			General
		</p>
		<ul class="list-group">
			<li ><a class="nav-link" href="{{route('manage.dashboard')}}">Dashboard</a></li>
			<li><a class="nav-link" href="{{route('manage.frontend')}}">Manage FrontEnd</a></li>
			<li><a class="nav-link" href="{{route('tags.all')}}">Manage Tags</a></li>
		</ul>
		<p>
			Media, Albums and Admin
		</p>
		<ul class="list-group">
			<li>
				Manage Media
				<ul>
					<li><a href="{{ route('media.add') }}" class="nav-link">Add Media</a></li>
					<li><a href="{{ route('media.all') }}" class="nav-link">All Media</a></li>
				</ul>
			</li>
			<li>
				Manage Albums
				<ul>
					<li><a href="{{ route('album.add') }}" class="nav-link">Add Album</a></li>
					<li><a href="{{ route('album.all') }}" class="nav-link">All Albums</a></li>
				</ul>
			</li>
			<li><a class="nav-link" href="#">Manage Admin Profile</a></li>
		</ul>
	</aside>
</div>