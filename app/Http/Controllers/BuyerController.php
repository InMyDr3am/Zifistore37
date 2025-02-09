<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buyer;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class BuyerController extends Controller
{
    public function index(Buyer $model)
    {
        // $buyers = $model->getAllData();
        // return view('buyers.index', compact('buyers'));
        return view('buyers.index');
    }

    public function getData()
    {
        $buyers = Buyer::all();  // Mengambil semua data buyers

    return DataTables::of($buyers)
        ->addColumn('no', function($user) {
            // Jika Anda ingin mengisi kolom nomor secara otomatis (opsional)
            return ''; // Kolom nomor akan diisi otomatis oleh DataTables (atau bisa diisi sesuai kebutuhan)
        })
        ->addColumn('action', function($row) {
            // Membuat URL untuk edit dan delete menggunakan helper route
            $editUrl = route('buyers.edit', $row->slug);
            $deleteUrl = route('buyers.destroy', $row->id);

            // Tombol Edit sebagai link
            $btnEdit = '<a href="'.$editUrl.'" class="btn btn-info btn-sm">Edit</a>';

            // Tombol Delete berupa form agar bisa mengirim request method DELETE
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

    public function edit(Buyer $buyer)
    {
        dd($buyer->name);
        // $user sudah didapatkan berdasarkan nilai slug dari URL
        return view('buyers.edit', compact('buyer'));
    }
}
