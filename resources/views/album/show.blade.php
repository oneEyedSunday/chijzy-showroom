@extends('layouts.manage')

@section('title', '&mdash;  All Albums')

@section('stylesheets')

	<link rel="stylesheet" href="/css/manage.css">

@endsection

@section('content')
	<div class="container mt-5" id="force-left">
		
		<div class="row">
			<h1>Manage Albums</h1>
			<div class="col-sm-12">
				
			<table class="table">
				<thead>
					<tr>
						<th>Cover Photo</th>
						<th>Title</th>
						<th class="small-screen-hide">Description (cropped)</th>
						<th>Media count</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
		@forelse($albums as $a)
			<tr>
				<td><a href="{{ route('album.single.show', [$a->id]) }}"><img class="cropped-show" src="{{ asset('uploads/'. $a->cover_image_url) }}" alt="Unable to find albums cover photo"></a></td>
				<td>{{ $a->title }}</td>
				<td class="small-screen-hide">{{substr($a->description, 0,25)}}{{ strlen($a->description) > 25 ? "..." : ""}}</td>
				<td>{{ $a->media->count()}}</td>
				<td>
					<a href="{{ route('album.single.edit', [$a->id]) }}" class="btn btn-success">Edit</a>
					<a href="#" class="btn btn-danger" id="delLink">
                     Delete</a>
                 <form id="delete-form" action="{{ route('album.single.delete', [$a->id]) }}" method="POST" style="display: none;">
                    {{ csrf_field() }} {{ method_field('DELETE')}}
                  </form>
				</td>
			</tr>
		@empty
			<a href="{{ route('album.add') }}">No albums, Add albums here.</a>
		@endforelse
		</tbody>				
			</table>

		<div class="text-center">
       {!! $albums->links('vendor.pagination.bootstrap-4') !!}
      </div>
    </div>	
	</div>
</div>
</div>
@endsection

@section('scripts')
	<script>
		$('a.btn.btn-danger').each(function(index, elem){
			$(this).click(function(event){
				event.preventDefault();
				if(confirm("Are you sure you want to delete ?")){
					$(this.nextElementSibling.submit());
				}
				return false;
			})
		})
	</script>
@endsection