@extends('app_reg')

@section('content')

<div class="ui vertically padded four column centered grid">
        <div class="column">
            <div class="ui pointing secondary menu">
                <a class="active item" data-tab="first">Войти</a>
                <a class="item" data-tab="second">Зарегистрироваться</a>
            </div>
            <div class="ui active tab segment" data-tab="first">
                <div class="ui form">
                    <div class="field">
                        <label>Номер телефона</label>
                        <div class="ui input" >
                            <input type="number" id="phone">
                        </div>
                    </div>
                    <div class="field">
                        <label>Пароль</label>
                        <div class="ui icon input">
                            <input type="password" id="pass">
                            <i class="lock icon"></i>
                        </div>
                    </div>
					<div class="inline field">
                        <div class="ui checkbox">
                            <input type="checkbox" id="remember">
                            <label>Запомнить</label>
                        </div>
                    </div>
                    <div class="ui submit button" onclick='auth()'>Войти</div><br><br>
					<div id="response_auth" style="color:red"></div>
                </div>
            </div>
            <div class="ui tab segment" data-tab="second" id="reg_form">
                <div class="ui form">
                    <div class="required field">
                        <label>Email</label>
                        <div class="ui input">
                            <input type="text" id="email">
							<input type="hidden" name="_token" id="token" value="{{{ csrf_token() }}}" />
                        </div>
                    </div>
                    <div class="required inline field">
                        <div class="ui checkbox">
                            <input type="checkbox" id="agree">
                            <label>Я согласен с <a href="#">условиями использования</a></label>
                        </div>
                    </div>
                    <div class="ui submit button" onclick="register()">Зарегистрироваться</div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('/js/jquery-1.7.2.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('/plugins/semantic-ui/dist/semantic.min.js') }}"></script>
    <script type="text/javascript">
    $(document).ready(function() { 
        $('.ui.checkbox').checkbox();
        $('.menu .item').tab();
    });
	function auth(){
		$('#response_auth').empty();
		var remember=$('#remember').prop("checked");
		if(remember)remember=1;
		else remember=0;
		var phone=$('#phone').val();
		var pass=$('#pass').val();
		var CSRF_TOKEN = $('#token').val();
		if(email!=''){
			$.ajax({
				type:"POST",
				url:'/auth',
				cache:false,
				data: {_token: CSRF_TOKEN, phone:phone, pass:pass, remember:remember},
				success:function(html){
					if(html=='Ok'){
						window.location.href = "memberArea";
					}else{
						$('#response_auth').html(html);
					}
				}
			})
		}else{
			alert('Введите EMAIL!');
		}
	}
	function register(){
		$('#agree>style').remove();
		var email=$('#email').val();
		var agree=$('#agree').prop("checked");
		var CSRF_TOKEN = $('#token').val();
		var regul = /([A-Za-z0-9]+[.])?[a-zA-Z0-9]{3,}@[a-zA-Z]{3,}[.]{1}[a-zA-Z]{2,}/;
        var a=email.match(regul);
		if(email==''){
			alert('Введите EMAIL!');
		}else if(a==null){
			alert('Введите коректно EMAIL!');
		}else if(agree!=true){
			$('#agree').append('<style>.ui.checkbox label:before{border: 1px solid red;}</style>');
		}else{
			$.ajax({
				type:"POST",
				url:'/link',
				cache:false,
				data: {_token: CSRF_TOKEN, email:email},
				success:function(html){
					$('#reg_form').empty();
					$('#reg_form').html(html);
				}
			})
		}
	}
    </script>
@endsection
