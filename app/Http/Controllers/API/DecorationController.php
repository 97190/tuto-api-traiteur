<?php

namespace App\Http\Controllers\API;

use App\Models\Decoration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DecorationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $decoration = DB::table('decorations')
        ->get()
        ->toArray(); 

        // retourne les infos utilsateurs en format JSON
        return response()->json([
            'status' => "Success",
            'date' =>$decoration,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate ([
            'mariage' => 'required|max:100',
            'bapteme' => 'required|max:100', 
            'anniversaire' => 'required|max:100',
        ]);

        $decoration = Decoration::create([
            'mariage' => $request ->mariage, 
            'bapteme' => $request -> bapteme, 
            'anniversaire' =>   $request -> anniversaire,  
        ]);
        return response()->json([
            'status' => 'Success',
            'data' => $decoration
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Decoration  $decoration
     * @return \Illuminate\Http\Response
     */
    public function show(Decoration $decoration)
    {
        return response()->json($decoration);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Decoration  $decoration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Decoration $decoration)
    {
        $this->validate($request, [
            'mariage' => 'required|max:100',
            'bapteme' => 'required|max:100', 
            'anniversaire' => 'required|max:100',
        ]);
        $decoration->update ([
            'mariage' => $request -> mariage, 
            'bapteme' => $request -> bapteme, 
            'anniversaire' =>   $request -> anniversaire,
        ]);

        return response()->json([
            'status' => 'Mise à jour avec succès',]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Decoration  $decoration
     * @return \Illuminate\Http\Response
     */
    public function destroy(Decoration $decoration)
    {
        $decoration->delete();
        return response()->json([
            'status' => 'Supprimer avec succès avec succèss']);
    }
}
