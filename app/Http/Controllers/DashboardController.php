<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dashboard;
use App\Models\Segmen;


class DashboardController extends Controller
{
    //FUNGSI UNTUK MENAMPILKAN DATA DASHBOARD
    public function index(Request $request)
    {
        $segmenList = Dashboard::select('NamaSegmen')->distinct()->get();
    
        $filterSegmen = $request->input('segmen');
    
        $data = Dashboard::when($filterSegmen, function ($query) use ($filterSegmen) {
            return $query->where('NamaSegmen', $filterSegmen);
        })->get();
    
        return view('dashboard', compact('data', 'filterSegmen', 'segmenList'));
    }
}
