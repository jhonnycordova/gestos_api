<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;

class UserController extends Controller
{
    /**
     * Create an user
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
     * Convert an image from base64
     */
    public function convertImage(Request $request)
    {
        $image = $request->input('image'); // image base64 encoded
        preg_match("/data:image\/(.*?);/", $image, $image_extension); // extract the image extension
        $image = preg_replace('/data:image\/(.*?);base64,/', '', $image); // remove the type part
        $image = str_replace(' ', '+', $image);
        $imageName = 'image_' . time() . '.' . $image_extension[1]; //generating unique file name;
        Storage::disk('public')->put($imageName, base64_decode($image));
        return response()->json(['url_image' => 'https://33e2b156.ngrok.io/storage/' . $imageName], 200);
    }

    public function mail()
    {
        $name = 'Javiera';
        Mail::to('javiera@gmail.com')->send(new SendMailable($name));

        return response()->json(['enviado', true], 200);
    }
}
