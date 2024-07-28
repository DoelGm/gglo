<?php

namespace App\Http\Controllers;


use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\UsersUpdateRequest;

use Illuminate\Support\Facades\Auth;

class usersController extends Controller
{
    public function index()
    {
        if (Auth::user()->role === 'admin'){
            $users = User::all(); // Obtener todos los usuarios
            return view('catalogo-Users', compact('users'));
        }
        return redirect()->route('dashboard');
    }
    public function edit($id)
    {
        if (Auth::user()->role === 'admin'){
            $user = User::findOrFail($id);
            return view('users.edit', compact('user'));
        }
        return redirect()->route('dashboard');
    }
    public function delete($id)
    {
        if (Auth::user()->role === 'admin'){
            $user = User::findOrFail($id);
            return view('users.delete', compact('user'));
        }
        return redirect()->route('dashboard');
    }

    public function update(UsersUpdateRequest $request, $id)
    {
        $user = User::findOrFail($id);
        // dd($user);
        // if (Gate::denies('update', [$user, $request->user()])) {
        //     abort(403); // Puedes personalizar la respuesta de acceso denegado según tus necesidades
        // }
        if (Auth::user()->role === 'admin') {
            $user->fill($request->validated());

            if ($user->isDirty('email')) {
                $user->email_verified_at = null;
            }
            $user->role = $request->input('role') ?? null;
            $user->save();

            return redirect()->route('users')->with('status', 'Usuario actualizado correctamente.');

        } return redirect()->route('dashboard');


        // } else {
        //     return redirect()->route('users')->with('error', 'No tienes permiso para actualizar este usuario.');
        // }
    }
    public function destroy($id): RedirectResponse
    {
        $user = User::findOrFail($id);
        if(Auth::user()->role === 'admin'){
            $user->delete();
        }
        return Redirect::to('/users');
    }

}
