<?php

namespace App\Http\Controllers;

use App\City;
use App\UserProfile;
use Illuminate\Http\Request;
use App\Http\Requests\CreateProfileRequest;
use App\Http\Requests\UpdateProfileRequest;

class UserProfileController extends Controller
{
    public function show(UserProfile $profile)
    {
        $this->authorize('view', $profile);

        return view('profiles.show', compact('profile'));
    }

    public function create()
    {
        $this->authorize('create', UserProfile::class);

        $title = 'Ingresar datos cuenta';

        $profile = new UserProfile();

        return view('profiles.create', compact('title', 'profile'))->with($this->profilesData());
    }

    public function store(CreateProfileRequest $request)
    {
        $this->authorize('create', UserProfile::class);

        $request->createProfile();

        return redirect()->route('company_dashboard');
    }

    public function edit(UserProfile $profile)
    {
        $this->authorize('update', $profile);

        $title = 'Editar datos cuenta';

        return view('profiles.edit', compact('title', 'profile'));
    }

    public function update(UserProfile $profile, UpdateProfileRequest $request)
    {
        $this->authorize('update', $profile);

        $request->updateProfile($profile);

        return redirect()->route('profiles.show', $profile);
    }

    public function destroy(UserProfile $profile)
    {
        $this->authorize('delete', $profile);

        $profile->delete();

        return redirect()->route('company_dashboard');
    }

    public function profilesData()
    {
        return [
            'cities' => City::orderBy('name', 'ASC')->get()
        ];
    }
}
