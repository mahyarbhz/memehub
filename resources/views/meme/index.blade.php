@extends('layouts.base')

@section('title')
    Memes
@endsection

@section('content')
    @if(!count($memes))
        <div class="flex flex-col justify-center mt-16 custom-align-center" style="font-size: 40px">
            <img src="{{ asset('img/empty.svg') }}" alt="Empty!" style="max-width: 350px">
            <div class="mt-6 text-lg">
                <b>
                    No memes yet! check here tomorrow :)
                </b>
            </div>
        </div>
    @else
    <div class="flex justify-center mt-16">
        <div class="grid grid-cols-1">
            @foreach($memes as $meme)
                <livewire:meme.preview :meme=$meme />
            @endforeach
        </div>
    </div>
    @endif
    <div class="flex justify-center">
        {{ $memes->links() }}
    </div>
@endsection
