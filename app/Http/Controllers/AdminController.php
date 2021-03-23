<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $title = "Administrar";

        $date = Carbon::now();

        $trials_number = User::where([
            ['trial', 1],
            ['filled', 1],
            ['subscription_end', null]
        ])->count();

        $subscriptions_number = User::where('subscription', 1)->count();

        $subscriptions_end_number = User::where([
            ['admin', 0],
            ['subscription_end', '!=', null],
            ['subscription_end', '<', $date],
            ['approved', 1]
        ])->count();

        return view('admin.dashboard', compact('title', 'subscriptions_end_number', 'trials_number', 'subscriptions_number'));
    }

    public function trialsIndex()
    {
        $this->authorize('view', auth()->user());

        $title = "Pruebas pendientes";

        $users = User::where([['subscription_end', null], ['filled', 1]])->with('profile')->get();

        return view('trials.index', compact('title', 'users'));
    }

    public function individualTrialInit(User $user)
    {
        $this->authorize('update', auth()->user());

        $date = Carbon::now();

        DB::transaction(function () use ($user, $date) {

            $user->forceFill(
                [
                    'trial' => "1",
                    'subscription' => "0",
                    'subscription_end' => $date->addYear(),
                    'approved' => "1",
                ]
            );

            $user->save();
        });

        return redirect()->route('users.show', $user);
    }

    public function trialsInit()
    {
        $this->authorize('view', auth()->user());

        $title = "Iniciar pruebas";

        $date = Carbon::now();

        $users = User::where([['subscription_end', null], ['filled', 1]])->with('profile')->get();

        foreach ($users as $user) {

            DB::transaction(function () use ($user, $date) {

                $user->forceFill(
                    [
                        'trial' => "1",
                        'subscription' => "0",
                        'subscription_end' => $date->addYear(),
                        'approved' => "1",
                    ]
                );

                $user->save();
            });

            // $user->trial = "1";
            // $user->subscription = "0";
            // $user->subscription_end = $date->addYear();
            // $user->approved = "1";

            // $user->save();
        }

        return view('trials.init', compact('title', 'users'));
    }

    public function subscriptionsIndex()
    {
        $this->authorize('view', auth()->user());

        $title = "Suscripciones pendientes";

        $users = User::where('subscription', 1)->get();

        return view('subscriptions.index', compact('title', 'users'));
    }

    public function individualSubscriptionInit(User $user)
    {
        $this->authorize('update', auth()->user());

        $date = Carbon::now();

        DB::transaction(function () use ($user, $date) {

            $user->forceFill(
                [
                    'trial' => "0",
                    'subscription' => "0",
                    'subscription_end' => $date->addYear(),
                    'approved' => "1",
                ]
            );

            $user->save();
        });

        return redirect()->route('users.show', $user);
    }

    public function subscriptionsInit()
    {
        $this->authorize('view', auth()->user());

        $title = "Iniciar suscripciones";

        $date = Carbon::now();

        $users = User::where('subscription', 1)->get();

        foreach ($users as $user) {

            DB::transaction(function () use ($user, $date) {

                $user->forceFill(
                    [
                        'trial' => "0",
                        'subscription' => "0",
                        'subscription_end' => $date->addYear(),
                        'approved' => "1",
                    ]
                );

                $user->save();
            });
            // $user->trial = "0";
            // $user->subscription = "0";
            // $user->subscription_end = $date->addYear();
            // $user->approved = "1";

            // $user->save();
        }

        return view('subscriptions.init', compact('title', 'users'));
    }

    public function unsubscribe()
    {
        $this->authorize('view', auth()->user());

        $title = "Bajas pendientes";

        $date = Carbon::now();

        $users = User::where([
            ['subscription_end', '!=', null],
            ['subscription_end', '<', $date],
            ['approved', 1]
        ])->get();

        return view('unsubscribe.index', compact('title', 'users'));
    }

    public function unsubscribeInit()
    {
        $this->authorize('view', auth()->user());

        $title = "Iniciar bajas";

        $date = Carbon::now();

        $users = User::where([
            ['subscription_end', '!=', null],
            ['subscription_end', '<', $date],
            ['approved', 1]
        ])->get();


        foreach ($users as $user) {

            DB::transaction(function () use ($user, $date) {

                $user->forceFill(
                    [
                        'trial' => "0",
                        'subscription' => "0",
                        'approved' => "0",
                    ]
                );

                $user->save();
            });
        }

        return view('unsubscribe.init', compact('title', 'users'));
    }

    public function userReset(User $user)
    {
        $this->authorize('update', auth()->user());

        DB::transaction(function () use ($user) {

            // $user->profile()->update(
            //     [
            //         'company_name' => null,
            //         'address' => null,
            //         'phone' => null
            //     ]
            // );

            $user->profile->delete();

            $user->forceFill(
                [
                    'trial' => "1",
                    'subscription' => "0",
                    'subscription_end' => null,
                    'approved' => "0",
                    'filled' => "0"
                ]
            );

            $user->save();
        });

        return redirect()->route('users.edit', $user);
    }
}
