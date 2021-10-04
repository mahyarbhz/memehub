@extends('layouts.base')

@section('title')
    Memes
@endsection

@section('content')
    <div class="flex justify-center mt-16">
        <b>
            {{ $category->name }} Category
        </b>
    </div>
    @if(!count($memes))
        <div class="flex flex-col justify-center mt-4 custom-align-center" style="font-size: 40px">
            <img src="{{ asset('img/empty.svg') }}" alt="Empty!" style="max-width: 350px">
            <div class="mt-6 text-lg">
                <b>
                    No memes here!
                </b>
            </div>
        </div>
    @else
    <div class="flex justify-center mt-4">
            <div class="grid grid-cols-1">
                @foreach($memes as $meme)
                    <div class="mb-8">
                        <div class="flex justify-start custom-align-center mb-2">
                            <img class="rounded-full mx-2" src="{{ url('uploads/'.$meme->user->image) }}" alt="" style="width: 40px">
                            {{ $meme->user->name }}
                        </div>
                        <a href="{{ route('memes.show', $meme->id) }}">
                            <img src="{{ url('uploads/'.$meme->photo) }}" alt="" style="width: 400px">
                        </a>
                        <div class="px-2 py-2">
                            <div class="flex justify-between">
                                <div></div>
                                <div>
                                    {{ count($meme->comments) }}<a href="{{ route('memes.show', $meme->id) }}"><i class="mx-2 far fa-comment"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
    </div>
    @endif
    <div class="flex justify-center">
        {{ $memes->links() }}
    </div>
@endsection
