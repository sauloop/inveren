<?php

namespace App\Http\Controllers;

use App\City;
use App\Link;
use App\Category;
use App\Sortable;
use App\LinkFilter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function index(Request $request, LinkFilter $filters, Sortable $sortable)
    {
        // $host = $request->getHttpHost();

        // if ($host === 'radiant-dawn-56094.herokuapp.com') {
        //     return Redirect::to('https://inverenlace.com', 301);
        // }

        $title = 'Inicio';

        $description = 'Publica enlaces a tus anuncios de venta entre una selección de ofertas y recomendaciones para inversores. Viviendas, locales, terrenos, bolsa, coleccionismo, coches de lujo, motos.';

        $links = Link::query()
            ->with('user', 'category', 'city')
            ->filterBy($filters, $request->only(['search', 'category_id', 'city_id', 'order']))
            ->orderByDesc('created_at')
            ->paginate();

        $filter = false;
        $exchange_filter = false;

        if (request('category_id')) {
            $filter = true;
            $exchange_filter = $this->isExchangeFilter(request('category_id'));
        }

        $links->appends($filters->valid());

        $sortable->appends($filters->valid());

        $sortable->setCurrentOrder(request('order'), request('direction'));

        return view('index', compact('title', 'links', 'sortable', 'filter', 'exchange_filter', 'description'))->with($this->linksData());
    }

    public function contact()
    {
        $title = 'Contacto';

        return view('contact', compact('title'));
    }

    public function about()
    {
        $title = 'Acerca de';

        return view('about', compact('title'));
    }

    public function linksData()
    {
        return [
            'categories' => Category::orderBy('name', 'ASC')->get(),
            'cities' => City::orderBy('name', 'ASC')->get(),
        ];
    }

    private function getExchangeCategoryId()
    {
        $category = Category::where('name', 'Bolsa')->first();

        return $category->id;
    }

    private function isExchangeFilter($category_id)
    {
        $exchange_category_id = $this->getExchangeCategoryId();

        return $category_id == $exchange_category_id;
    }
}
