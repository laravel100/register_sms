@extends('app_reg')

@section('content')

<div class="ui vertically padded four column centered grid">
        <div class="column">
            <div class="ui pointing secondary menu">
            </div>
            <div class="ui active tab segment" data-tab="first">
                <div class="ui form">
                    <div class="required field" id="form_phone">
                        <label>Пароль</label>
                        <div class="ui icon input">
                            <input type="password" id="pass_1">
							<input type="hidden" name="_token" id="token" value="{{{ csrf_token() }}}" />
							<i class="lock icon"></i>
                        </div>
                    </div>
                    <div class="required field">
                        <label>Подтвердите пароль</label>
                        <div class="ui icon input">
                            <input type="password" id="pass_2">
                            <i class="lock icon"></i>
                        </div>
                    </div>
					<input type="hidden" name="tokenreg" id="tokenreg" value="{{$token}}" />
                    <div class="ui submit button" onclick="pass()">Сохранить</div>
					<div style="color:red" id="response"></div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('/js/jquery-1.7.2.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('/plugins/semantic-ui/dist/semantic.min.js') }}"></script>
    <script type="text/javascript">
	function pass(){
		$('#response').empty();
		var pass_1=$('#pass_1').val();
		var pass_2=$('#pass_2').val();
		var tokencode=$('#tokenreg').val();
		var CSRF_TOKEN = $('#token').val();
		if(pass_1==pass_2){
			$.ajax({
				type:"POST",
				url:'/pass',
				cache:false,
				data: {_token: CSRF_TOKEN, pass_1:pass_1, tokencode:tokencode},
				success:function(html){
					if(html=='Ok'){
						$('#form_phone').empty();
						$('#form_phone').next().remove();
						$('.button').remove();
						$('#form_phone').append('<label>Введите телефон для подтверждения</label><div class="ui input"><input type="text" id="phone"><input type="hidden" name="_token" id="token" value="{{{ csrf_token() }}}" /><input type="hidden" name="tokenreg" id="tokenreg" value="{{$token}}" /></div>');
						$('#form_phone').append('<br><br><div class="ui submit button" onclick="phone()">Подтвердить</div>');
					}else{
						$('#response').html(html);
					}
					
				}
			})
		}else{
			alert('Пароли не одинаковы!');
		}
	}
	function phone(){
		$('#response').empty();
		var phone=$('#phone').val();
		var tokenreg=$('#tokenreg').val();
		var CSRF_TOKEN = $('#token').val();
		if(phone==''){
			alert('Введите номер телефона!');
		}else if(phone.length<9){
			alert('Телефон в международном формате без +()-');
		}else{
			$.ajax({
				type:"POST",
				url:'/sms',
				cache:false,
				data: {_token: CSRF_TOKEN, phone:phone, tokenreg:tokenreg},
				success:function(html){
					if(html=='Ok'){
						$('#form_phone').append('<div class="required field" id="form_code"><label>Введите код из SMS</label><div class="ui input"><input type="text" id="code"><input type="hidden" name="_token" id="token" value="{{{ csrf_token() }}}" /></div></div>');
						$('.button').remove();
						$('#form_code').append('<br><br><div class="ui submit button" onclick="code()">Подтвердить код</div><div style="color:red;" id="response"></div>');
					}else{
						$('#response').html(html);
					}	
				}
			})
		}
	}
	function code(){
		$('#response').empty();
		var code=$('#code').val();
		var tokencode=$('#tokenreg').val();
		var CSRF_TOKEN = $('#token').val();
		if(code!=''){
			$.ajax({
				type:"POST",
				url:'/code',
				cache:false,
				data: {_token: CSRF_TOKEN, code:code, tokencode:tokencode},
				success:function(html){
					if(html=='Ok'){
						window.location.href = "memberArea"
					}else{
						$('#response').html(html);
						$('#form_phone').css('margin-bottom','-10px');
						$('#response').css('padding-top','5px');
					}
					
				}
			})
		}else{
			alert('Введите код!');
		}
	}
    </script>
@endsection
