<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="icon" href="/media/images/fav.ico" type="image/x-icon">
<title>Академия</title>
<link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
<link href="{{ asset('/css/menu_style.css') }}" rel="stylesheet">
<link href="{{ asset('/css/login_style.css') }}" rel="stylesheet">
<link href="{{ asset('/css/note_style.css') }}" rel="stylesheet">
</head>
<body onload="cal()">
<!--вход-->
<div class="backwhite" id="back">
    <div class="win_log" id="vxod">
		<a href="#" onClick=" hid_win();"><div align="right" class="win_x">х</div></a>
        <div class="win_text" align="center"><a href="#" class="win_text">ВХОД</a></div>
        <div class="" align="center">
		
        </div> 
        <div class="win_input">
		    <form action="#"  id='loginform' method ='post'>
				<input class="btn win_btn" id="username_l" type="text" placeholder="E-MAIL" required>
				<input class="btn win_btn" id="password_l" type="password" placeholder="ПАРОЛЬ" required>
				<input class="btn win_btn_sub" type="submit" value="ВОЙТИ">
			</form>
        </div>
        <div class="win_input" align="center">
        	<a href="#" onClick="show_reg();"><div class="win_t1" >Регистриция</div></a>
            <a href="#" onClick="show_vost();"><div class="win_t2" >Забыли пароль?</div></a>
        </div>
		<div class="win_input" id="response_login"></div>
    </div>
    <div class="win_log" id="registr">
		<a href="#" onClick=" hid_win();"><div align="right" class="reg_x">х</div></a>
        <div class="win_text" align="center"><a href="#" class="win_text">РЕГИСТРАЦИЯ</a></div>
        <div class="" align="center">
        
        </div> 
        <div class="win_input">
		<form action='#' method='POST' id='formreg'>
			<input class="btn win_btn" name="username" id="username_r" type="text" placeholder="Имя" required>
        	<input class="btn win_btn" name="email" id="email_r" type="text" placeholder="E-MAIL" required>
            <input class="btn win_btn" name="password" id="password_r" type="text" placeholder="ПАРОЛЬ" required>
            <input class="btn win_btn_sub" type="submit" value="ВОЙТИ">
		</form>
        </div>
        <div class="win_input" align="center">
        	 <a href="#" onClick="show_vxod();"><div class="win_t1">Вход</div></a>
             <a href="#" onClick="show_vost();"><div class="reg_t2" >Забыли пароль?</div></a>
        </div>
        <div class="win_input" id="response_reg"></div>
        
    </div>
    <div class="win_log" id="vost">
		<a href="#" onClick=" hid_win();"><div class="vost_x">х</div></a>
        <div class="win_text" align="center">Восстановление<br>пароля</div>
        <div class="win_input">
		<form action='/recovery/save_password' id='form_recovery' method = 'post'>
        	<input class="btn win_btn" type="text" id="email" placeholder="E-MAIL" required>
            <input class="btn win_btn_sub" type="submit" value="ВОСТАНОВИТЬ">
		</form>
        </div>
        <div class="win_input" align="center">
        	<a href="#" onClick="show_reg();"><div class="win_t1" >Регистриция</div></a>
            <a href="#" onClick="show_vxod();"><div class="vost_t2" >Вход</div></a>
        </div>
        <div class="win_input" id="response_recov"></div>
    </div>
