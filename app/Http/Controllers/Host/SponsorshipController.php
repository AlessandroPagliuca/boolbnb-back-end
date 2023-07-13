<?php

namespace App\Http\Controllers\Host;

use App\Http\Controllers\Controller;
use App\Models\Sponsorship;
use App\Models\Apartment;
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
        $apartment = Apartment::where('slug', $sponsorship->apartment_slug)->first();

        // Verifica se l'appartamento è stato trovato
        if ($apartment) {
            $sponsorships = Sponsorship::all();

            // Verifica se l'appartamento non ha già una sponsorizzazione
            if (!$apartment->sponsorships->contains($sponsorship)) {
                $apartment->sponsorships()->attach($sponsorship);
            }

            return view('host.sponsorships.edit', compact('apartment', 'sponsorships'));
        } else {
            // Gestisci il caso in cui l'appartamento non viene trovato
            abort(404); // Ad esempio, genera un errore 404
        }
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

}