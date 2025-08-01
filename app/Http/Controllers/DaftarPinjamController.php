<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rent;
use App\Models\Room;
use PDF;

class DaftarPinjamController extends Controller
{
    public function index()
    {
        return view('daftarpinjam', [
            'userRents' => Rent::where('user_id', auth()->user()->id)->latest()->paginate(5),
            'title' => "Daftar Pinjam",
            'rooms' => Room::all(),
        ]);
    }

    public function cetakPdf(Request $request)
    {
        $data = $request->all();
        \Log::info('Data diterima untuk cetak PDF:', $data);
        $required = ['room_id', 'time_start_use', 'time_end_use', 'purpose'];
        foreach ($required as $field) {
            if (!isset($data[$field]) || empty($data[$field])) {
                return response('Field "' . $field . '" wajib diisi untuk mencetak PDF.', 400);
            }
        }
        $room = \App\Models\Room::find($data['room_id']);
        if (!$room) {
            return response('Ruangan tidak ditemukan.', 404);
        }
        $pdf = PDF::loadView('pdf.form_pinjam', compact('data', 'room'));
        return $pdf->download('form_pinjam_ruangan.pdf');
    }
}
