@extends('layouts.base')

@section('title')
    Verify email
@endsection

@section('content')
    <div class="flex md:flex-row justify-center flex-col mt-16" style="justify-content: space-evenly;">
        <div class="flex flex-col justify-center custom-align-center" style="max-width: 500px">
            <div class="flex justify-center mt-4">
                <div class="md:flex hidden flex-col justify-center shadow-lg bg-white p-16 rounded-md custom-align-center">
                    <p class="lg:text-lg text-md"><b>You must verify your email address!</b></p>
                    <p class="mb-1 lg:text-lg text-md">Check your inbox.</p>
                    <p class="@if(session('status')) mb-2 @else mb-8 @endif lg:text-lg text-md text-center">If the email wasn't there, check your spam folder!</p>
                    @if(session('status'))
                        @if(session('status') == "verification-link-sent")
                            <div class="alert flex flex-row items-center bg-green-200 p-2 rounded border-b-2 border-green-300 mb-4">
                                <div class="alert-icon flex items-center bg-green-100 border-2 border-green-500 justify-center h-10 w-10 flex-shrink-0 rounded-full">
                                    <span class="text-green-500">
                                        <svg fill="currentColor"
                                             viewBox="0 0 20 20"
                                             class="h-6 w-6">
                                            <path fill-rule="evenodd"
                                                  d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                  clip-rule="evenodd"></path>
                                        </svg>
                                    </span>
                                </div>
                                <div class="alert-content ml-4">
                                    <div class="alert-description text-sm text-green-600">
                                        Verification link sent again!
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="alert flex flex-row items-center bg-blue-200 p-2 rounded border-b-2 border-blue-300">
                                <div class="alert-icon flex items-center bg-blue-100 border-2 border-blue-500 justify-center h-10 w-10 flex-shrink-0 rounded-full">
                                    <span class="text-blue-500">
                                        <svg fill="currentColor"
                                             viewBox="0 0 20 20"
                                             class="h-6 w-6">
                                            <path fill-rule="evenodd"
                                                  d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                                  clip-rule="evenodd"></path>
                                        </svg>
                                    </span>
                                </div>
                                <div class="alert-content ml-4">
                                    <div class="alert-description text-sm text-blue-600">
                                        {{ session('status') }}
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif
                    <form method="post" action="{{ route('verification.send') }}" class="w-full max-w-sm flex flex-col justify-center custom-align-center">
                        @method('POST')
                        @csrf
                        <div class="md:flex md:items-center mb-4">
                            <p>Didn't get the email verification link?</p>
                        </div>
                        <div class="md:flex md:items-center">
                            <button class="shadow transition duration-200 ease-in-out bg-blue-500 hover:bg-blue-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">Resend verification link</button>
                        </div>
                    </form>
                </div>
                <form method="post" action="{{ route('verification.send') }}" class="w-full max-w-sm flex flex-col justify-center md:hidden custom-align-center">
                    @method('POST')
                    @csrf
                    <p class="lg:text-lg text-md"><b>You must verify your email address!</b></p>
                    @if(session('status'))
                        @if(session('status') == "verification-link-sent")
                            <div class="alert flex flex-row items-center bg-green-200 p-2 rounded border-b-2 border-green-300 my-4">
                                <div class="alert-icon flex items-center bg-green-100 border-2 border-green-500 justify-center h-10 w-10 flex-shrink-0 rounded-full">
                                    <span class="text-green-500">
                                        <svg fill="currentColor"
                                             viewBox="0 0 20 20"
                                             class="h-6 w-6">
                                            <path fill-rule="evenodd"
                                                  d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                  clip-rule="evenodd"></path>
                                        </svg>
                                    </span>
                                </div>
                                <div class="alert-content ml-4">
                                    <div class="alert-description text-sm text-green-600">
                                        Verification link sent again!
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="alert flex flex-row items-center bg-blue-200 p-2 rounded border-b-2 border-blue-300">
                                <div class="alert-icon flex items-center bg-blue-100 border-2 border-blue-500 justify-center h-10 w-10 flex-shrink-0 rounded-full">
                                    <span class="text-blue-500">
                                        <svg fill="currentColor"
                                             viewBox="0 0 20 20"
                                             class="h-6 w-6">
                                            <path fill-rule="evenodd"
                                                  d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                                  clip-rule="evenodd"></path>
                                        </svg>
                                    </span>
                                </div>
                                <div class="alert-content ml-4">
                                    <div class="alert-description text-sm text-blue-600">
                                        {{ session('status') }}
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif
                    <p class="my-2 lg:text-lg text-md">Check your inbox.</p>
                    <p class="mb-8 lg:text-lg text-md text-center">If the email wasn't there, check your spam folder!</p>
                    <div class="md:flex md:items-center mb-2">
                        <p>Didn't get the email verification link?</p>
                    </div>
                    <div class="md:flex md:items-center">
                        <button class="shadow transition duration-200 ease-in-out bg-blue-500 hover:bg-blue-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">Resend verification link</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="flex justify-center">
            <img src="{{ asset('img/check-your-inbox.svg') }}" alt="Check your inbox" style="max-width: 300px">
        </div>
    </div>
@endsection
