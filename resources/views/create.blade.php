@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
	<div class="container">
	<center><h1>CREATE</h1></center>
	{!! Form::open(['route'=>'posts.store']) !!}
		@include('_form');
	{!! Form::close() !!}
	</div>
	</div>
</div>
@endsection
