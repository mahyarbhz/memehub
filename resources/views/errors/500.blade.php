@extends('layouts.base')

@section('title')
    500 | Server Error
@endsection

@section('content')
    <div class="flex flex-col justify-center mt-16 custom-align-center" style="font-size: 40px">
        <div class="text-blue-800 mb-12">
            <b>
                500
            </b>
        </div>
        <img src="{{ asset('img/error.svg') }}" alt="404 Error" style="max-width: 350px">
        <div class="mt-6 text-lg">
            <b>
                The server has an error.
            </b>
        </div>
    </div>
@endsection
