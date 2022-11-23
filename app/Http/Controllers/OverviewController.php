<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OverviewController extends Controller
{
    public function index(){
        $tes_operasi = DB::table('t_dokumentasi')
        ->select(DB::raw('count(*) status_id'))
        ->where('status_id', 1)
        ->count();
        
        $live_baru = DB::table('t_dokumentasi')
        ->select(DB::raw('count(*) status_id'))
        ->where('status_id', 2)
        ->count();

        $live_perubahan = DB::table('t_dokumentasi')
        ->select(DB::raw('count(*) status_id'))
        ->where('status_id', 3)
        ->count();

        $ditutup = DB::table('t_dokumentasi')
        ->select(DB::raw('count(*) status_id'))
        ->where('status_id', 4)
        ->count();

        $status = DB::table('t_dokumentasi')->count('status_id');

        return view('dashboard.overview.main', [
            'status' => $status,
            'tes_operasi' => $tes_operasi,
            'live_baru' => $live_baru,
            'live_perubahan' => $live_perubahan,
            'ditutup' => $ditutup
        ]);
    }
}
