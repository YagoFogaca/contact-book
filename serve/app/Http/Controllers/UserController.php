<?php

namespace App\Http\Controllers;

use App\Models\ContactBook;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('pages.login.index');
    }

    public function auth(Request $request)
    {
        try {
            $credentials = [
                'email' => $request->input('email'),
                'password' => $request->input('password')
            ];


            if (!Auth::attempt($credentials, $request->input('remember'))) {
                throw new Exception('Email ou senha invalidos');
            }

            return redirect()->route('contact-book.index');
        } catch (Exception $error) {
            return redirect()->back()->withErrors(['auth' => 'Email ou senha invalidos'])->withInput();
        }
    }

    public function create()
    {
        return view('pages.create-user.index');
    }

    public function store(Request $request)
    {
        try {
            $user = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password'))
            ];

            $credentials = [
                'email' => $request->input('email'),
                'password' => $request->input('password')
            ];

            $userCreated = User::create($user);

            if (!$userCreated) {
                return redirect()->back()->withErrors(['create' => 'Informações invalidas'])->withInput();
            }

            Auth::attempt($credentials);

            ContactBook::create(['user_id' => Auth::id()]);

            return redirect()->route('contact-book.index');
        } catch (Exception $error) {
            return redirect()->back()->withErrors(['create' => 'Ocorreu um erro interno'])->withInput();
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('user.index');
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
