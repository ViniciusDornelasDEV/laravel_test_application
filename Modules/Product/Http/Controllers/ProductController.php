<?php

namespace Modules\Product\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('product::index');
    }

    public function create()
    {
        return view('product::create');
    }

    public function store(Request $request) {}

    public function show($id)
    {
        return view('product::show');
    }

    public function edit($id)
    {
        return view('product::edit');
    }

    public function update(Request $request, $id) {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {}
}
