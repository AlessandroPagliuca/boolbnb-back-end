<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    public function home()
    {
        $apartments = Apartment::with('sponsorships');
            // ->whereHas('sponsorships', function ($query) {
            //     $query->where('end_date', '>', now());
            // })
            // ->get();

        return response()->json([
            'status' => 'success',
            'message' => 'ok',
            'results' => $apartments
        ], 200);
    }

    public function index()
    {
        $apartments = Apartment::paginate(12);

        return response()->json([
            'status' => 'success',
            'message' => 'ok',
            'data' => $apartments->items(),
            'meta' => [
                'current_page' => $apartments->currentPage(),
                'last_page' => $apartments->lastPage(),
            ],
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
                'message' => 'Apartment not found !'
            ], 404);
        }
    }
}
