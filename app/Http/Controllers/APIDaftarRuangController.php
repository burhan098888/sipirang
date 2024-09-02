<?php

namespace App\Http\Controllers;
use App\Models\Room;
use App\Models\Building;

use Illuminate\Http\Request;

class APIDaftarRuangController extends Controller
{
    public function index(){
        $rooms= Room::orderBy('created_at', 'desc')->get();
        $buildings = Building::all();
        return response()->json([
            'status'=>true,
            'message'=>"Get Data Sukses",
            'data'=>[
                $rooms
            ]
        ],200);
    }
}
