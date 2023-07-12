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
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;



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
        // Validazione dei dati inseriti nel form
        $validator = Validator::make($request->all(), [
            'services' => 'required|array|min:1', // Almeno un servizio deve essere selezionato
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $form_data['slug'] = $uniqueSlug;
        $form_data['user_id'] = Auth::id();
        if ($request->hasFile('main_img')) {
            $destination_path = 'public/images/apartments';
            $image = $request->file('main_img');
            $image_name = $image->getClientOriginalName();
            $path = $request->file('main_img')->storeAs($destination_path, $image_name);
            $form_data['main_img'] = $image_name;
        }

        $api_query = $form_data['address'] . ' ' . $form_data['city'] . ' ' . $form_data['country'];
        $response = Http::withoutVerifying()
            ->get('https://api.tomtom.com/search/2/geocode/' . urlencode($api_query) . '.json', [
                'key' => env('GEOCODING_API_KEY'),
            ]);

        if ($response->successful()) {
            $responseData = $response->json();

            if (!empty($responseData['results'])) {
                $firstResult = $responseData['results'][0];

                $form_data['latitude'] = $firstResult['position']['lat'];
                $form_data['longitude'] = $firstResult['position']['lon'];

                // Use the $form_data['latitude'] and $form_data['longitude'] variables as needed
            } else {
                // Handle the case when no results are available
            }
        } else {
            $error = $response->json('error_message');
            // Handle the error appropriately (e.g., show an error message to the user)
        }

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

        if ($request->hasFile('main_img')) {
            Storage::delete($apartment->main_img);
            $destination_path = 'public/images/apartments';
            $image = $request->file('main_img');
            $image_name = $image->getClientOriginalName();
            $path = $request->file('main_img')->storeAs($destination_path, $image_name);
            $data['main_img'] = $image_name;
        }
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

    public function showViews($slug)
    {
        // Recupera l'appartamento dal database utilizzando lo slug
        $apartment = Apartment::where('slug', $slug)->firstOrFail();

        // Recupera i dati delle visualizzazioni mensili dell'appartamento
        $viewsData = $this->viewsData($apartment->getKey());

        // Passa i dati alla vista
        return view('host.apartments.views', compact('apartment', 'viewsData'));
    }

    public function viewsData($apartmentId)
    {
        $viewsData = DB::table('views')
            ->select(DB::raw('MONTH(view_date) AS month'), DB::raw('COUNT(*) AS views'))
            ->where('apartment_id', $apartmentId)
            ->groupBy(DB::raw('MONTH(view_date)'))
            ->orderBy(DB::raw('MONTH(view_date)'))
            ->get();

        $labels = [];
        $data = [];

        foreach ($viewsData as $view) {
            $labels[] = $view->month;
            $data[] = $view->views;
        }

        return [
            'labels' => $labels,
            'data' => $data,
        ];
    }
}
