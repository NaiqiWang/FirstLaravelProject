<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;
use Carbon\Carbon;
use App\Http\Requests\ArticleRequest;
use Illuminate\Database\Eloquent\Model;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
    

    	//Display all.
//      $articles = Article::all();
        
    	//Don't display future ones.
//      $articles = Article::latest('published_at')->where('published_at', '<=', Carbon::now())->get();
        
    	
    	//utilize query scope defined in Article.php scopePublished
    	$articles = Article::latest('published_at')->Published()->get();
    	
        return view('articles.index', compact('articles'));
    }
	
    public function show($id)
    {
    	$articles = Article::findOrFail($id);
    	
//     	dd($articles->published_at);
    	
    	return view('articles.show', compact('articles'));
    }
    
    public function create()
    {
    	return view('articles.create');
    }
    
    public function edit($id)
    {
    	$article = Article::findOrFail($id);
    	return view('articles.edit', compact('article'));
    }
    
    public function update($id, ArticleRequest $request)
    {
    	$article = Article::findOrFail($id);
    	
    	$article->update($request->all());
    	
    	return view('articles.edit', compact('article'));
    }
    
    public function store(ArticleRequest $request)
    {
    	//Automatic Validation because of App\Http\Requests\CreateArticleRequest

    	$article = new Article($request->all());
    	\Auth::user()->articles()->save($article);
    	
    	//Article::create($request->all());
    	
    	return redirect('articles');
    }
}
