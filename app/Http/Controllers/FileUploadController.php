<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Result;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{
    //
    

    public function upload(Request $request)
{
    
    $request->validate([
        'file' => 'required|mimes:csv,txt,xlsx|max:2048',
        'exam_id' => 'required|exists:exams,id',
        'class_id' => 'required|exists:classses,id', // Validate class selection
    ]);

    $file = $request->file('file');
    $path = $file->store('uploads', 'public');

    // Parse file and insert data into the database
    $data = []; // Initialize an array to hold parsed data

    if ($file->getClientOriginalExtension() == 'csv') {
        $csvFile = fopen(storage_path("app/public/{$path}"), 'r');
        $headers = fgetcsv($csvFile); // Assuming first row contains headers

        while (($row = fgetcsv($csvFile)) !== false) {
            $data[] = array_combine($headers, $row);
        }

        fclose($csvFile);
    }

    // Save parsed data to the database
    foreach ($data as $row) {
        Result::create([
            'name' => $row['name'],
            'kiswahili' => $row['kiswahili'],
            'English' => $row['English'],
            'Mathematics' => $row['Mathematics'],
            'CRE' => $row['CRE'],
            'Homescience' => $row['Homescience'],
            'exam_id' => $request->input('exam_id'),
            'class_id' => $request->input('class_id'), // Save the selected class
        ]);
    }

    return redirect()->back()->with('success', 'File uploaded and data inserted successfully!');
}


    public function show($filename)
        {
            $url = Storage::url("uploads/{$filename}");

            return view('file.show', ['url' => $url]);
        }
}
