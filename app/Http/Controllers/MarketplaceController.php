<?php

namespace App\Http\Controllers;

use App\Http\Requests\MarketplacesRequest;
use App\Models\Marketplace;
use Illuminate\Http\Request;

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
}
