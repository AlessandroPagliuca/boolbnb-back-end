<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Mail\NewContact;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();

        // validiamo i dati "a mano" per poter gestire la risposta
        $validator = Validator::make($data, [
            'email' => 'required|email',
            'message' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                // la funzione errors() della classe Validator resituisce un array
                // in cui la chiave è il campo soggetto a validazione
                // e il valore è un array di messaggi di errore
                'errors' => $validator->errors()
            ]);
        }

        //salviamo a db i dati inseriti nel form di contatto
        $new_message = new Message();
        $new_message->fill($data);
        $new_message->save();

        // inviamo la mail all'host del sito, passando il nuovo oggetto Message
        Mail::to('info@provaprova.com')->send(new NewContact($new_message));

        return response()->json([
            'success' => true,
        ]);
    }
}