@extends('layouts.manage')

@section('title', '&mdash;  All Media')

@section('stylesheets')

	<link rel="stylesheet" href="/css/manage.css">

@endsection

@section('content')
	<div class="container mt-5 " id="force-left">
		
		<div class="row">
			<h1 class="text-center">Manage Media</h1>
			<div class="col-sm-12">
			@if(count($media) > 0)	
			<table class="table">
				<thead>
					<tr>
						<th class="">Thumbnail</th>
						<th>Title</th>
						<th class="small-screen-hide">Category</th>
						<th>Visibility</th>
						<th>Created</th>
						<th class="small-screen-hide">Album</th>
						<th class="small-screen-hide"></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
		@foreach($media as $m)
			<tr>
				<td ><a href="{{ route('media.single.show', [$m->id]) }}"><img class="cropped-show" src="{{ asset('uploads/thumbnails/'. $m->url) }}" alt="Unable to find photo"></a></td>
				<td class="small-screen-hide">{{substr($m->caption, 0,25)}}{{ strlen($m->caption) > 25 ? "..." : ""}}</td>
				<td>{{ $m->category }}</td>
				<td>{{ $m->visibility ? "Public" : "Private" }}</td>
				<td class="small-screen-hide">{{ $m->created_at->diffForHumans() }}</td>
				<td class="small-screen-hide">{{ $m->album ? substr($m->album->title, 0,15) : "Not attached" }}</td>
				<td>
					<a href="{{ route('media.single.edit', [$m->id]) }}" class="btn btn-success">Edit</a>
					<a href="#" class="btn btn-danger" id="delLink">
                     Delete</a>
                 <form id="delete-form" data-name="{{$m->slug}}" action="{{ route('media.single.delete', [$m->id]) }}"  method="POST" style="display: none;">
                 	<input type="hidden" name="file_url" value="{{$m->url}}">
                    {{ csrf_field() }} {{ method_field('DELETE')}}
                  </form>
				</td>
			</tr>
		@endforeach
		</tbody>				
			</table>


		<div class="text-center">
	       {!! $media->links('vendor.pagination.bootstrap-4') !!}
      	</div>
      	@else
      	
      	<button class="btn btn-default ">
      		<a href="{{ route('media.add') }}" class="">Add media here.</a>
      	</button>
      	@endif
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