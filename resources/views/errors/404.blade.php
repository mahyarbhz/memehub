@extends('layouts.base')

@section('title')
    404 | Page not found
@endsection

@section('content')
    <div class="flex flex-col justify-center mt-16 custom-align-center" style="font-size: 40px">
        <div class="text-blue-800 mb-12">
            <b>
                404
            </b>
        </div>
        <img src="{{ asset('img/page-not-found.svg') }}" alt="404 Error" style="max-width: 350px">
        <div class="mt-6 text-lg">
            <b>
                The page has gone! look elsewhere.
            </b>
        </div>
    </div>
@endsection
