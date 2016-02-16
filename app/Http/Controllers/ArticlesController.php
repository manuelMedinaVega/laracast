<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Article;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;

class ArticlesController extends Controller
{
    public function index(){
        //return \Auth::user();
        
    	$articles=Article::latest('published_at')->published()->get();
    	return view('articles.index', compact('articles'));
    }

    public function show($id){
    	$article=Article::findOrFail($id);
    	return view('articles.show', compact('article'));
    }

    public function create(){
    	return view('articles.create');
    }

    /**
     * @param CreateArticleRequest|Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ArticleRequest $request){
        //antes que se pueda crear un articulo se va a llamar a la validacion, si no pasa la validacion no se ejecutan las siguientes lineas
        //public function store (Request $request), otro metodo
        //$this->validate($request,['title'=>'required','body'=>'required']); //este es otro metodo sin tener que crear una clase request
        //Auth::user(); //esto se refiere al usuario que esta actualmente logeado
        
        Article::create($request->all());
        return redirect('articles');

    }
    
    public function edit($id){
        $article = Article::findOrFail($id);
        return view('articles.edit',compact('article'));
    }
    
    public function update($id, ArticleRequest $request){
        $article = Article::findOrFail($id);
        $article->update($request->all());
        return redirect('articles');
    }
}
