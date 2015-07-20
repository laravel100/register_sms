<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Unlock;
use App\Models\Beer;

class PostController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Post $postModel)
	{   
		//$posts = Post::all();
		//$posts = Post::latest('id')->get();
		//$posts = Post::latest('published_at')->get();
		// $posts = Post::latest('published_at')
				// ->where('published_at', '<=', Carbon::now())
				// ->get();
		$posts=$postModel->getPublishedPosts();
		return view('posts', ['posts'=>$posts]);
	}
	
	public function unpublished(Post $postModel)
	{  
		
		$posts=$postModel->getUnPublishedPosts();
		return view('posts', ['posts'=>$posts]);
	}
	
	public function sqlquery(Unlock $unlockModel)
	{  
		$unlock=$unlockModel->getUnlockQuery();
		//$users = DB::table('unlock')->select('username', 'email')->get();
		return view('unlock',['unlock'=>$unlock]);
	}
	public function beer(Beer $beerModel)
	{  
		
		$beer=$beerModel->getBeerQuery();
		//dd($beer);
		//$users = DB::table('unlock')->select('username', 'email')->get();
		return view('beer',['beer'=>$beer]);
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Post $postModel, Request $request)
	{
		//dd($request->all());
		$postModel->create($request->all());
		return redirect()->route('posts.index');
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
