<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Unlock extends Model {
	public function getUnlockQuery()
	{
		//$unlock = $this->latest('username')->get();
		$unlock = Unlock::where('id', '>', '5')->take(10)->get();
		return $unlock;
	}
	
}
