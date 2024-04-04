<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware(
            'auth',
            ['except' => ['login', 'loginPost', 'register', 'registerPost']]
        );
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $user = Auth::user();
        $books = Book::all();
        $authors = Author::all();
        return view('admin.book.index', compact('books', 'authors'));

        // cappa
        // url('/media/upload').'/'$book->cover;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors = Author::all();
        return view('admin.book.create', compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'author_id' => 'required',
            'gender' => 'required',
            'sinopse' => 'required',
            'published' => 'required',
            'cover' => 'required'
        ]);



        if ($request->hasFile('cover')) {
            $title = $request->title;
            $author_id = $request->author_id;
            $gender = $request->gender;
            $sinopse = $request->sinopse;
            $published = $request->published;
            $cover = $request->file('cover');
            $name = $cover->hashName();
            $res = $cover->storePublicly('uploads', 'public', $name);
            $url = asset('storage/' . $res);

            Book::create([
                'title'     => $title,
                'author_id' => $author_id,
                'gender'    => $gender,
                'sinopse'   => $sinopse,
                'published' => $published,
                'cover'     => $url
            ]);
        }

        return redirect()->route('book.index')->with('success', 'Livro cadastrado com sucesso!');
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $book = Book::find($id);

        if (!$book) {

            return redirect()->route('book.index')->with('warning', 'Autor não existe');
        }

        $validated = $request->validate([
            'title' => 'required|max:255',
            'author_id' => 'required',
            'gender' => 'required',
            'sinopse' => 'required',
            'published' => 'required',

        ]);



        // Se a validação passar, atualize o item


        if ($request->hasFile('cover')) {

            $title = $request->title;
            $author_id = $request->author_id;
            $gender = $request->gender;
            $sinopse = $request->sinopse;
            $published = $request->published;
            $cover = $request->file('cover');
            $name = $cover->hashName();
            $res = $cover->storePublicly('uploads', 'public', $name);
            $url = asset('storage/' . $res);


            $img = parse_url($book->cover);
            $path = ltrim($img['path'], '/storage\/');
            if (Storage::disk('public')->exists($path)) {
                Storage::disk('public')->delete($path);
            }
            $book->title = $title;
            $book->author_id = $author_id;
            $book->gender = $gender;
            $book->sinopse = $sinopse;
            $book->published = $published;
            $book->cover = $url;

            $book->save();
        } else {

            $book->update($request->all());
        }

        return redirect()->route('book.index')->with('success', 'Livro atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::find($id);
        if (!$book) {
            return redirect()->route('book.index')->with('warning', 'Livro não existe');
        }
        $cover = parse_url($book->cover);
        $path = ltrim($cover['path'], '/storage\/');

        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
            $book->delete();
            return redirect()->route('book.index')->with('success', 'Livro deletado com sucesso');
        }
    }
}
