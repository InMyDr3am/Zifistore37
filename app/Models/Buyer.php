<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class Buyer extends Model
{
    protected $table = 'buyers';

    protected $fillable = ["name", "phone", "slug", "address"];

    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    public function limitAddress()
    {
        $address = Str::limit($this->address, 30);
        return $address;
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($buyer) {
            $buyer->slug = Str::slug($buyer->name) . '-' . uniqid();
        });
    }

    // public function typeBuyer()
    // {
    //     return $this->belongsTo('App\Models\TypeBuyer','type_buyer_id');
    // }

    public static function getAllData()
    {
        return self::select('id', "name", "phone", "slug", "address")
                ->orderBy('name', 'ASC')
                ->get();
    }

    public static function getDataForDatatables()
    {
        $buyers = self::getAllData(); // Menyediakan query builder untuk DataTables

        return DataTables::of($buyers)
            ->addColumn('no', function($buyer) {
                // Anda bisa menambahkan kolom nomor otomatis atau logika lainnya di sini
                return ''; // Kolom nomor akan diisi oleh DataTables
            })
            ->addColumn('action', function($row) {
                $editUrl = route('buyers.edit', $row->slug);
                $deleteUrl = route('buyers.destroy', $row->id);

                // Tombol Edit dan Delete
                $btnEdit = '<a href="'.$editUrl.'" class="btn btn-info btn-sm">Edit</a>';
                $btnDelete = '
                    <form action="'.$deleteUrl.'" method="POST" style="display:inline">
                        '.csrf_field().'
                        '.method_field("DELETE").'
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin ingin menghapus data ini?\')">Delete</button>
                    </form>
                ';

                return $btnEdit . ' ' . $btnDelete;
            })
            ->rawColumns(['action']) // Mengizinkan HTML di kolom action
            ->make(true);
    }

    public function updateBuyer($data)
    {
        if (isset($data['name'])) {
            $data['slug'] = Str::slug($data['name'] . '-' . uniqid());
        }

        return $this->update($data);
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
