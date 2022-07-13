<?php

namespace App\Http\Controllers\API;

use App\Models\Traiteur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class TraiteurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $traiteur = DB::table('traiteurs')
        ->get()
        ->toArray(); 

        // retourne les infos utilsateurs en format JSON
        return response()->json([
            'status' => "Success",
            'date' =>$traiteur,
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
//Enregistrement de nouvelles données dans la base        
        $request->validate ([
            'nameEntreprise' => 'required|max:100',
            'phoneNumber' => 'required|max:100', //Attention ecriture deans le schema identique mais sur php my admin écriture phone_number
            'email' => 'required|max:100',
        ]);
//On créer un nouveau traiteur 
        $traiteur = Traiteur::create([
            'nameEntreprise' => $request ->nameEntreprise, 
            'phoneNumber' => $request -> phoneNumber, 
            'email' =>   $request -> email,  
        ]);
// On retourne les informations du nouvel utilisateur en JSON
return response()->json([
    'status' => 'Success',
    'data' => $traiteur
]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Traiteur  $traiteur
     * @return \Illuminate\Http\Response
     */
    public function show(Traiteur $traiteur)
    {
        return response()->json($traiteur);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Traiteur  $traiteur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Traiteur $traiteur)
    {
        $this->validate($request, [
            'nameEntreprise' => 'required|max:100',
            'phoneNumber' => 'required|max:100', 
            'email' => 'required|max:100',
        ]);
        $traiteur->update ([
            'nameEntreprise' => $request ->nameEntreprise, 
            'phoneNumber' => $request -> phoneNumber, 
            'email' =>   $request -> email,
        ]);

        return response()->json([
            'status' => 'Mise à jour avec succès',]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Traiteur  $traiteur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Traiteur $traiteur)
    {
        $traiteur->delete();
        return response()->json([
            'status' => 'Supprimer avec succès avec succèss']);
    }
}
