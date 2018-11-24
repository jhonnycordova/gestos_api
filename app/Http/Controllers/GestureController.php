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
            'parameters' => $request->input('parameters'),
            'gesture_type_id' => $request->input('gesture_type_id'),
        ]);

        return response()->json(['gesture' => $gesture, 'success' => 'Gesto creado con éxito'], 200);
    }

    /**
     * Create a new Gesture
     */
    public function update(Request $request)
    {
        $gesture = Gesture::find($request->input('id'));
        $gesture->name = $request->input('name');
        $gesture->action = $request->input('action');
        $gesture->parameters = $request->input('parameters');

        $gesture->save();

        return response()->json(['gesture' => $gesture, 'success' => 'Gesto modificado con éxito'], 200);
    }

}
