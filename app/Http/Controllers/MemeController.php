<?php

namespace App\Http\Controllers;

use App\Models\Meme;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MemeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $memes = Meme::orderBy('id', 'desc')->paginate(15);
        return view('meme.index', ['memes' => $memes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.memes.create', ['categories' => $categories]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Meme  $meme
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Meme $meme)
    {
        return view('meme.detail',['meme'=>$meme]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Meme  $meme
     * @return \Illuminate\Http\Response
     */
    public function edit(Meme $meme)
    {
//        return view('dashboard.categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Meme  $meme
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meme $meme)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Meme  $meme
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Meme $meme)
    {
        if ($meme->user_id == Auth::user()->id) {
            $image_path = $meme->photo;
            Storage::disk('public_uploads')->delete($image_path);

            $meme->comments()->delete();
            $meme->delete();
        }
        return redirect()->back();
    }
}
