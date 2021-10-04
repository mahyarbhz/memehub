@extends('layouts.base')

@section('title')
    Reset Password
@endsection

@section('content')
    <div class="flex justify-center mt-8">
        <div>
            <p class="mb-4 text-lg"><b>Reset password request</b></p>
        </div>
    </div>
    <div class="flex justify-center">
        @if(session('status'))
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
    </div>
    <div class="flex justify-center mt-8">
        <div class="md:flex hidden justify-center shadow-lg bg-white p-16 rounded-md">
            <form method="POST" action="{{ route('password.request') }}" class="w-full max-w-sm" style="width: 30rem">
                @csrf
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4" for="inline-email">
                            Email
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <input class="border-gray-200 @error('email') border-red-300 @enderror bg-gray-100 appearance-none border-2 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-email" type="email" placeholder="info@memehub.com" name="email">
                        @error('email')
                            <span class="text-red-600">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3"></div>
                    <label class="md:w-2/3 block text-gray-500 font-bold">
                        Don't have an account? <a class="underline transition duration-200 ease-in-out hover:text-blue-500" href="{{ route('register') }}">Register</a>
                    </label>
                </div>
                <div class="md:flex md:items-center">
                    <div class="md:w-1/3"></div>
                    <div class="md:w-2/3">
                        <button class="shadow transition duration-200 ease-in-out bg-blue-500 hover:bg-gray-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit" name="submit">
                            Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <form method="POST" action="{{ route('password.request') }}" class="w-full max-w-sm md:hidden">
            @csrf
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4" for="inline-email">
                        Email
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input class="border-gray-200 @error('email') border-red-300 @enderror bg-gray-100 appearance-none border-2 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-email" type="email" placeholder="info@memehub.com" name="email">
                    @error('email')
                    <span class="text-red-600">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3"></div>
                <label class="md:w-2/3 block text-gray-500 font-bold">
                    Don't have any account? <a class="underline transition duration-200 ease-in-out hover:text-blue-500" href="{{ route('register') }}">Register</a>
                </label>
            </div>
            <div class="md:flex md:items-center">
                <div class="md:w-1/3"></div>
                <div class="md:w-2/3">
                    <button class="shadow transition duration-200 ease-in-out bg-blue-500 hover:bg-gray-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit" name="submit">
                        Submit
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