</div>
<script>
$(document).ready(function() { 
	$('#loginform').submit(function(){
		$("#response_login").empty();
		$("#response_login").html('ПОДОЖДИТЕ!');
					var email = $('#username_l').val();
					var password = $('#password_l').val();
						$.ajax({
							type: "POST",
							url: "/auth/login",
							cache: false,
							data: "email="+email+"&password="+password,
							// Выводим то что вернул PHP
							
							success: function(html){
							//alert(html.length);
							if(html.length==13||html.length==11){
							  window.location=html;
							}else $("#response_login").html(html);
							
							}
						});
				return false;
				});
	$('#formreg').submit(function(){
		$("#response_reg").empty();
		$("#response_reg").html('ПОДОЖДИТЕ!');
					var username = $('#username_r').val();
					var email = $('#email_r').val();
					var password = $('#password_r').val();
						$.ajax({
							type: "POST",
							url: "/auth/reg",
							cache: false,
							data: "username="+username+"&password="+password+"&email="+email,
							// Выводим то что вернул PHP
							success: function(html){
							//alert(html);
								if(html.length==13||html.length==11){
								    window.location=html;
								}else $("#response_reg").html(html);
							}
							
						});
				return false;
				});
	$('#form_recovery').submit(function(){
		$("#response_recov").empty();
		$("#response_recov").html('ПОДОЖДИТЕ!');
		            var address = '/';
					var email=$(this).find('#email').val();
						$.ajax({
							type: "POST",
							url: "/recovery/save_password",
							cache: false,
							data: 'email='+email,
							// Выводим то что вернул PHP
							success: function(html){
							  $("#response_recov").html(html);
							  if(html.length==126){
							  setInterval(function(){ window.location= address}, 3000);
							  }
							}
						});
				return false;
		});	
});
function search(){ 
  //e.preventDefault();
   var word = $('#search').val();
   $.ajax({
          url: "index/search",
          type: "POST",
          data: 'word='+ word,
          cache: false,
          success: function(html){
			$("#content").empty();
			$("#content").html(html);
			
		}
        });
	return false;
}
</script>
<!--header-->
 <div class="container-fluid q0 a0" onMouseOver="dropout();">
   		<div class="wrapper row-fluid q0">
            	<div class="col-xs-offset-1 col-xs-4 a2 q0" align="right"><div class="a1" >+375</div><div class="a7">17 2575819</div><div class="a8">29 6653070</div></div>
        	<div class="col-xs-2 a6" align="center"><a href="/"><img src="{{ asset('/images/Logo.png')}}"></a></div>
            <div class="col-xs-5 a3 q0" ><div class="a7">ПРОСПЕКТ ПУШКИНА, 39</div><div class="a8">ОФИС 7 (МЕТРО “ПУШКИНСКАЯ“)</div></div>
            @if (Auth::guest())
				<div class=" col-xs-1 a5" >
				<a href="#" ><button class="btn a4 " onClick="vie_win();">ВОЙТИ</button></a>
				</div>
			@else
				<div class=" col-xs-1 a5" >
				<a href="/auth/logout" ><button class="btn a4">Выход</button></a>
				</div>
				<div class=" col-xs-1 a9" >
				<a href="/memberArea" ><button class="btn a4">Кабинет</button></a>
				</div>
			@endif
        </div>
</div>
<!--menu-->
 <div class="container-fluid q0 b0" >
   		<div class="wrapper row-fluid  q0 b5" >
        	<div class="q0 b2 b31"><a href="/about" class="b1 b6">О НАС</a></div>
            <div class="q0 b2 b3" id="posit"><a href="#" data-toggle="collapse" class="b1 b7" onMouseOver="dropmen();">НАШИ ШКОЛЫ</a></div>
            <div class="q0 b2 b3" ><a href="/courses" class="b1 b7" onMouseOver="dropout();">КУРСЫ И РАСПИСАНИЕ</a></div>
            <div class="q0 b2 b3" ><a href="/gallery" class="b1 b7" onMouseOver="dropout();">ГАЛЕРЕЯ</a></div>
            <div class="q0 b2 b3" ><a href="/blog" class="b1" onMouseOver="dropout();">БЛОГ</a></div>
            <div class="q0 b2 b3" ><a href="/contactUs" class="b1 b7" onMouseOver="dropout();">КОНТАКТЫ</a></div>
            <!--<div class="q0 b2 b3 b1" ><a class="b1" onMouseOver="dropout();">
										<input type="text" id="search" placeholder="ПОИСК" class="b1 b10">
										<span onclick="search()" style="cursor:pointer"><img src="/media/images/lupa.png"></span>
									</a>
			</div>-->
			<form action='/search' method='GET' class='q0 b2  b32'>
				<input type="text" id="search" name="word" placeholder="ПОИСК" class="b1 b10">
				<button type="submit" value="" style="padding: 0;border: none;background: none;"><img src="{{ asset('/images/lupa.png')}}" alt="search"></button>
			</form>
            <div class="q0 b2  b32" ><a href="#" class="b1 b4 b7" onMouseOver="dropout();">RU</a></div>
        </div>
        
