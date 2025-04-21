<?php

use App\Http\Controllers\PdfController;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return redirect('/employer');
});

Route::middleware(['role:admin'])->group(function () {
    // rutas protegidas por rol
});


// Route::get('pruebas/{user}', function(){
//     $pdf = Pdf::loadView('pdf.example');
//     return $pdf->download('example.pdf');
// })->name('pdf.example');



Route::get('/pdf/generate/conference/{user}', [PdfController::class, 'ConferenceRecords'])->name('pdf.example');
