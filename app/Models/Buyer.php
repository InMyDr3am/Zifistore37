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

    public static function getAllData()
    {
        return self::select('id', "name", "phone", "slug", "address")
                ->orderBy('name', 'ASC')
                ->get();
    }

    public static function getDataForDatatables()
    {
        $buyers = self::getAllData();

        return DataTables::of($buyers)
            ->addColumn('no', function($buyer) {
                return '';
            })
            ->addColumn('action', function($row) {
                $editUrl = route('buyers.edit', $row->slug);
                $deleteUrl = route('buyers.destroy', $row->id);

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

}
