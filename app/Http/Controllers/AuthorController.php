<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',
         ['except'=> ['login','loginPost', 'register', 'registerPost']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::all();
        return view('admin.author.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        
        return view('admin.author.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $validated = $request->validate([
            'full_name' => 'required|unique:authors|max:255',
            'date_of_birth' => 'required',
            'country' => 'required',
            'biography' => 'required',
        ]);



        $author = Author::create(
            [
                'full_name' => $request->full_name,
                'date_of_birth' => $request->date_of_birth,
                'country' => $request->country,
                'biography' => $request->biography,
            ]
        );

        

        if ($author->wasRecentlyCreated) {
            return redirect()->route('author.index');
        }
    }




    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $author = Author::find($id);
        if(!$author){
            return redirect()->route('author.index')->with('warning', 'Autor não existe');
        }
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|max:255|unique:authors,full_name,'.$id,
            'date_of_birth' => 'required',
            'country' => 'required',
            'biography' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Se a validação passar, atualize o item
        $author = Author::find($id);
        $author->update($request->all());
    
        return redirect()->route('author.index')->with('success', 'Autor atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $author = Author::find($id);
        if(!$author){
            return redirect()->route('author.index')->with('warning', 'Autor não existe');
        }
        if($author->delete()){
          return redirect()->route('author.index')->with('success', 'Autor deletado com sucesso');
        }
    }
}
