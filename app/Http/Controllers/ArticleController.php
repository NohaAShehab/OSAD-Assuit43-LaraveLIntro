<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use App\Models\User;
use Illuminate\Pagination\Paginator;
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $articles=  Article::paginate(5);
        return view('articles.index', ['articles'=>$articles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $users = User::all();
        return view('articles.create', ['users'=>$users]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        //
        $article=Article::create($request->all());

        $this->save_image($request->image, $article);
        return to_route('articles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
        return view('articles.show', ['article'=>$article]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
        $users = User::all();
        return view('articles.edit', ["article"=>$article, 'users'=>$users]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        //

        if ($request->user()->cannot('update', $article)) {
            abort(403);
        }

        $old_image=  $article->image;
        $article->update($request->all());
        $this->save_image($request->image, $article);
        if($request->image){
            $this->delete_image($old_image);
        }
        return to_route('articles.show', $article->id);



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
        $this->delete_image($article->image);
        $article->delete();
        return to_route('articles.index');

    }

    private  function  delete_image($image_name){
//        dd($image_name !='article.png' and ! str_contains($image_name, '/tmp/'));
        if($image_name !='article.png' and ! str_contains($image_name, '/tmp/')){
        try{
            unlink(public_path('images/articles/'.$image_name));

        }catch (\Exception $e){
            echo $e;
        }
        }
    }

    private function save_image($image, $article){
        if ($image){
            $image_name = time().'.'.$image->extension();
            $image->move(public_path('images/articles'),$image_name);
            $article->image = $image_name;
            $article->save();
        }
    }
}



