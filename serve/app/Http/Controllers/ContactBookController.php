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
            return redirect()->back()->withErrors(['error' => 'Contato não foi adicionado']);
        }
    }

    public function destroy(string $id)
    {
        try {
            $contact = Contacts::find($id);
            $contactDeleted = $contact->delete();
            if (!$contactDeleted) {
                throw new Exception("Ocorreu um erro interno");
            }
            return response()->json(['message' => 'Contato removido com sucesso', 'contact' => $contact->toArray()], 200);
        } catch (Exception $error) {
            return response()->json(['message' => 'Contato não foi removido'], 400);
        }
    }

    public function edit(Contacts $contact)
    {
        return view('pages.contact-edit.index', ['contact' => $contact]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'nullable|required|min:3',
            'email' => 'nullable|email',
            'phone' => 'nullable'
        ]);

        try {
            $contact = Contacts::find($id);
            $contactUpdate = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone')
            ];

            $contactUpdated = $contact->update($contactUpdate);
            if (!$contactUpdated) {
                throw new Exception("Ocorreu um erro interno");
            }

            return response()->json(['message' => 'Contato atualizado com sucesso', 'contact' => $contact->toArray()], 200);
        } catch (Exception $error) {
            return response()->json(['message' => 'Contato não foi atualizado'], 400);
        }
        // return view('pages.contact-edit.index', ['contact' => $contact]);
    }
}
