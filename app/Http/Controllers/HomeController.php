<?php

namespace App\Http\Controllers;

use Gate;
use App\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Gate::denies('isadmin')){
            return redirect()->route('customer.home')->withMessage("Login Successfull");
        }else{
            $books = Book::all();
            return view('admin.home', ['books' => $books]);
        }
    }
}
