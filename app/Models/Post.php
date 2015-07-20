<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model {

	protected $fillable = ['slug', 'title', 'excerpt', 'content', 'published', 'published_at'];
	public function getPublishedPosts()
	{
		$posts = $this->latest('published_at')->published()->get();
		return $posts;
	}
	
	public function scopePublished($query)
	{
		$query ->where('published_at', '<=', Carbon::now())
				->where('published', '=', 1);
	}
	
	public function scopeUnPublished($query)
	{
		$query ->where('published', '=', 0);
	}
	public function getUnPublishedPosts()
	{
		$posts = $this->latest('published_at')->unpublished()->get();
		return $posts;
	}
	
}
