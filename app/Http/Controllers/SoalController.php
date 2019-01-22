<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Soal;
use App\Models\Cluster;

class SoalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth:admin');
    }

    public static function GetSoal($id)
    {
        $get = Soal::where('cluster_id', $id)->get();
        
        return view('components.Admin.showexam', compact('model'));
    }
}
