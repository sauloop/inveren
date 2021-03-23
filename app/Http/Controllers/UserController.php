<?php

namespace App\Http\Controllers;

use App\User;
use App\Sortable;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use App\UserFilter;
use Illuminate\Auth\Access\AuthorizationException;

class UserController extends Controller
{
    public function index(Request $request, UserFilter $filters, Sortable $sortable)
    {
        $this->authorize('viewAny', User::class);

        $title = "Listado usuarios";

        $users = User::query()
            ->where('id', '!=', 1)
            ->filterBy($filters, $request->only(['id', 'search', 'email', 'admin', 'created_at', 'order']))
            ->orderByDesc('created_at')
            ->paginate();

        $users->appends($filters->valid());

        $sortable->appends($filters->valid());

        $sortable->setCurrentOrder(request('order'), request('direction'));

        return view('users.index', compact('title', 'users', 'sortable'));
    }

    public function show(User $user)
    {
        $this->authorize('view', $user);

        $title = "Detalles usuario";

        return view('users.show', compact('title', 'user'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user);

        $title = "Editar usuario";

        if (auth()->user()->id != 1) {
            throw new AuthorizationException;
        }

        return view('users.edit', compact('title', 'user'));
    }

    public function update(User $user, UpdateUserRequest $request)
    {
        $this->authorize('update', $user);

        $request->updateUser($user);

        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        $this->authorize('delete', $user);

        $user->delete();

        return redirect()->route('users.index');
    }
}