</div>
<!-- dropmen-->
<div class="dropmen" id="drop"> 
  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true" >

  <div class="panel upshadow">
    <div class="panel-heading" role="tab" id="headingOne" >
      <h4 class="panel-title">
        <a  href="/school/makeUp" onMouseOver="menu(1);">
           ШКОЛА МАКИЯЖА >
        </a>
      </h4>
    </div>
    <div id="collapse1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body upshadow1">
    		<div><a href="/school/course/1">КУРСЫ</a></div>
			<div><a href="/teacher/index/makeup">ПРЕПОДОВАТЕЛИ</a></div>
            <div><a href="/gallery/school/makeup">РАБОТЫ СТУДЕНТОВ</a></div>
            <div><a href="/reviews/school/makeup">ОТЗЫВЫ</a></div>
      </div>
    </div>
  </div>
  <div class="panel ">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a class="collapsed"  data-parent="#accordion" href="/school/hairstyle" aria-expanded="false" aria-controls="collapse2" onMouseOver="menu(2);menuclose(2);">
          ШКОЛА ПАРИКМАХЕРСКОГО ИСКУССТВА >
        </a>
      </h4>
    </div>
    <div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body upshadow1">
    		<div><a href="/school/course/2">КУРСЫ</a></div>
			<div><a href="/teacher/index/hairstyle">ПРЕПОДОВАТЕЛИ</a></div>
            <div><a href="/gallery/school/hairstyle">РАБОТЫ СТУДЕНТОВ</a></div>
            <div><a href="/reviews/school/hairstyle">ОТЗЫВЫ</a></div>
      </div>
    </div>
  </div>
  <div class="panel ">
    <div class="panel-heading" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a class="collapsed"  data-parent="#accordion" href="/school/manicure" aria-expanded="false" aria-controls="collapse3" onMouseOver="menu(3);menuclose(3);">
         ШКОЛА МАНИКЮРНОГО КУССТВА >	
        </a>
      </h4>
    </div>
    <div id="collapse3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body upshadow1">
    		<div><a href="/school/course/4">КУРСЫ</a></div>
			<div><a href="/teacher/index/manicure">ПРЕПОДОВАТЕЛИ</a></div>
            <div><a href="/gallery/school/manicure">РАБОТЫ СТУДЕНТОВ</a></div>
            <div><a href="/reviews/school/manicure">ОТЗЫВЫ</a></div>
      </div>
    </div>
  </div>


 <div class="panel ">
    <div class="panel-heading" role="tab" id="heading4">
      <h4 class="panel-title">
        <a class="collapsed" data-parent="#accordion" href="/school/cosmetology" aria-expanded="true" aria-controls="collapse4" onMouseOver="menu(4);menuclose(4);">
          ШКОЛА КОСМЕТОЛОГИИ >
        </a>
      </h4>
    </div>
    <div id="collapse4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading4">
      <div class="panel-body upshadow1">
    		<div><a href="/school/course/3">КУРСЫ</a></div>
			<div><a href="/teacher/index/cosmetology">ПРЕПОДОВАТЕЛИ</a></div>
            <div><a href="/gallery/school/cosmetology">РАБОТЫ СТУДЕНТОВ</a></div>
            <div><a href="/reviews/school/cosmetology">ОТЗЫВЫ</a></div>
      </div>
    </div>
  </div>


<div class="panel downshadow">
    <div class="panel-heading" role="tab" id="heading6">
      <h4 class="panel-title">
        <a class="collapsed" data-parent="#accordion" href="/school/style" aria-expanded="true" aria-controls="collapse5" onMouseOver="menu(5);menuclose(5);">
          ШКОЛА СТИЛЯ >
        </a>
      </h4>
    </div>
    <div id="collapse5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading6">
     <div class="panel-body upshadow1">
    		<div ><a href="/school/course/5">КУРСЫ</a></div>
			<div><a href="/teacher/index/style">ПРЕПОДОВАТЕЛИ</a></div>
            <div><a href="/gallery/school/style">РАБОТЫ СТУДЕНТОВ</a></div>
            <div><a href="/reviews/school/style">ОТЗЫВЫ</a></div>
      </div>
    </div>
  </div>
</div>
</div>
<div class="right_social">
<a class="a_right_social" href="https://vk.com/academie_by"><img width="45" height="45" src="{{ asset('/images/social/vk_right.png')}}"></a>
<a class="a_right_social" href="https://www.facebook.com/academie.stilya"><img width="45" height="45" src="{{ asset('/images/social/fb_right.png')}}"></a>
<a class="a_right_social" href="https://www.youtube.com/channel/UCHHWkVLStgmT0wPcsxA3Fqw"><img width="45" height="45" src="{{ asset('/images/social/g_right.png')}}"></a>
<a class="a_right_social" href="https://instagram.com/academie_stilya"><img width="45" height="45" src="{{ asset('/images/social/ins_right.png')}}"></a>
</div>
<div id="content">
@yield('content')
</div></div>

<div class="container-fluid q0 x1">
   		<div class="wrapper row-fluid q0">
        	<div class="col-xs-offset-1 col-xs-4 a2 q0" align="right"><div class="a1" >+375</div><div class="a7">17 2575819</div><div class="a8">29 6653070</div></div>
        	<div class="col-xs-2 a6" align="center"><a href="/"><img src="{{ asset('/images/Logo.png')}}"></a></div>
            <div class="col-xs-5 a3 q0" ><div class="a7">ПРОСПЕКТ ПУШКИНА, 39</div><div class="a8">ОФИС 7 (МЕТРО “ПУШКИНСКАЯ“)</div></div>
        </div>
</div>
<div class="container-fluid ">
<div class="row-fluid "><div class="f1" align="center">© АКАДЕМИЯ СТИЛЯ, 2015</div></div>
</div>

    <script src="{{ asset('/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('/js/dropdown_menu.js')}}"></script>
    <script src="{{ asset('/js/login.js')}}"></script>
    <script src="{{ asset('/js/note.js')}}"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-62172396-1', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>


    

