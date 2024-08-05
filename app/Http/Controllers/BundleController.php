<?php

namespace App\Http\Controllers;

use App\Models\Bundle;
use Illuminate\Http\Request;

class BundleController extends Controller
{
    public function index()
    {
        $bundles = Bundle::all();
        return view('bundles.index', compact('bundles'));
    }

    public function create()
    {
        return view('bundles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        Bundle::create($request->all());
        return redirect()->route('bundles.index');
    }

    public function show(Bundle $bundle)
    {
        return view('bundles.show', compact('bundle'));
    }

    public function edit(Bundle $bundle)
    {
        return view('bundles.edit', compact('bundle'));
    }

    public function update(Request $request, Bundle $bundle)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        $bundle->update($request->all());
        return redirect()->route('bundles.index');
    }

    public function destroy(Bundle $bundle)
    {
        $bundle->delete();
        return redirect()->route('bundles.index');
    }
}
