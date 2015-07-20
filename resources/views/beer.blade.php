@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
	<div class="container">
	{!! link_to_route('posts.index', 'published') !!}&emsp;{!! link_to_route('posts.unpublished', 'unpublished') !!}&emsp;{!! link_to_route('posts.create', 'create') !!}<br>
		@foreach($beer as $post)
			<article>
				<h4>{{$post->name}}</h2>
				
			</article>
		@endforeach
		
	</div>
	</div>
</div>
@endsection
