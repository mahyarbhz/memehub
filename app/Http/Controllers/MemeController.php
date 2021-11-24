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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'photo' => 'required|mimes:jpeg,png|dimensions:max_width=2160,max_height=2160|max:1024',
            'credit' => 'max:190',
            'category_id' => 'required',
//            'g-recaptcha-response' => 'required|captcha'
//        ], $messages = [
//            'g-recaptcha-response' => 'Please check captcha.'
        ])->validate();

        if($request->hasFile('photo')) {
            $file = $request->photo;
            $filepath = Storage::disk('public_uploads')->put('memes', $file);
        }

        $timestamp = now();
        $new_post_id = DB::table('memes')->insertGetId([
            'credit' => $request->input('credit'),
            'category_id' => $request->input('category_id'),
            'user_id' => Auth::user()->id,
            'photo' => $filepath,
            'created_at' => $timestamp,
            'updated_at' => $timestamp,
        ]);

        return response()->json(
            [
                'success' => true,
                'message' => "Meme uploaded successfully, you'll redirect to your dashboard.",
            ]
        );
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
            $meme->comments()->delete();
            $meme->delete();
        }
        return redirect()->back();
    }
}
