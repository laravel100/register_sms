<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PandingUser extends Model {
    
	public $timestamps = false;
	protected $fillable = ['email', 'token', 'tstamp'];
	public function getResultToken($query)
	{
		$result = PandingUser::where('token', '=', $query)->get();
		return $result;
	}
	public function getResultCode($query)
	{
		$result = PandingUser::where('token', '=', $query)->get();
		return $result;
	}

}
