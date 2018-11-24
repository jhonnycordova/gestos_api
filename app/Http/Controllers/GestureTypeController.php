<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GestureType;

class GestureTypeController extends Controller
{
    /**
     * Get de Gestures
     */
    public function getGestureTypes()
    {
        return response()->json(['gesture_types' => GestureType::all()], 200);
    }

    /**
     * Create a new Gesture
     */
    public function create(Request $request)
    {
        $gesture_type = GestureType::create([
            'name' => $request->input('name'),
        ]);

        return response()->json(['gesture_type' => $gesture_type, 'success' => 'Tipo de Gesto creado con éxito'], 200);
    }
}
