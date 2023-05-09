<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $books = Book::all();

        return view('books.index',['books'=>$books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
//        dd($request);  # request()
        $request->validate([
           "title"=>'required|min:3',
           'no_of_page'=>'min:5'
        ],[
            "title"=>"invalid title"
        ]);
        $request_data = $request->all();

        $book=Book::create($request_data);

        if($request->image){
            $image_name = time().'.'.$request->image->extension();

            $request->image->move(public_path('/images/books'), $image_name);

            $book->image=  $image_name;
            $book->save();
        }

        return to_route('books.index');
    }



    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //

//        dd($book);
        return view('books.show', ['book'=>$book]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //

        return view('books.edit', ['book'=>$book]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
//        dd($book);
        $old_image= $book->image;
//        dump($old_image);

        $request->validate(['title'=>'required']);
//        dd($request->all(), $book);
        $book->update($request->all());
        if($request->image){
            if($old_image!='book.png'){
                try{
                    unlink(public_path('images/books/'.$old_image));
                } catch (Exception $e){
                }
            }

            $image_name = time().'.'.$request->image->extension();

            $request->image->move(public_path('/images/books'), $image_name);

            $book->image=  $image_name;
            $book->save();
        }

        return to_route('books.show', $book->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
        $this->deleteImage($book);
        $book->delete();

        return to_route('books.index');
    }

    private  function  deleteImage(Book $book){
        if($book->image !='book.png'){
            try{
                unlink(public_path('images/books/'.$book->image));
            } catch (Exception $e){

            }
        }
    }
}


