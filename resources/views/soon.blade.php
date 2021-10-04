@extends('layouts.base')

@section('title')
    Soon
@endsection

@section('content')
    <div class="flex flex-col justify-center custom-align-center">
        <div class="pt-16">
            <img src="{{ asset('img/under-construction.svg') }}" alt="Under Development" style="max-width: 350px">
            <div class="mt-6 text-lg">
                <b>
                    Under Development! coming soon.
                </b>
            </div>
        </div>
    </div>
@endsection
