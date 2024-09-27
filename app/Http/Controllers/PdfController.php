<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class PdfController extends Controller
{
    //
    public function generatePdf()
    {
        $data = Teacher:: get();
        $pdf = Pdf::loadView('pages.teachers.generate-teacher-pdf', $data);
        return $pdf->download('invoice.pdf');
    }
}
