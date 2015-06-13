<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Carbon\Carbon;


use Request;

use App\Article;

class ArticlesController extends Controller {

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
		return view('articles.create');
	}



	//validation with form request, need create class CreateArticleRequest with rules
	public function store(\App\Http\Requests\CreateArticleRequest $request)
	{		
		Article::create($request->all());

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
		$article = Article::findOrFail($article_id);

		return view('articles.edit')->with('article',$article);
	}

	public function update($id, \Illuminate\Http\Request $request)
	{
		$this->validate($request, ['title' => 'required']);//or use createarticle form request

		$article = Article::findOrFail($id);

		$article->update($request->all());

		return redirect('articles');
	}



}
