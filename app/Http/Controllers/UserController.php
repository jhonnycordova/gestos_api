<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
use App\User;

class UserController extends Controller
{
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
        return response()->json(['url_image' => 'https://a2cfc1ef.ngrok.io/storage/' . $imageName], 200);
    }

    public function mail()
    {
        $name = 'Javiera';
        Mail::to('javiera@gmail.com')->send(new SendMailable($name));

        return response()->json(['enviado', true], 200);
    }

    /**
     * GEt The user
     */
    public function getUser()
    {
        $user = User::all()->first();
        return response()->json(['user' => $user], 200);
    }

    /**
     * Create an user
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->input('nombre');
        $user->url = $request->input('url');
        $user->save();
        return response()->json(['user' => $user], 200);
    }
}
