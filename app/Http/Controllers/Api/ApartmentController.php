<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    public function index()
    {
        $apartments = Apartment::with('sponsorships')->paginate(5);
        return response()->json([
            'status' => 'success',
            'message' => 'ok',
            'results' => $apartments
        ], 200);
    }

    public function show($slug)
    {
        $apartment = Apartment::with('services', 'images')->where('slug', $slug)->first();

        if ($apartment) {
            return response()->json([
                'status' => 'success',
                'message' => 'ok',
                'results' => $apartment
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Apartment not found !'
            ], 404);
        }


    }
}