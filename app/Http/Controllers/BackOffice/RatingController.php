<?php

namespace App\Http\Controllers\BackOffice;

use DataTables;
use App\Models\Rating;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RatingController extends Controller
{
    public function index()
    {
        if (\request()->ajax()) {
            $data = Rating::with(['place', 'user'])->latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a data-id="' . $row->id . '" data-place="'.$row->place.'" data-user_id="'.$row->user_id.'" data-rating="'.$row->rating.'"  href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> ';
                    $actionBtn .= '<a href="javascript:void(0)" data-id="' . $row->id . '" class="delete btn btn-danger btn-sm">Delete</a>';

                    return $actionBtn;
                })
                ->addColumn('place', function($row){
                    return @$row->place->name;
                })
                ->addColumn('user', function($row){
                    return @$row->user->name;
                })
                ->rawColumns(['place', 'user', 'action'])
                ->make(true);
        }

        return view('back-office/rating/index');
    }
}
