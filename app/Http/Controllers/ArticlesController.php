<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Article;
use Illuminate\Http\Request;
use App\Http\Requests\CreateArticleRequest;

class ArticlesController extends Controller
{
    public function index(){
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
    public function store(CreateArticleRequest $request){
        //public function store (CreateArticleRequest $request), otro metodo
        //antes que se pueda crear un articulo se va a llamar a la validacion, si no pasa la validacion no se ejecutan las siguientes lineas
        //$this->validate($request,['title'=>'required','body'=>'required']); //este es otro metodo sin tener que crear una clase request
        Article::create($request->all());
        return redirect('articles');

    }
}
