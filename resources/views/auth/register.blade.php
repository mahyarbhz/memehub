@extends('layouts.base')

@section('title')
    Register
@endsection

@section('content')
    <div class="flex justify-center mt-8">
        <div>
            <p class="mb-4 text-lg"><b>Register</b></p>
        </div>
    </div>
    <div class="flex justify-center mt-8">
        <div class="md:flex hidden justify-center shadow-lg bg-white p-16 rounded-md">
            <form method="post" action="{{ route('register') }}" class="w-full" style="width: 30rem">
                @method('POST')
                @csrf
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4" for="inline-name">
                            Username
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <input class="border-gray-200 @error('name') border-red-500 @enderror bg-gray-100 appearance-none border-2 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-name" type="text" placeholder="Meme Master" name="name">
                        @error('name')
                            <span class="text-red-600">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4" for="inline-email">
                            Email
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <input class="border-gray-200 @error('email') border-red-500 @enderror bg-gray-100 appearance-none border-2 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-email" type="email" placeholder="info@memehub.com" name="email">
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
                        <input class="border-gray-200 @error('password') border-red-500 @enderror bg-gray-100 appearance-none border-2 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-password" type="password" placeholder="**********" name="password">
                        @error('password')
                            <span class="text-red-600">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4" for="inline-password-confirm">
                            Password Confirmation
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <input class="border-gray-200 @error('password') border-red-500 @enderror bg-gray-100 appearance-none border-2 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-password-confirm" type="password" placeholder="**********" name="password_confirmation">
                    </div>
                </div>
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3"></div>
                    <label class="md:w-2/3 block text-gray-500 font-bold">
                        Have an account? <a class="underline transition duration-200 ease-in-out hover:text-blue-500" href="{{ route('login') }}">Login</a>
                    </label>
                </div>
                <div class="md:flex md:items-center">
                    <div class="md:w-1/3"></div>
                    <div class="md:w-2/3">
                        <button class="shadow transition duration-200 ease-in-out bg-blue-500 hover:bg-blue-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit" name="register">
                            Register
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <form method="post" action="{{ route('register') }}" class="w-full max-w-sm md:hidden">
            @method('POST')
            @csrf
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4" for="inline-name">
                        Username
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input class="border-gray-200 @error('name') border-red-500 @enderror bg-gray-100 appearance-none border-2 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-name" type="text" placeholder="Meme Master" name="name">
                    @error('name')
                    <span class="text-red-600">
                                {{ $message }}
                            </span>
                    @enderror
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4" for="inline-email">
                        Email
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input class="border-gray-200 @error('email') border-red-500 @enderror bg-gray-100 appearance-none border-2 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-email" type="email" placeholder="info@memehub.com" name="email">
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
                    <input class="border-gray-200 @error('password') border-red-500 @enderror bg-gray-100 appearance-none border-2 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-password" type="password" placeholder="**********" name="password">
                    @error('password')
                    <span class="text-red-600">
                                {{ $message }}
                            </span>
                    @enderror
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4" for="inline-password-confirm">
                        Password Confirmation
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input class="border-gray-200 @error('password') border-red-500 @enderror bg-gray-100 appearance-none border-2 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-password-confirm" type="password" placeholder="**********" name="password_confirmation">
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3"></div>
                <label class="md:w-2/3 block text-gray-500 font-bold">
                    Have an account? <a class="underline transition duration-200 ease-in-out hover:text-blue-500" href="{{ route('login') }}">Login</a>
                </label>
            </div>
            <div class="md:flex md:items-center">
                <div class="md:w-1/3"></div>
                <div class="md:w-2/3">
                    <button class="shadow transition duration-200 ease-in-out bg-gray-600 hover:bg-gray-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit" name="register">
                        Register
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
