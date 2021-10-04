@extends('layouts.base')

@section('title')
    403 | No permission
@endsection

@section('content')
    <div class="flex flex-col justify-center mt-16 custom-align-center" style="font-size: 40px">
        <div class="text-blue-800 mb-12">
            <b>
                403
            </b>
        </div>
        <img src="{{ asset('img/security.svg') }}" alt="403 Error" style="max-width: 350px">
        <div class="mt-6 text-lg">
            <b>
                Oh! you can't get there.
            </b>
        </div>
    </div>
@endsection
