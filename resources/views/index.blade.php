@extends('layouts.base')

@section('title')
    Home
@endsection

@section('content')
    <div class="leading-relaxed mt-8 grid md:grid-cols-2 grid-cols-1">
        <div class="flex justify-center"><img src="{{ asset('img/logo1.png') }}" alt="" class="h-100 my-auto"></div>
        <div class="inline-block align-middle text-justify">We made <b>Meme Hub</b> for instagram and other socials bloggers for find memes easier and those who have creativity in making memes to publish their memes for other ones to use. Mainly those who want to get hired as an admin for other pages can introduce themselves here for getting hire easily. We will be thank you if you share memes here with their right <b>credits</b>.</div>
    </div>
    <div class="leading-relaxed md:mt-8 mt-16 grid md:grid-cols-2 grid-cols-1 custom-align-center">
        <div class="flex justify-center text-justify text-lg">
            <b>
                Upload your memes as fast as it can be!
            </b>
        </div>
        <div class="flex justify-center"><img src="{{ asset('img/fastend.svg') }}" alt="" class="h-100 my-auto" style="max-width: 300px"></div>
    </div>
    <div class="flex justify-center mt-16">
        <b>
            <a href="{{ route('memes.index') }}">Start seeing memes <span>→</span></a>
        </b>
    </div>
@endsection
