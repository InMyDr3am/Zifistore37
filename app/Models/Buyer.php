<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class Buyer extends Model
{
    protected $table = 'buyers';

    protected $fillable = ["name", "phone", "address"];

    public function limitAddress()
    {
        $address = Str::limit($this->address, 30);
        return $address;
    }

    // public function typeBuyer()
    // {
    //     return $this->belongsTo('App\Models\TypeBuyer','type_buyer_id');
    // }

    public function getAllData()
    {
        return Buyer::select('id', "name", "phone", "address")
            ->orderBy('name', 'ASC')
            ->get();
    }

    // public function getAllDataByTypeBuyer($id)
    // {
    //     return Buyer::where('type_buyer_id', $id)
    //         ->select('id',"type_buyer_id", "name", "phone", "address", "prov_id")
    //         ->orderBy('name', 'ASC')->get();
    // }

    // public function responGetAllData($buyer, $message)
    // {
    //     return response()->json([
    //         'data' => BuyerResource::collection($buyer),
    //         'message' => $message,
    //         'success' => true
    //     ]);
    // }

    // public function responOneData($buyer, $message)
    // {
    //     return response()->json([
    //         'data' => new BuyerResource($buyer),
    //         'message' => $message,
    //         'success' => true
    //     ]);
    // }

    // public function storeValidation(Request $request)
    // {
    //     $validator = Validator::make($request->all(), ( new BuyerStoreRequest())->rules());
    //     return $validator;
    // }

    public function saveData(Request $request)
    {
        $buyer = Buyer::create([
            'type_buyer_id' => $request->get('type_buyer_id'),
            'name' => $request->get('name'),
            'phone' => $request->get('phone'),
            'prov_id' => $request->get('prov_id'),
            'city_id' => $request->get('city_id'),
            'village_id' => $request->get('village_id'),
            'address' => $request->get('address'),
        ]);

        return $buyer;
    }

    public function updateData(Request $request, $id)
    {
        $buyer = Buyer::findOrFail($id);
        $buyer->update([
            'type_buyer_id' => $request->get('type_buyer_id'),
            'name' => $request->get('name'),
            'phone' => $request->get('phone'),
            'prov_id' => $request->get('prov_id'),
            'city_id' => $request->get('city_id'),
            'village_id' => $request->get('village_id'),
            'address' => $request->get('address'),
        ]);
        return $buyer;
    }

    public function resultStore(Request $request, $validator)
    {
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        else  
        {
            $buyer = $this->saveData($request);
            $message = "Berhasil menyimpan data buyer";
            return $this->responOneData($buyer, $message);
        }
    }

    public function resultUpdate(Request $request, $validator, $id)
    {
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        else  
        {
            $buyer = $this->updateData($request, $id);
            $message = "Berhasil mengubah data buyer";
            return $this->responOneData($buyer, $message);
        }
    }

    public function totalBuyer()
    {
        return Buyer::select('prov_id')
        ->raw('count(*) as total')
        ->groupBy('prov_id')
        ->get();
    }
}
