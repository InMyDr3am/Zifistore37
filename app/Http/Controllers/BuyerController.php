<?php

namespace App\Http\Controllers;

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

    public function edit($slug)
    {
        $buyer = Buyer::where('slug', $slug)->firstOrFail();
        return view('buyers.edit', compact('buyer'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $buyer = Buyer::findOrFail($id);
        $buyer->updateBuyer($request->only(['name', 'phone', 'address']));

        return redirect()->route('buyers.edit', $buyer->slug)->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $buyer = Buyer::findOrFail($id);
        $buyer->delete();

        // return response()->json(['success' => 'Data berhasil dihapus']);
        return redirect()->route('buyers.index')->with('success', 'Data berhasil dihapus!');
    }
}
