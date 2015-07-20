<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Beer extends Model {
	public function getBeerQuery()
	{
		//$unlock = $this->latest('username')->get();
		$beer = Beer::where('id', '=', 157)
					->join('beer_dist', 'beers.id', '=', 'beer_dist.beer_id')
					->join('dist', 'beer_dist.dist_id', '=', 'dist.id_dist')
					->orderBy('id_dist', 'desc')
					->skip(2)//Смещение от начала 
					->take(2)//и лимит числа возвращаемых строк
					->get();
		return $beer;
	}
	
}
