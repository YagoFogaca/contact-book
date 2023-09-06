<?php

namespace App\Http\Controllers;

use App\Models\Contacts;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactBookController extends Controller
{
    public function index()
    {
        try {
            $contacts = Contacts::where('user_id', Auth::id())->get()->toArray();
            return view('pages.home.index', ['contacts' => $contacts]);
        } catch (Exception $error) {
            return redirect()->back()->withErrors(['error' => $error]);
        }
    }

    public function create()
    {
        return view('pages.create-contact.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'nullable',
            'phone' => 'nullable'
        ]);

        try {
            $contact = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'user_id' => Auth::id()
            ];

            $contactCreated = Contacts::create($contact);
            if (!$contactCreated) {
                throw new Exception('Ocorreu um erro interno');
            }

            return redirect()->route('contact-book.index')->with('success', 'Contato adicionado com sucesso');
        } catch (Exception $error) {
            dd($error->getMessage());
            return redirect()->back()->with('success', 'Contato adicionado com sucesso');
        }
    }
}
