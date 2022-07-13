<?php

namespace App\Http\Controllers;

use App\Models\Specialite;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class APISpecialiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specialites = DB::table('specialites')
->get()
->toArray();
return response()->json([
'status' => 'Success',
'data' => $specialites,
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
        $request->validate([
            'entree'=> 'required|max:100',
            'plat' =>'required|max:100',
            'dessert' =>'required|max:100',
        ]);

        $specialite = Specialite::create([
            'entree' => $request ->entree, 
            'plat' => $request -> plat, 
            'dessert' =>   $request -> dessert,  
        ]);

        return response()->json([
            'status' => 'Success',
            'data' => $specialite
        ]);       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Specialite  $specialite
     * @return \Illuminate\Http\Response
     */
    public function show(Specialite $specialite)
    {
        return response()->json($specialite);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Specialite  $specialite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Specialite $specialite)
    {
        $this->validate($request, [
            'entree' => 'required|max:100',
            'plat' => 'required|max:100', 
            'dessert' => 'required|max:100',
        ]);
        $specialite->update ([
            'entree' => $request ->entree, 
            'plat' => $request -> plat, 
            'dessert' =>   $request -> dessert,
        ]);

        return response()->json([
            'status' => 'Mise à jour avec succès',]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Specialite  $specialite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Specialite $specialite)
    {
        $specialite->delete();
        return response()->json([
            'status' => 'Supprimer avec succès avec succèss']);
    }
}
