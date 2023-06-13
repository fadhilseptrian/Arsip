<?php

namespace App\Http\Controllers;

use App\Models\surat;
use Illuminate\Http\Request;
use App\Http\Controllers\RedirectResponse;

class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $surat = surat::all();       
        return response(view('index',['surat' => $surat]));
    }

    public function admin()
    {
        return view('layouts.appLayout');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('input');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $name = $request->file('document')->getClientOriginalName();

       $request->document->move('file/',$name);
    
        surat::create([
            'pengirim' => $request->pengirim,
            'nomorsurat' => $request->nomorsurat,
            'jenis' => $request->jenis,
            'tanggal' => $request->tanggal,
            'nomoragenda'=> $request->nomoragenda,
            'perihal'=> $request->perihal,
            'asal'=> $request->asal,
            'diteruskan'=> $request->diteruskan,
            'document'=> $name,
        ]);
    
        return redirect()->route('surat.index')->with('success', 'surat created successfully.');
    }
        
    /**
     * Display the specified resource.
]     */
    public function show($id)
    {
        $surats = surat::where('id',$id)->get();
    
        return view('lihat', compact('surats'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $surats = surat::findOrFail($id);
        return view('edit',compact('surats'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $update = surat::findOrfail($id);

        $update ->update([
            'pengirim'=> $request ->get('pengirim'),
            'nomorsurat'=> $request ->get('nomorsurat'),
            'jenis'=> $request ->get('jenis'),
            'tanggal'=> $request ->get('tanggal'),
            'nomoragenda'=>$request ->get('nomoragenda'),
            'perihal'=>$request ->get('perihal'),
            'asal'=>$request ->get('asal'),
            'diteruskan'=>$request->get('diteruskan')
        ]);

        $file = $request->file('document');

        if($file != null){
            $name = $request->file('document')->getClientOriginalName();

            $request->document->move('file/',$name);
            $update->update(['document'=>$name]);
        }

        return redirect()->route('surat.index')->with('success', 'surat edit successfully.');
    }

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       $destroy = surat::findOrFail($id);

      
        $destroy->delete();
        return redirect()->route('surat.index')->with('success', 'surat delete successfully.');
       
    }
    
    public function showCard()
    {
        return view('dashboard');
    } 

    public function jenisSatu()
    {
        $jenisSatu = surat::where('jenis','masuk')->get();
        return view('jenisSatu',compact('jenisSatu'));
    }

    public function jenisDua()
    {
        $jenisDua = surat::where('jenis','keluar')->get();
        return view('jenisDua',compact('jenisDua'));
    }


}