<?php

namespace App\Http\Controllers\Host;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Http\Requests\StoreApartmentRequest;
use App\Http\Requests\UpdateApartmentRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Service;
use App\Models\Message;
use App\Models\Sponsorship;
use App\Models\User;
use App\Models\View;




class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $user = Auth::user();
        $apartments = Apartment::where('user_id', $user->id)->paginate(6);
        return view('host.apartments.index', compact('apartments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {


        $services = Service::all();
        $sponsorships = Sponsorship::all();

        return view('host.apartments.create', compact('services', 'sponsorships'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreApartmentRequest $request
     */
    public function store(StoreApartmentRequest $request)
    {
        $form_data = $request->validated();
        $form_data['visible'] = $request->input('visible', true);
        $slug = Str::slug($request->title, '-');
        $uniqueSlug = $slug;
        $counter = 1;

        while (Apartment::where('slug', $uniqueSlug)->exists()) {
            $uniqueSlug = $slug . '-' . $counter;
            $counter++;
        }

        $form_data['slug'] = $uniqueSlug;
        $form_data['user_id'] = Auth::id();

        $newApartment = Apartment::create($form_data);

        if ($request->has('services')) {
            $newApartment->services()->attach($request->services);
        }
        if ($request->has('sponsorships')) {
            $newApartment->sponsorships()->attach($request->sponsorships);
        }

        return redirect()->route('host.apartments.show', $newApartment->slug);
        // ->with('message', "L'appartamento {$newApartment->name} è stato aggiunto con successo! :)");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Apartment  $apartment
     */
    public function show(Apartment $apartment)
    {
        if ($apartment->user_id !== Auth::id()) {
            abort(403);
        }
        return view('host.apartments.show', compact('apartment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Apartment  $apartment
     */
    public function edit(Apartment $apartment)
    {

        if ($apartment->user_id !== Auth::id()) {
            abort(403);
        }
        $services = Service::all();
        $sponsorships = Sponsorship::all();

        return view('host.apartments.edit', compact('apartment', 'services', 'sponsorships'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateApartmentRequest  $request
     * @param  \App\Models\Apartment  $apartment
     */
    public function update(UpdateApartmentRequest $request, Apartment $apartment)
    {
        $data = $request->validated();
        $slug = Str::slug($request->title, '-');
        $slug = Str::slug($request->title, '-');
        $uniqueSlug = $slug;
        $counter = 1;

        while (Apartment::where('slug', $uniqueSlug)->exists()) {
            $uniqueSlug = $slug . '-' . $counter;
            $counter++;
        }

        $data['slug'] = $uniqueSlug;
        $apartment->update($data);

        if ($request->has('services')) {
            $apartment->services()->sync($request->services);
        } else {
            $apartment->services()->sync([]);
        }
        if ($request->has('sponsorships')) {
            $apartment->sponsorships()->sync($request->sponsorships);
        } else {
            $apartment->sponsorships()->sync([]);
        }

        return redirect()->route('host.apartments.show', $apartment->slug)
            ->with('message', "$apartment->title è stato modificato con successo!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Apartment  $apartment
     */
    // public function destroy(Apartment $apartment)

    public function destroy(Apartment $apartment)
    {

        if ($apartment->user_id == Auth::id()) {
            $apartment->delete();
        }

        return redirect()->route('host.apartments.index'); //->with('message', "$apartment->title è stato cancellato con sucesso!");
    }
}