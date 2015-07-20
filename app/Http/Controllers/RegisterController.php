<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Services\Registrar;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Input;
use Auth;

class RegisterController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if (Auth::check())
		{
		    $token="You avtorization!!!!!!!!!!!!!";
			return view('register/activation', ['token'=>$token]);
		}else{
			return view('register/index');
		}
		
	}
    public function link(Request $request, Registrar $Registrar, User $UserModel)
	{
		$email = $request->input('email');
		$user=$UserModel->getResultEmail($email);
		if (count($user)<=0){
					$token = sha1(uniqid($email, true));
			$url = "http://localhost/activation?token=$token";
			$date=array('email'=>$email,'tstamp'=>$_SERVER["REQUEST_TIME"],'token_reg'=>$token);
			$newUser=$Registrar->create($date);
			$mail_to = $email;
			$mail_from = 'laraver@mail.ru';
			$type = 'html'; //Можно поменять на html; plain означяет: будет присылаться чистый текст.
			$charset = 'utf-8';
			$subject = 'Подтверждение о регистрации на Laravel5!';
			$message = 'Подтвердите регистрацию перейдя по ссылке:<br>
						<a href="'.$url.'">'.$url.'</a>';
			$replyto = 'Регистрация в ларавел!';
			$headers = "To: \"Administrator\" <$mail_to>\r\n".
						  "From: \"Laravel5 :\" <$mail_from>\r\n".
						  "Reply-To: $replyto\r\n".
						  "Content-Type: text/$type; charset=\"$charset\"\r\n";
			   $mail = new MailController();
			   $sended =$mail->smtpmail($mail_to, $subject, $message, $headers);
			echo 'На Ваш Email '.$email.' отправлена ссылка для подтверждения регистрации.';
		}else{
			echo 'Данный Email '.$email.' уже зарегистрирован в системе.';
		}
	}
	public function pass(User $UserModel, Request $request)
	{
		$password = $request->input('pass_1');
		$password = bcrypt($password);
		$tknreg = $request->input('tokencode');
		$passUser = User::where('token_reg', '=', $tknreg)->update(['password' => $password]);
		if($passUser){
			echo 'Ok';
		}else{
			echo $password;
		}
	}
	public function sms(User $UserModel, Request $request)
	{
		$phone = $request->input('phone');
		$rand = rand(1000, 9999);
		$tknreg = $request->input('tokenreg');
		$passUser = User::where('token_reg', '=', $tknreg)->update(['name' => $phone]);
		$rowCode = User::where('token_reg', '=', $tknreg)->update(['code' => $rand]);
		$sUrl  = 'http://letsads.com/api';
		$sXML  = '<?xml version="1.0" encoding="UTF-8"?>
		<request>
			<auth>
				<login>375295547057</login>
				<password>V45645655a</password>
			</auth>
			<message>
				<from>Test</from>
				<text>'.$rand.'</text>
				<recipient>'.$phone.'</recipient>
			</message>
		</request>';

		$rCurl = curl_init($sUrl);
		curl_setopt($rCurl, CURLOPT_HEADER, 0);
		curl_setopt($rCurl, CURLOPT_POSTFIELDS, $sXML);
		curl_setopt($rCurl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($rCurl, CURLOPT_POST, 1);
		$sAnswer = curl_exec($rCurl);
		curl_close($rCurl);
		$xml_new=simplexml_load_string($sAnswer);
		if($xml_new->name=='Complete'){
			echo "Ok";
		}else{
			echo "Отправить Вам СМС не удалось.";
			//print_r($sAnswer);
		}
		
		
	}
	public function code(User $UserModel, Request $request)
	{
		$code = $request->input('code');
		$token = $request->input('tokencode');
		$user=$UserModel->getResultToken($token);
		if($user[0]->code==$code){
			$passUser = User::where('id', '=', $user[0]->id)->update(['status' => 1]);
			if (Auth::loginUsingId($user[0]->id)){
				echo "Ok";
			}else{
				echo "No auth";  
			}
			
		}else{
			echo "Неверный код";
		}
		
	}
	
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
	

}
