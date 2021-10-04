@extends('layouts.base')

@section('title')
    User edit
@endsection

@section('content')
    <div class="flex justify-center mt-8">
        Edit member {{ $user->name }}
    </div>
    <div class="flex justify-center mt-2">
        <form method="post" action="{{ route('owners.uupdate', $user->id) }}" class="w-full max-w-sm" name="category_update">
            @csrf
            @method('PUT')
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/4">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-role">
                        Role
                    </label>
                </div>
                <div class="md:w-3/4">
                    <select id="inline-category" class="border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="role_id" required>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}" @if($role->id == $user->role->id) selected @endif>{{ $role->name }} :: {{ $role->scope }}</option>
                        @endforeach
                    </select>
                    @error('role_id')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="md:flex md:items-center">
                <div class="md:w-1/4"></div>
                <div class="md:w-3/4">
                    <button class="shadow transition duration-200 ease-in-out bg-gray-600 hover:bg-gray-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit" name="login">
                        Submit
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section("page_by_page_js")
@endsection
