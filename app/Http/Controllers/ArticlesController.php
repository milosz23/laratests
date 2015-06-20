<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Carbon\Carbon;


use Request;

use App\Article;

class ArticlesController extends Controller {

	public function __construct()
	{
		$this->middleware('auth', ['only' => 'create']);//only, except or none
	}

	public function index()
	{
		$articles = Article::latest()->published()->get();//published - scope, scopePublished

		return view('articles.index', compact('articles')); 
	}


	public function show($id)
	{
		$article = Article::findOrFail($id);

		return view('articles.show', compact('article'));
	}


	public function create()
	{
		$tags = \App\Tag::lists('name','id');
		return view('articles.create', compact('tags'));
	}



	//validation with form request, need create class CreateArticleRequest with rules
	public function store(\App\Http\Requests\CreateArticleRequest $request)
	{		
		$tagIds = $request->input('tag_list');

		$article = new Article($request->all());

		\Auth::user()->articles()->save($article); //create new article, user_id from registered user
		//Article::create($request->all());

		$article->tags()->attach($tagIds);

		return redirect('articles');
	}
	
	//validation with 'validate' with standard class and inline rules
	// public function store(\Illuminate\Http\Request $request)
	// {		
	// 	$this->validate($request, ['title' => 'required']);

	// 	Article::create($request->all());

	// 	return redirect('articles');
	// } 


	public function edit($article_id)
	{
		$tags = \App\Tag::lists('name','id');
		$article = Article::findOrFail($article_id);

		return view('articles.edit',compact('article','tags'));
	}

	public function update($id, \Illuminate\Http\Request $request)
	{
		$this->validate($request, ['title' => 'required']);//or use createarticle form request

		$article = Article::findOrFail($id);

		$article->update($request->all());

		return redirect('articles');
	}



}
