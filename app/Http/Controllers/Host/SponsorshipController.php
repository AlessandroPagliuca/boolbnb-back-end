<?php

namespace App\Http\Controllers\Host;

use App\Http\Controllers\Controller;
use App\Models\Sponsorship;
use App\Http\Requests\StoreSponsorshipRequest;
use App\Http\Requests\UpdateSponsorshipRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SponsorshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {

        $sponsorships = Sponsorship::all();
        return view('host.sponsorships.index', compact('sponsorships'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSponsorshipRequest  $request
     */
    public function store(StoreSponsorshipRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sponsorship  $sponsorship
     */
    public function show(Sponsorship $sponsorship)
    {

        return view('host.sponsorships.show', compact('sponsorship'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sponsorship  $sponsorship
     */
    public function edit(Sponsorship $sponsorship)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSponsorshipRequest  $request
     * @param  \App\Models\Sponsorship  $sponsorship
     */
    public function update(UpdateSponsorshipRequest $request, Sponsorship $sponsorship)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sponsorship  $sponsorship
     */
    public function destroy(Sponsorship $sponsorship)
    {
        //
    }

    public function add(Request $request)
    {
        // Creare la sponsorizzazione nel database
        $sponsorship = new Sponsorship;
        $sponsorship->save();

        // Ottenere l'appartamento corrente
        $apartment = $sponsorship->apartment;

        // Salva la relazione nella tabella apartment_sponsorship
        $apartment->sponsorships()->attach($sponsorship->id, [
            'start_date' => now(),
            'end_date' => now()->addHour($sponsorship->duration), // Modifica come desideri la durata della sponsorizzazione
        ]);

        // Ritorna una risposta di successo al client
        return response()->json(['message' => 'Sponsorizzazione aggiunta con successo'], 200);
    }
}
