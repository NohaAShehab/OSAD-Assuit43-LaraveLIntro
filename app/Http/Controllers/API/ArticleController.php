<?php

namespace App\Http\Controllers\API;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Resources\ArticleResource;
use App\Http\Requests\API\StoreArticleRequest;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    function __construct(){
        $this->middleware('auth:sanctum')->only('store');
    }
    public function index()
    {
        //
//        return Article::all();  # return array of object
        return ArticleResource::collection(Article::all());
    }

    /**
     * Store a newly created resource in storage.
     */
//    public function store(Request $request)
//    {
//        //
//
//        $article = Article::create($request->all());
//        $this->save_image($request->image, $article);
////        return new  Response($article, 201);
////        return new Response(new ArticleResource($article), 201);
//        return new ArticleResource($article);
//    }
    public function store(StoreArticleRequest $request)
    {
        //
        ## validate request ?
//        $request->validate(['title'=>'required'],['title'=>'title required']);

        $article = Article::create($request->all());
        $this->save_image($request->image, $article);
//        return new  Response($article, 201);
//        return new Response(new ArticleResource($article), 201);
        return new ArticleResource($article);
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
        if ($article){
//            return $article; # return article object
            return  new ArticleResource($article);  #
        }
        return  new Response('', 205);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
//        dd($article);
        //
//        dump($request->all());
        $old_image=  $article->image;
        $article->update($request->all());
        $this->save_image($request->image, $article);
        if($request->image){
            $this->delete_image($old_image);
        }

//        return new Response($article, '200');
        return new ArticleResource($article);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
        $article->delete();
        return new Response('', 204);
    }

    private function save_image($image, $article){
        if ($image){
            $image_name = time().'.'.$image->extension();
            $image->move(public_path('images/articles'),$image_name);
            $article->image = $image_name;
            $article->save();
        }
    }
    private  function  delete_image($image_name){
        if($image_name !='article.png' and ! str_contains($image_name, '/tmp/')){
            try{
                unlink(public_path('images/articles/'.$image_name));

            }catch (\Exception $e){
                echo $e;
            }
        }
    }
}
