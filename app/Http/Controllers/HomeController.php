<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('term');

        // Lógica para buscar no banco de dados ou em qualquer outro lugar
        if($searchTerm){
            $results = DB::table('books')
            ->join('authors', 'books.author_id', '=', 'authors.id')
            ->select('books.*', 'authors.full_name as author_name')
            ->where('books.title', 'LIKE', '%'.$searchTerm.'%')
            ->orWhere('authors.full_name', 'LIKE', '%'.$searchTerm.'%')
            ->get();
        }else{
            $results = Book::all();
        }
      

        
        return response()->json($results);
    }
}
