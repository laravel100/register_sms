<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

use Illuminate\Http\Request;
//use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Auth;
//use Input;



class MAController extends Controller {

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
			return redirect('/');
		}
	}
	public function auth(Request $request)
	{
		if ($request)
		{
			$phone = $request->input('phone');
			$password = $request->input('pass');
			$remember = $request->input('remember');
			if(Auth::attempt(['name' => $phone, 'password' => $password, 'status' => 1], $remember)){
				echo "Ok";
			}else{
				echo "Неверный логин или пароль!";
			}
		  
		}
	}
	public function logout()
	{
		If(Auth::logout()){
			echo "Ok";
		}
	}
	
	public function activation(User $UserModel)
	{
		// получаем токен
		if (isset($_GET["token"]) && preg_match('/^[0-9A-F]{40}$/i', $_GET["token"])) {
			$token = $_GET["token"];
			$user=$UserModel->getResultToken($token);
			//print_r($_SERVER["REQUEST_TIME"] - $result[0]->tstamp > 156400);
			if(count($user)>0){
				$delta = 13600; //3600;
				if ($_SERVER["REQUEST_TIME"] - $user[0]->tstamp > $delta && $user[0]->status==0) {
					$token="время жизни токена истекло.";
					return view('register/activation', ['token'=>$token]);
				}elseif($_SERVER["REQUEST_TIME"] - $user[0]->tstamp < $delta && $user[0]->status==1){
					$token="Hello winer luser1";
					return view('register/activation', ['token'=>$token]);	
				}elseif($_SERVER["REQUEST_TIME"] - $user[0]->tstamp > $delta && $user[0]->status==1){
					$token="Hello winer luser2";
					return view('register/activation', ['token'=>$token]);
				}else{
				
					return view('register/phone', ['token'=>$token]);
				}
			}else{
				$token="токен не валиден.";
				return view('register/activation', ['token'=>$token]);
			}
		}else {
			$token="токен не валиден.";
			return view('register/activation', ['token'=>$token]);
			
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
