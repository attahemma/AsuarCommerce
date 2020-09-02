<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function searchBook(Request $request){
        $search_text = $request->input('query');
        $books = Book::where('name', 'LIKE', '%'.$search_text.'%')->get();

        //dd($books);
        return view('search',['books'=>$books, 'search_text'=>$search_text]);
    }
}
