<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cluster;
use App\Models\Soal;
use Carbon\Carbon;
use Rap2hpoutre\FastExcel\FastExcel;
use Yajra\DataTables\DataTables;


class ClusterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public static function GetSoal($id)
    {
        $model = Soal::where('cluster_id', $id)->get();
        
        return view('components.Admin.detail', compact('model'));
    }

    // public static function GetCluster($id)
    // {
    //     $model = Cluster::findOrFail($id);

    //     return view('components.Admin.detail', compact('model'));
    // }

    public function Create()
    {
        $model = new Cluster();

        return view('components.Admin.form', compact('model'));
    }

    public function store(Request $request)
    {
        //VALIDASI
        $this->validate($request, [
            'cluster' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'asesor_name' => 'required|string|max:255'
            ]);
        
        $now = Carbon::now('Asia/Jakarta');
        $time = '_'.$now->format('Y-m-d').'_'.$now->micro;
        $cluster_name = $request->cluster.$time;

        $cluster = Cluster::create([
            'cluster' => $cluster_name,
            'lokasi' => $request->lokasi,
            'asesor_name' => $request->asesor_name,
            'created_at' => Carbon::now('Asia/Jakarta'),
            'updated_at' => Carbon::now('Asia/Jakarta')
        ]);
    }

    public function Edit($id)
    {
        $model = Cluster::findOrFail($id);
        return view('components.Admin.form', compact('model'));
    }

    public function Update($id, Request $request)
    {
        //VALIDASI
        $this->validate($request, [
            'cluster' => 'required|string|max:255',
            'asesor_name' => 'required|string|max:255',
        ]);

        $cluster = Cluster::findOrFail($id);
        $cluster->cluster = $request->cluster;
        $cluster->asesor_name = $request->asesor_name;
        $cluster->updated_at = Carbon::now('Asia/Jakarta');
        $cluster->save();

        return redirect()->back();

    }

    public function Import($id)
    {
        $model = Cluster::findOrFail($id);

        return view('components.Admin.import', compact('model'));      

    }

    public function StoreImport($id, Request $request)
    {

        //VALIDASI
        $this->validate($request, [
            'files' => 'required|mimes:xls,xlsx',
        ]);

        if ($request->hasFile('files')) {
            $file = $request->file('files'); //Get File
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
        return redirect()->back();

        }
    }
    

    public function Delete($id)
    {
        $cluster = Cluster::findOrFail($id);

        $cluster->delete();
    }

    public function dataTable()
    {
        $model = Cluster::query();
        return DataTables::of($model)
            ->addColumn('action', function($model) {
                return view('components.Admin._action', [
                    'model' => $model,
                    'url_import' => route('cluster.soal.create', $model->id),
                    'url_show' => route('soal.view', $model->id),
                    'url_edit' => route('cluster.edit', $model->id),
                    'url_destroy' => route('cluster.delete', $model->id)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
