<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\View;

class ApartmentController extends Controller
{
    public function home()
    {
        $apartments = Apartment::with('sponsorships')->get();
        $filteredApartments = $apartments->filter(function ($apartment) {
            return $apartment->sponsorships->isNotEmpty();
        });

        return response()->json([
            'status' => 'success',
            'message' => 'ok',
            'results' => $filteredApartments,
        ], 200);
    }

    public function index()
    {
        $apartments = Apartment::with('services')->get();

        return response()->json([
            'status' => 'success',
            'message' => 'ok',
            'data' => $apartments,
        ], 200);
    }


    public function show($slug)
    {
        $apartment = Apartment::with('services')->where('slug', $slug)->first();

        if ($apartment) {
            return response()->json([
                'status' => 'success',
                'message' => 'ok',
                'results' => $apartment
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Apartment not found!'
            ], 404);
        }
    }

    //FUNCTION PER GESTIRE LA VISUALIZZAZIONE RICEVUTI DAL FORM DEL FRONT-END
    public function storeMessage(Request $request, $slug)
    {
        $apartment = Apartment::where('slug', $slug)->first();

        if ($apartment) {
            $message = new Message();
            $message->email = $request->input('email');
            $message->message = $request->input('message');

            $apartment->messages()->save($message);

            return response()->json([
                'status' => 'success',
                'message' => 'Message sent successfully',
                'data' => $message
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Message not sent!'
            ], 404);
        }
    }

    //FUNCTION PER GESTIRE LA VISUALIZZAZIONE RICEVUTI FRONT-END
    public function storeView(Request $request)
    {
        // Valida i dati della richiesta
        $request->validate([
            'apartment_id' => 'required|exists:apartments,id',
        ]);

        // Ottieni la data corrente
        $viewDate = date('Y-m-d');

        // Ottieni l'indirizzo IP dell'utente
        $addressIP = $request->input('address_ip');

        // Effettua il salvataggio delle visualizzazioni nel database
        View::create([
            'view_date' => $viewDate,
            'address_ip' => $addressIP,
            'apartment_id' => $request->input('apartment_id'),
        ]);

        // Restituisci una risposta appropriata
        return response()->json(['message' => 'Visualizzazione salvata correttamente.'], 201);
    }
}
