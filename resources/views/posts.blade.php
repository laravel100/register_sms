@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
	<div class="container">
	{!! link_to_route('posts.index', 'published') !!}&emsp;{!! link_to_route('posts.unpublished', 'unpublished') !!}&emsp;{!! link_to_route('posts.create', 'create') !!}<br>
	{!! link_to_route('posts.sqlquery', 'quvery DB') !!}&emsp;{!! link_to_route('posts.beer', 'Beer') !!}
		@foreach($posts as $post)
			<article>
				<h2>{{$post->title}}</h2>
				<p> {{$post->expert}}</p>
				<p> published:{{$post->published_at}}</p>
			</article>
		@endforeach
	</div>
	</div>
</div>
@endsection
