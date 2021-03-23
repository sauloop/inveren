<?php

namespace App\Http\Controllers;

use App\Link;
use App\Category;
use App\City;
use App\Sortable;
use App\LinkFilter;
use Illuminate\Http\Request;
use App\Scopes\ApprovedScope;
use App\Http\Requests\ExchangeRequest;
use App\Http\Requests\CreateLinkRequest;
use App\Http\Requests\UpdateLinkRequest;

class LinkController extends Controller
{

    public function index(Request $request, LinkFilter $filters, Sortable $sortable)
    {
        $title = 'Listado enlaces';

        $links = Link::query()
            ->with('category', 'city')
            ->withoutGlobalScope(ApprovedScope::class)
            ->filterBy($filters, $request->only(['id', 'search', 'category_id', 'city_id', 'url', 'order']))
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

        return view('links.index', compact('title', 'links', 'sortable', 'filter', 'exchange_filter'))->with($this->linksData());
    }

    public function create()
    {
        $this->authorize('create', Link::class);

        $title = 'Publicar enlace';

        $link = new Link;

        return view('links.create', compact('title', 'link'))->with($this->linksData());
    }

    public function store(CreateLinkRequest $request)
    {
        $this->authorize('create', Link::class);

        $request->createLink();

        return redirect()->route('links.index');
    }

    public function edit(Link $link)
    {
        $this->authorize('update', $link);

        $title = 'Editar enlace';

        return view('links.edit', compact('title', 'link'))->with($this->linksData());
    }

    public function update(Link $link, UpdateLinkRequest $request)
    {
        $this->authorize('update', $link);

        $request->updateLink($link);

        return redirect()->route('links.index');
    }

    public function destroy(Link $link)
    {
        $this->authorize('delete', $link);

        $link->delete();

        return redirect()->route('links.index');
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
