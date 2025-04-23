<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\User;
use PHPUnit\Event\TestSuite\Loaded;

class ReportController extends Controller
{


    public function preview()
    {


        $users = User::all();
        return view('reports.user_report', compact('users'));
        $pdf = Pdf::loadView('reports.user_report', compact('users'));

        // return $pdf->download('user_report.pdf');
    }

    public function downloadPDF()
    {

        $users = User::all();
        // return view('reports.user_report', compact('users'));
        $pdf = Pdf::loadView('reports.pdf', compact('users'))
            ->setPaper('a5', 'portrait');
        return $pdf->download('user_report.pdf');
    }


    public function printPDF()
    {
        $users = User::all();
        // return view('reports.user_report', compact('users'));
        $pdf = Pdf::loadView('reports.pdf', compact('users'))
            ->setPaper('a5', 'portrait');
        return $pdf->stream();
    }
}
