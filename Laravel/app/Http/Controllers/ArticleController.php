<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;
use Carbon\Carbon;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $articles = Article::all();
        return view('articles.index', compact('articles'));
    }
	
    public function show($id)
    {
    	$articles = Article::findOrFail($id);
    	
    	
    	return view('articles.show', compact('articles'));
    }
    
    public function create()
    {
    	return view('articles.create');
    }
    
    public function store()
    {
    	$input = Request::all();
    	$input['published_at'] = Carbon::now();
    	
    	Article::create($input);
    	
    	return redirect('articles');
    }
}
