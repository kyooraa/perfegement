<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Management;

class ManageController extends Controller
{
    public function store(Request $req) {
    $validateData = $req->validate([ 
        'date' => 'required|date',
        'jenis' => 'required|in:hadir,izin,sakit,spj,lembur,weekly_report,cuti',
        'tipe' => 'nullable|in:kerja,libur|required_unless:jenis,weekly_report',
        'durasi' => 'nullable|integer|required_unless:jenis,weekly_report',
        'j_approval' => [
            'nullable',
            function ($attribute, $value, $fail) use ($req) {
                // Custom validation for 'j_approval' based on 'durasi'
                if ($req->has('durasi') && $req->durasi > 8 && !$req->hasFile('j_approval')) {
                    $fail($attribute.' is required when durasi is greater than 8.');
                }
            },
            'file',
            'mimes:jpg,png',
            'max:2048'
        ],
        'deskripsi' => 'required|string',
        'note' => 'required|string'
    ]);
    
    try {
        // Check if the file exists before attempting to store
        if ($req->hasFile('j_approval')) {
            $jApprovalPath = $req->file('j_approval')->store('public');
            $validateData['j_approval'] = $jApprovalPath; // Save the file path to the data
        }

        // Store the validated data in the database
        Management::create($validateData);

        return redirect()->back()->with('success', 'Form submitted successfully');
    } catch (\Exception $e) {
        // Log the error
        \Log::error($e->getMessage());
        return redirect()->back()->with('error', 'An error occurred while submitting the form')->withInput();
    }
}

    public function create() {
        return view('form');
    }
}
