@extends('layouts.base')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="mt-4 grid md:grid-cols-2 grid-cols-1">
        <div class="flex h-full justify-center custom-align-center">
            <span>
                Welcome <b>{{ \Illuminate\Support\Facades\Auth::user()->name }}</b>
            </span>
            @if(\Illuminate\Support\Facades\Auth::user()->image)<img class="rounded-full" src="{{ url('uploads/'.\Illuminate\Support\Facades\Auth::user()->image) }}" alt="profile_image" style="width: 50px;height: 50px; padding: 10px; margin: 0px; ">@endif
            {{ \Illuminate\Support\Facades\Auth::user()->role->name }}
        </div>
        <div class="py-2 px-4 rounded bg-gray-100 h-32 flex flex-wrap justify-around custom-align-center @error('image') lg:h-32 md:h-44 h-40 @enderror">
            @if(\Illuminate\Support\Facades\Auth::user()->image)
                <img class="image rounded-full" src="{{ url('uploads/'.\Illuminate\Support\Facades\Auth::user()->image) }}" alt="profile_image" style="width: 80px;height: 80px; padding: 10px; margin: 0px;">
            @endif
            <form action="{{ route('profile_image_upload') }}" method="POST" enctype="multipart/form-data">
                <abbr title="Your image must be: at least 70px*70px, in the maximum size of 512KB">?</abbr>
                @csrf
                <style>
                    input[type="file"] {
                        display: none;
                    }
                    .custom-file-upload {
                        border: 1px solid #ccc;
                        display: inline-block;
                        padding: 6px 12px;
                        cursor: pointer;
                    }
                </style>
                <label class="custom-file-upload">
                    <input type="file" name="image">
                    <i class="fas fa-cloud-upload-alt"></i> Upload Profile
                </label>
                <button type="submit" class="transition duration-200 ease-in-out bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded-md">Upload</button>
            </form>
                @error('image')
                    <span class="invalid-feedback text-red-500 text-sm" role="alert">
                        {{ $message }}
                    </span>
                @enderror
        </div>
    </div>
    <div class="flex justify-center mt-12 custom-align-center">
        Your memes<a class="py-2 px-4 ml-8 transition duration-200 ease-in-out bg-blue-500 hover:bg-blue-700 text-white rounded-md" href="{{ route("memes.create") }}">Upload new memes</a>
    </div>
    <div class="mt-8 grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-4">
        @if(count($memes) == 0)
            You have no meme
        @else
            @foreach($memes as $meme)
                <div class="">
                    <a href="{{ route('memes.show', $meme->id) }}">
                        <div class="flex justify-center border">
                            <img src="{{ url('uploads/'.$meme->photo) }}" alt="" style="max-width: 400px; min-width: 300px">
                        </div>
                        Category: {{ $meme->category->name }}
                        <form action="{{ route("memes.destroy", $meme->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="mx-1 px-1 py-1 rounded bg-red-300 outline-none" type="submit"><i class="fas fa-trash"></i></button>
                        </form>
                    </a>
                </div>
            @endforeach
        @endif
    </div>
@endsection
