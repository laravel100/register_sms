@extends('app_reg')

@section('content')

<div class="ui vertically padded four column centered grid">
        <div class="column">
            @if($token)
			{{$token}}<br>
			@endif
			<button style="width:100px;height:30px; color:#000;" onclick="logout()">Выйти</button>
        </div>
		
    </div>
    <script type="text/javascript" src="{{ asset('/js/jquery-1.7.2.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('/plugins/semantic-ui/dist/semantic.min.js') }}"></script>
    <script type="text/javascript">
    function logout(){
			$.ajax({
				url:'/logout',
				cache:false,
				success:function(html){
				    window.location.href = "/";	
				}
			})
		
	}
    </script>
@endsection
