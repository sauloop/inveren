<?php

namespace App\Http\Controllers;

use App\Link;
use App\Category;
use Carbon\Carbon;

class CompanyController extends Controller
{
    public function index()
    {
        $title = "Gestionar cuenta";

        $user = auth()->user();

        $subscription_end = Carbon::parse(auth()->user()->subscription_end);

        $subscription_end = $subscription_end->format('d/m/Y');

        return view('company.dashboard', compact('title', 'user', 'subscription_end'));
    }

    // public function userList()
    // {
    //     $title = 'Listado enlaces';

    //     $links = Link::all()->where('user_id', '==', auth()->user()->id);

    //     return view('links.userlist', compact('title', 'links'))->with($this->linksData());
    // }

    // public function linksData()
    // {
    //     return [
    //         'categories' => Category::orderBy('name', 'ASC')->get(),
    //     ];
    // }
}
