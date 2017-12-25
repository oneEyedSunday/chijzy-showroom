@extends('layouts.manage')

@section('title', '&mdash;  All Media')

@section('stylesheets')

	<link rel="stylesheet" href="/css/manage.css">

@endsection

@section('content')
	<div class="container mt-5 mleft-100">
		
		<div class="row">
			<h1>Manage Media</h1>
			<div class="col-sm-12">
				
			<table class="table">
				<thead>
					<tr>
						<th class="small-screen-hide">Thumbnail</th>
						<th>Title</th>
						<th class="small-screen-hide">Media Type</th>
						<th>Visibility</th>
						<th>Created At</th>
						<th>Album</th>
						<th class="small-screen-hide"></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
		@forelse($media as $m)
			<tr>
				<td class="small-screen-hide"><a href="{{ route('media.single.show', [$m->id]) }}"><img class="cropped-show" src="{{ asset('uploads/'. $m->url) }}" alt="Unable to find photo"></a></td>
				<td class="small-screen-hide">{{substr($m->caption, 0,25)}}{{ strlen($m->caption) > 25 ? "..." : ""}}</td>
				<td>{{ $m->type }}</td>
				<td>{{ $m->visibility ? "Public" : "Private" }}</td>
				<td class="small-screen-hide">{{ $m->created_at }}</td>
				<td class="small-screen-hide">{{ $m->album ? substr($m->album->title, 0,15) : "" }}</td>
				<td>
					<a href="{{ route('media.single.edit', [$m->id]) }}" class="btn btn-success">Edit</a>
					<a href="{{ route('media.single.delete', [$m->id]) }}" class="btn btn-danger" id="delLink">
                     Delete</a>
                 <form id="delete-form" action="{{ route('media.single.delete', [$m->id]) }}" method="POST" style="display: none;">
                    {{ csrf_field() }} {{ method_field('DELETE')}}
                  </form>
				</td>
			</tr>
		@empty
			<a href="{{ route('media.add') }}">Add media here.</a>
		@endforelse
		</tbody>				
			</table>

		<div class="text-center">
	       {!! $media->links() !!}
	       <div class="row">
	         <div class="col-md-12">
	           <div class="col-md-8-offset-2">
	             {!! "Page " . $media->currentPage() . " of " .  $media->lastPage() !!}     
	           </div>
	         </div>
	       </div>
      	</div>
    </div>	
	</div>
</div>
</div>
@endsection

@section('scripts')
	<script>
		var del = document.getElementById("delLink");
		del.addEventListener('click', function(event){
			event.preventDefault();
			if(confirm('Are you sure you want to delete?')) document.getElementById('delete-form').submit();
		})
	</script>
	jombo
@endsection