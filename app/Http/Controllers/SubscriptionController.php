<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

class SubscriptionController extends Controller
{
    public function info(User $user)
    {
        $title = "Período de prueba";

        return view('subscriptions.info', compact('title', 'user'));
    }

    public function edit(User $user)
    {
        return view('subscriptions.edit', compact('user'));
    }

    public function update(User $user)
    {
        $data = request()->validate(['subscription' => 'boolean']);

        DB::transaction(function () use ($user, $data) {

            $user->forceFill(
                [
                    'subscription' => $data['subscription']
                ]
            );

            $user->save();
        });

        return redirect()->route('subscription.edit', compact('user'));
    }

    public function notification()
    {
        $title = "Suscripción";

        $subscription_end = Carbon::parse(auth()->user()->subscription_end);

        $subscription_end = $subscription_end->format('d/m/Y');

        return view('subscriptions.notification', compact('title', 'subscription_end'));
    }
}
