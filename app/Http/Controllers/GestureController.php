<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gesture;

class GestureController extends Controller
{

    /**
     * Get de Gestures
     */
    public function GetGestures()
    {
        return response()->json(['gestures' => Gesture::all()], 200);
    }

    /**
     * Create a new Gesture
     */
    public function create(Request $request)
    {
        $gesture = Gesture::create([
            'name' => $request->input('name'),
            'action' => $request->input('action'),
            'parameters' => $request->input('parameters')
        ]);

        return response()->json(['gesture' => $gesture, 'success' => 'Gesto creado con éxito'], 200);
    }
}
