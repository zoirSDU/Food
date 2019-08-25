<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
//use App\Http\Requests\MassDestroyProductRequest;
use App\Http\Requests\StoreMenuRequest;
//use App\Http\Requests\UpdateProductRequest;
use App\Menu;
use App\Product;


class MenuController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('menu_access'), 403);

        $menus = Menu::all();

        return view('admin.menu.index', compact('menus'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('menu_create'), 403);
        $userId = \Auth::user()->id;
        $products = Product::all();
        $results = [];
        foreach ($products as $product) {
            if( $product->owner_id === $userId ) {
                $results[] = $product;
            }
        }
        return view('admin.menu.create', compact('results') );
    }

    public function store(StoreMenuRequest $request)
    {
       abort_unless(\Gate::allows('menu_create'), 403);

       $menus = Menu::create($request->all());

       return redirect()->route('admin.menu.index');
    }

    public function edit(Product $product)
    {
        abort_unless(\Gate::allows('menu_edit'), 403);

        return view('admin.menu.edit', compact('menu'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        abort_unless(\Gate::allows('menu_edit'), 403);

        $product->update($request->all());

        return redirect()->route('admin.menu.index');
    }

    public function show(Product $product)
    {
        abort_unless(\Gate::allows('menu_show'), 403);

        return view('admin.menu.show', compact('product'));
    }

    public function destroy(Product $product)
    {
        abort_unless(\Gate::allows('menu_delete'), 403);

        $product->delete();

        return back();
    }

    public function massDestroy(MassDestroyProductRequest $request)
    {
        Product::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
