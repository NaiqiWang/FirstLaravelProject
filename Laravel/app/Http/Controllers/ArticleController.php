<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;
use App\Tag;
use Carbon\Carbon;
use App\Http\Requests\ArticleRequest;
use App\Http\Controllers\Auth;
use Illuminate\Database\Eloquent\Model;

class ArticleController extends Controller
{
	//middle register here or register in route
	public function __construct()
	{
		$this->middleware('auth',['only' => 'create']);
		//$this->middleware('auth',['except' => 'create']);
	}
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
    	$tags = Tag::lists('name','id');
    	
    	return view('articles.create', compact('tags'));
    }
    
    public function edit($id)
    {
    	$article = Article::findOrFail($id);
    	$tags = Tag::lists('name','id');
    	
    	return view('articles.edit', compact('article','tags'));
    }
    
    public function update($id, ArticleRequest $request)
    {
    	$article = Article::findOrFail($id);
    	
    	$article->update($request->all());
    	
    	$article->tags()->sync($request->input('tag_list'));
    	
    	return redirect('articles');
    }
    
    public function store(ArticleRequest $request)
    {
    	//Automatic Validation because of App\Http\Requests\CreateArticleRequest

    	$article = new Article($request->all());
    	\Auth::user()->articles()->save($article);
    	//Article::create($request->all());
    	
    	$tagIds = $request->input('tag_list');
    	$article->tags()->attach($tagIds);
    	
    	
    	
    	\Session::flash('flash_message', 'Your article has been created!');
    	\Session::flash('flash_message_important', true);
    	 
    	return redirect('articles');
    }
}
