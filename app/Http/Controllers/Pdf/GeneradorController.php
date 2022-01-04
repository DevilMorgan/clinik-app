<?php

namespace App\Http\Controllers\Pdf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades;

class GeneradorController extends Controller

{
    // Fórmula médica
    public function printPdf1 (){
        $pdf = \PDF::loadView('pdfs/prescription');
        return $pdf->download('ejemplo.pdf');
    }

    public function loadPdf1 (){
        return \PDF::loadView('pdfs/prescription')
        ->setPaper('a4', 'portrait')
        ->stream('ejemplo.pdf');
    }

    // Incapacidad
    public function printPdf2 (){
        $pdf = \PDF::loadView('pdfs/days_off');
        return $pdf->download('ejemplo.pdf');
    }

    public function loadPdf2 (){
        return \PDF::loadView('pdfs/days_off')
        ->setPaper('a4', 'portrait')
        ->stream('ejemplo.pdf');
    }

    // Autorizaciones
    public function printPdf3 (){
        $pdf = \PDF::loadView('pdfs/procedure');
        return $pdf->download('ejemplo.pdf');
    }

    public function loadPdf3 (){
        return \PDF::loadView('pdfs/procedure')
        ->setPaper('a4', 'portrait')
        ->stream('ejemplo.pdf');
    }

    // Historia medica
    public function loadPdf4 () {
        $pf = \PDF::loadView('historia-medica');
        return $pdf->download('ejemplo.pdf');
    }
}











