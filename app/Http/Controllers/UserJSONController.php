<?php

namespace App\Http\Controllers;

use App\Models\surat;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\RedirectResponse;
use Barryvdh\DomPDF\Facade\Pdf;

class UserJSONController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = user::all();
        return response()->json($user);
    }

    public function rechord()
    {
        $data = user::all();
        return response()->json($data);
    }

    public function generatepdf()
    {
        $data = surat::all();

        $pdf = PDF::loadView('pages.userP',['data'=>$data]);

        return $pdf->download('latihanpdf.pdf');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('inputUser');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request-> role,
            
        ]);
    
        return redirect()->route('user.index')->with('success', 'data created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $surats = surat::where('id',$id)->get();
    
        return response()->json($surats);
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $users, $id)
    {
        $users = User::findOrFail($id);

        return response()->json($users);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $update = user::findOrfail($id);

        $update ->update([
            'name'=> $request ->get('name'),
            'email'=> $request ->get('email'),
            'password'=> $request ->get('password'),
            'role'=> $request ->get('role')
            
        ]);
        return redirect()->route('user.index')->with('success', 'data edit successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $destroy = user::findOrFail($id);

      
        $destroy->delete();
        return redirect()->route('user.index')->with('success', 'data delete successfully.');
    }
}
