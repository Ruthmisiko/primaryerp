<?php

namespace App\Exports;

use App\Models\Student; // Ensure you are using the correct model namespace
use Maatwebsite\Excel\Concerns\FromCollection;

class StudentExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Student::all(); // Fetch all students from the database
    }
}
