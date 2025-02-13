<?php

namespace App\Http\Controllers;

use App\Http\Requests\MarketplacesRequest;
use App\Models\Marketplace;

class MarketplaceController extends Controller
{
    public function index()
    {      
        return view('marketplaces.index');
    }

    public function getData()
    {
        return Marketplace::getDataForDatatables();
    }    

    public function create()
    {
        return view('marketplaces.create');
    }

    public function store(MarketplacesRequest $request)
    {
        Marketplace::create($request->validated());

        return redirect()->route('marketplaces.index')
            ->with('success', 'Marketplace added successfully!');
    }

    public function edit($id)
    {
        $marketplace = Marketplace::findOrFail($id);
        return view('marketplaces.edit', compact('marketplace'));
    }

    public function update(MarketplacesRequest $request, $id)
    {
        $marketplace = Marketplace::findOrFail($id);
        $marketplace->update($request->validated());
        return redirect()->route('marketplaces.edit', $marketplace->id)
            ->with('success', 'Marketplace Updated Succesfully !');
    }

    public function destroy($id)
    {
        $marketplace = Marketplace::findOrFail($id);
        $marketplace->delete();
        return redirect()->route('marketplaces.index')
            ->with('success', 'Marketplace Deleted Succesfully!');
    }
}
