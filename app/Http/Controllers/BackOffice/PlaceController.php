<?php

namespace App\Http\Controllers\BackOffice;

use DataTables;
use App\Models\Place;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlaceController extends Controller
{
    public function index()
    {
        if (\request()->ajax()) {
            $data = Place::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('type_status', function ($row) {
                    $type[1] = "Ready";
                    $type[2] = "Booked";
                    $type[3] = "Closed";

                    return $type[$row->status];
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a data-id="' . $row->id . '" data-name="' . $row->name . '" data-latitude="' . $row->latitude . '" data-longitude="' . $row->longitude . '" data-status="' . $row->status . '" href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> ';
                    $actionBtn .= '<a href="javascript:void(0)" data-id="' . $row->id . '" class="delete btn btn-danger btn-sm">Delete</a>';

                    return $actionBtn;
                })
                ->rawColumns(['type_status', 'action'])
                ->make(true);
        }
        return view('back-office/place/index');
    }

    public function delete($id)
    {
        try {
            $place = Place::findOrFail($id);
            $place->delete();

            return response()->json(['code' => 200, 'message' => 'Tempat berhasil terhapus.']);
        } catch (\Exception $e) {
            return response()->json(['code' => 500, 'message' => 'Oops ada yang salah : ' . $e->getMessage()]);
        }
    }

    public function store(Request $request)
    {
        try {
            Place::create($request->all());

            return response()->json(['code' => 200, 'message' => 'Data berhasil ditambahkan.']);
        } catch (\Exception $e) {
            return response()->json(['code' => 500, 'message' => 'Oops, terjadi kesalahan: ' . $e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $place = Place::findOrFail($id);
            // Assuming you have fields like 'name', 'address', etc. in your Place model
            $place->update($request->all());

            return response()->json(['code' => 200, 'message' => 'Data berhasil diedit.']);
        } catch (\Exception $e) {
            return response()->json(['code' => 500, 'message' => 'Oops, terjadi kesalahan: ' . $e->getMessage()]);
        }
    }
}
