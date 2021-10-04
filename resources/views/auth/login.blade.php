@extends('layouts.base')

@section('title')
    Login
@endsection

@section('content')
    <div class="flex justify-center mt-8">
        <div>
            <p class="mb-4 text-lg"><b>Login</b></p>
        </div>
    </div>
    <div class="flex justify-center mt-8">
        <div class="md:flex hidden justify-center shadow-lg bg-white p-16 rounded-md">
            <form method="POST" action="{{ route('login') }}" class="w-full" style="width: 30rem">
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
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4" for="inline-password">
                            Password
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <input class="border-gray-200 @error('password') border-red-300 @enderror bg-gray-100 appearance-none border-2 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-password" type="password" placeholder="**********" name="password">
                        <p class="mt-2">
                            Forgot your password? <a class="underline transition duration-200 ease-in-out hover:text-blue-500" href="{{ route('password.request') }}">Reset password</a>
                        </p>
                        @error('password')
                        <span class="text-red-600">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3"></div>
                    <p class="md:w-2/3 block text-gray-500 font-bold">
                        Don't have any account? <a class="underline transition duration-200 ease-in-out hover:text-blue-500" href="{{ route('register') }}">Register</a>
                    </p>
                </div>
                <div class="md:flex md:items-center">
                    <div class="md:w-1/3"></div>
                    <div class="md:w-2/3">
                        <button class="shadow transition duration-200 ease-in-out bg-blue-500 hover:bg-blue-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit" name="login">
                            Login
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <form method="POST" action="{{ route('login') }}" class="w-full max-w-sm md:hidden">
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
                <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4" for="inline-password">
                        Password
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input class="border-gray-200 @error('password') border-red-300 @enderror bg-gray-100 appearance-none border-2 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-password" type="password" placeholder="**********" name="password">
                    <p class="mt-2">
                        Forgot your password? <a class="underline transition duration-200 ease-in-out hover:text-blue-500" href="{{ route('password.request') }}">Reset password</a>
                    </p>
                    @error('password')
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
                    <button class="shadow transition duration-200 ease-in-out bg-blue-500 hover:bg-gray-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit" name="login">
                        Login
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
