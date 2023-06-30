<?php

namespace App\Http\Controllers\Host;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Http\Requests\StoreApartmentRequest;
use App\Http\Requests\UpdateApartmentRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Service;
use App\Models\Message;
use App\Models\Sponsorship;
use App\Models\User;
use App\Models\View;
use App\Models\Image;




class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $apartments = Apartment::paginate(6);
        return view('host.apartments.index', compact('apartments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {

        $data = [
            $images = Image::all(),
            $services = Service::all(),
            $sponsorships = Sponsorship::all(),
            $views = View::all(),
        ];

        return view('host.apartments.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreApartmentRequest  $request
     */
    public function store(StoreApartmentRequest $request)
    {
        $data = $request->validated();
        $slug = Str::slug($request->title, '-');
        $data['slug'] = $slug;

        $newApartment = Apartment::create($data);

        if ($request->has('services')) {
            $newApartment->services()->attach($request->services);
        }
        if ($request->has('sponsorships')) {
            $newApartment->sponsorships()->attach($request->sponsorships);
        }

        return redirect()->route('host.apartments.show', [$newApartment->title])
            ->with('message', "L'appartamento {$newApartment->name} è stato aggiunto con successo! :)");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Apartment  $apartment
     */
    public function show(Apartment $apartment)
    {
        return view('host.apartments.show', compact('apartment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Apartment  $apartment
     */
    public function edit(Apartment $apartment)
    {
        $data = [
            $images = Image::all(),
            $services = Service::all(),
            $sponsorships = Sponsorship::all(),
            $views = View::all(),
        ];
        return view('host.apartments.edit', compact('apartment', 'data'));
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
        $data['slug'] = $slug;
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
    public function destroy(Apartment $apartment)
    {
        $apartment->delete();
        return redirect()->route('host.apartments.index')->with('message', "$apartment->title è stato cancellato con sucesso!");
    }
}