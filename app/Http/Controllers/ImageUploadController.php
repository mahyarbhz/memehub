<?php

namespace App\Http\Controllers;

use Faker\Core\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ImageUploadController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|mimes:jpeg,png|dimensions:min_width=70,min_height=70,ratio=1/1|max:512',
        ]);

        if($request->hasFile('image')){
            if (Auth::user()->image != "images/user.jpg") {
                Storage::disk('public_uploads')->delete(Auth::user()->image);
            }
            $filepath = Storage::disk('public_uploads')->put('images', $request->image);
            Auth::user()->update(['image'=>$filepath]);
        }
        return redirect()->back();
    }
}
