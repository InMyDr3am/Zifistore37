<?php

namespace App\Http\Controllers;

use App\Http\Requests\BuyerRequest;
use Illuminate\Http\Request;
use App\Models\Buyer;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;

class BuyerController extends Controller
{

    public function index()
    {      
        return view('buyers.index');
    }

    public function getData()
    {
        return Buyer::getDataForDatatables();
    }    

    public function create()
    {
        return view('buyers.create');
    }

    public function store(BuyerRequest $request)
    {
        Buyer::create($request->validated());

        return redirect()->route('buyers.index')
            ->with('success', 'Buyer added successfully!');
    }

    public function edit($slug)
    {
        $buyer = Buyer::where('slug', $slug)->firstOrFail();
        return view('buyers.edit', compact('buyer'));
    }

    public function update(BuyerRequest $request, $id)
    {
        $buyer = Buyer::findOrFail($id);
        $buyer->updateBuyer($request->validated());
        $buyer->updateBuyer($request->only(['name', 'phone', 'address']));
        return redirect()->route('buyers.edit', $buyer->slug)
            ->with('success', 'Buyer Updates Succesfully !');
    }

    public function destroy($id)
    {
        $buyer = Buyer::findOrFail($id);
        $buyer->delete();
        return redirect()->route('buyers.index')
            ->with('success', 'Buyer Deleted Succesfully!');
    }
}
