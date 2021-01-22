<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class Login extends Controller
{

    public function index(Request $req)
    {
        if ($req->session()->exists('login')) {
            return redirect()->route('dashboard');
        }
        if ($req->isMethod('post')) {
            $email = $req->email;
            $password = sha1($req->password);

            if (User::where([['email', $email], ['password', $password]])->exists()) {
                $req->session()->put('login', $email);
                return redirect()->route('dashboard');
            } else {
                $req->session()->flash("error", "username and password is incorrect");
                return redirect()->back();
            }
        }
        return view('index');
    }
    public function register()
    {
        return view('register');
    }
    public function insert(Request $req)
    {
        $req->validate([
            'name' => 'required|regex:/^[]a-zA-Z]+$/u',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8',
        ]);

        User::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => sha1($req->password),
        ]);
        return redirect()->route('index');
    }
    public function dashboard(Request $req)
    {
        if ($req->session()->exists('login')) {
            $data['data'] = User::where('email', $req->session()->get('login'))->first();
            return view('dashboard', $data);
        } else {
            return redirect()->route('index');
        }
    }

    public function logout(Request $req)
    {
        $req->session()->forget('login');
        return redirect()->route('index');
    }
}
