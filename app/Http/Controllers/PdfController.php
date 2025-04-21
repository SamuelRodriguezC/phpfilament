<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function ConferenceRecords(User $user){
        $conferences = Conference::where('speaker_id', $user->speaker->id)->get();
        $pdf = Pdf::loadView('pdf.example', ['conferences'=>$conferences]);
        return $pdf->download('example.pdf');
    }
}
