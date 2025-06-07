<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\User;

class PDFController extends Controller
{
    public function generatePDF()
    {
        $users = User::get();
    
        $data = [
            'title' => 'Welcome to ItSolutionStuff.com',
            'date' => date('m/d/Y'),
            'users' => $users
        ]; 
              
        $pdf = PDF::loadView('pdf.index', $data);
       
        return $pdf->stream('itsolutionstuff.pdf');
    }
}
