<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\FastExcel;
use Carbon\Carbon;
use App\Models\Soal;
use App\Models\Cluster;

class SoalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth:admin');
    }

    public function import($id)
    {
        $soal = Cluster::findOrFail($id);

        return view('components.Admin.import', compact('model'));      
    }

    public function store($id, Request $request) 
    {
        //VALIDASI
        $this->validate($request, [
            'file' => 'required|mimes:xls,xlsx',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file'); //Get File
            $collection = (new FastExcel)->import($file, function ($line) use ($id) {
                return Soal::create([
                    'soal' => $line['Soal'],
                    'image' => $line['Image'],
                    'A' => $line['A'],
                    'B' => $line['B'],
                    'C' => $line['C'],
                    'D' => $line['D'],
                    'E' => $line['E'],
                    'kunci' => $line['Kunci'],
                    'cluster_id' => $id
                ]); //Import File
            });   
        }

    }
}
