<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BookManager extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'published_date' => 'required',
            'price' => 'required',
            'book_image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        $book = new Book();

        $book_image = time().'.'.$request->book_image->extension();

        $request->book_image->move(public_path('booksimg'), $book_image);

        $book->name = $request->input('name');
        $book->published_date = $request->input('published_date');
        $book->authors = $request->input('authors');
        $book->keywords = $request->input('keywords');
        $book->price = $request->input('price');
        $book->description = $request->input('description');
        $book->book_image = $book_image;

        if($book->save()) {
            return back()->withMessage("Book added successfully");
        }else{
            return back()->withError("Error occured while saving Book");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //dd($book);
        return view('admin.book_single')->with('book',$book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('admin.book_edit')->with('book', $book);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'name'=>'required',
            'price'=>'required',
        ]);

        if($request->file('book_image')){
            $book_image = time().'.'.$request->book_image->extension();

            $request->book_image->move(public_path('booksimg'), $book_image);

            $book->name = $request->input('name');
            $book->published_date = $request->input('published_date');
            $book->authors = $request->input('authors');
            $book->keywords = $request->input('keywords');
            $book->price = $request->input('price');
            $book->description = $request->input('description');
            $book->book_image = $book_image;

            if($book->save()) {
                return back()->withMessage("Book Updated successfully");
            }else{
                return back()->withError("Error occured while Updating Book");
            }
        }else{
            $book->name = $request->input('name');
            $book->published_date = $request->input('published_date');
            $book->authors = $request->input('authors');
            $book->keywords = $request->input('keywords');
            $book->price = $request->input('price');
            $book->description = $request->input('description');

            if($book->save()) {
                return back()->withMessage("Book Updated successfully");
            }else{
                return back()->withError("Error occured while Updating Book");
            }
        }
        //$book
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return back();
    }
}
