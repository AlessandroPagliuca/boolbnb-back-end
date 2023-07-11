<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use Illuminate\Http\Request;

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
}
