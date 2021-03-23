<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateAccountRequest;
use App\Http\Requests\UpdatePasswordRequest;

class AccountController extends Controller
{
    public function show(User $user)
    {
        $title = "Datos cuenta";

        return view('accounts.show', compact('title', 'user'));
    }

    public function edit(User $user)
    {
        $title = "Editar cuenta";

        $style = session()->get('style');

        return view('accounts.edit', compact('title', 'user', 'style'));
    }

    public function update(User $user, UpdateAccountRequest $request)
    {
        $request->updateAccount($user);

        return redirect()->route('accounts.show', $user);
    }


    public function editPassword(User $user)
    {
        $title = "Editar contraseña";

        return view('passwords.edit', compact('title', 'user'));
    }

    public function updatePassword(User $user, UpdatePasswordRequest $request)
    {
        $style = $request->updatePassword($user);

        return redirect()->route('accounts.edit', $user)->with(['style' => $style]);
    }


    public function destroy(User $user)
    {
        Auth::logout();

        if ($user->delete()) {

            session()->flash('index_msg', 'Cuenta borrada.');

            return redirect()->route('index');
        }
    }
}
