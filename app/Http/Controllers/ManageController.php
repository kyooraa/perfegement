<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Management;

class ManageController extends Controller
{
    public function store (Request $req) {
        $validateData = $req->validate([
            'date' => 'required|date',
            'status_hadir' => 'required|in:hadir,izin,sakit',
            'jenis' => 'required|in:biasa,libur',
            'jam_datang' => 'required|date_format:H:i',
            'jam_pulang' => 'required|date_format:H:i',
            'j_approval' => 'required|file|mimes:pdf,docx|max:4096',
            'j_agenda' => 'required|file|mimes:pdf,docx|max:4096',
        ]);
        
        // Menyimpan file `j_approval` dan `j_agenda` ke storage/public
        $jApprovalPath = $req->file('j_approval')->store('public');
        $jAgendaPath = $req->file('j_agenda')->store('public');

        // Menambahkan path file ke data yang akan disimpan
        $validateData['j_approval'] = $jApprovalPath;
        $validateData['j_agenda'] = $jAgendaPath;

        Management::create($validateData);
        return redirect('/perfegement')->with('success', 'Data Succesfully Added');
    }
    public function create() {
        return view('form');
    }
}
