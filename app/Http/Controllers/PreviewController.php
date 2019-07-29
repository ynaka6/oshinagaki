<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class PreviewController extends Controller
{
    public function __invoke()
    {
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('test')->setPaper('a4', 'landscape');
        return $pdf->stream();
        // return view('welcome')->render();
    }
}
