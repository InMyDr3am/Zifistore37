<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\DataTables;

class Marketplace extends Model
{
    protected $table = 'marketplaces';

    protected $fillable = ["name"];

    public static function getAllData()
    {
        return self::select("id","name")
                ->orderBy('name', 'ASC')
                ->get();
    }

    public static function getDataForDatatables()
    {
        $marketplaces = self::getAllData();

        return DataTables::of($marketplaces)
            ->addColumn('no', function($marketplaces) {
                return '';
            })
            ->addColumn('action', function($row) {
                $editUrl = route('marketplaces.edit', $row->id);
                $deleteUrl = route('marketplaces.destroy', $row->id);

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
}
