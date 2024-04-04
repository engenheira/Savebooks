<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',
         ['except'=> ['login','loginPost', 'register', 'registerPost']]);
    }
    public function index()
    {
       

            return view('admin/index');
      
    }

    public function login(Request $request)
    {
        return view('admin/login', ['error' => $request->session()->get('error')]);
    }

    public function loginPost(Request $request)
    {
        $acessCredential = $request->only('email', 'password');
        if(Auth::attempt($acessCredential)){
            return redirect('/admin');
        }else{
            return redirect('/admin/login')->with('error', 'E-mail e/ou senha não conferem.');
        }
    }
    public function register(Request $request)
    {
        return view('admin/register', ['error' => $request->session()->get('error')]);
    }

    public function registerPost(Request $request)
    {
        $acessCredential = $request->only('name' ,'email', 'password');

        $hasEmail = User::where('email', $acessCredential['email'])->count();

        if($hasEmail == 0){
            $user = new User();
            $user->name = $acessCredential['name'];
            $user->email = $acessCredential['email'];
            $user->password = password_hash($acessCredential['password'], PASSWORD_DEFAULT);
            $user->save();
            Auth::login($user);
            return redirect('/admin');
        }else{
            return redirect('/admin/register')->with('error', 'O email informado já está sendo utilizado.');
          
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/admin');
    }
}
