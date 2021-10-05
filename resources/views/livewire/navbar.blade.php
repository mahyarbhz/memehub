<div>
    <div class="w-full text-gray-700 bg-white shadow-sm">
        <div x-data="{ open: false }" class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
            <div class="p-4 flex flex-row items-center justify-between">
                <a href="#" class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg focus:outline-none focus:shadow-outline">Meme Hub</a>
                <button class="md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
                    <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                        <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                        <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <nav :class="{'flex': open, 'hidden': !open}" class="flex-col flex-grow pb-4 md:pb-0 hidden md:flex md:justify-end md:flex-row">
                <a class="px-4 py-2 mt-2 text-sm font-semibold @if(Route::currentRouteName() == "home") text-gray-900 bg-gray-100 @else bg-transparent @endif rounded-lg md:mt-0 md:ml-2 ml-0 hover:text-gray-900 focus:text-gray-900 transition duration-200 ease-in-out hover:underline focus:bg-gray-100 focus:outline-none focus:shadow-outline" href="{{ route('home') }}">Home</a>
                <div @click.away="open = false" class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="flex flex-row items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg md:w-auto md:inline md:mt-0 md:ml-2 ml-0 hover:text-gray-900 focus:text-gray-900 hover:underline focus:bg-gray-100 focus:outline-none focus:shadow-outline">
                        <span>Category</span>
                        <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                    <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48" style="z-index: 9">
                        <div class="px-2 py-2 bg-white rounded-md shadow">
                            @foreach(\App\Models\Category::paginate(3) as $category)
                                <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 hover:text-gray-900 focus:text-gray-900 transition duration-200 ease-in-out hover:underline focus:bg-gray-100 focus:outline-none focus:shadow-outline" href="{{ route('categories.show', $category->id) }}">{{ $category->name }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
                {{--            <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 md:ml-2 ml-0 hover:text-gray-900 focus:text-gray-900 transition duration-200 ease-in-out hover:underline focus:bg-gray-100 focus:outline-none focus:shadow-outline" href="{{ route('soon') }}">Meme Masters</a>--}}
                <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 md:ml-2 ml-0 hover:text-gray-900 focus:text-gray-900 transition duration-200 ease-in-out hover:underline focus:bg-gray-100 focus:outline-none focus:shadow-outline" href="{{ route('soon') }}">Meme bases</a>
                @auth
                    <div @click.away="open = false" class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex flex-row items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg md:w-auto md:inline md:mt-0 md:ml-2 ml-0 hover:text-gray-900 focus:text-gray-900 transition duration-200 ease-in-out hover:bg-gray-200 focus:bg-gray-100 focus:outline-none focus:shadow-outline">
                            <span>Account</span>
                            <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                        <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48" style="z-index: 9">
                            <div class="px-2 py-2 bg-white rounded-md shadow">
                                <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:underline focus:bg-gray-100 focus:outline-none focus:shadow-outline" href="{{ route('dashboard') }}">Dashboard</a>
                                <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:underline focus:bg-gray-100 focus:outline-none focus:shadow-outline" href="{{ route('memes.create') }}">New meme</a>
                                @if(\Illuminate\Support\Facades\Auth::user()->may("owner"))
                                    <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 hover:text-gray-900 focus:text-gray-900 transition duration-200 ease-in-out hover:underline focus:bg-gray-100 focus:outline-none focus:shadow-outline" href="{{ route('owners.users') }}">Users</a>
                                    <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 hover:text-gray-900 focus:text-gray-900 transition duration-200 ease-in-out hover:underline focus:bg-gray-100 focus:outline-none focus:shadow-outline" href="{{ route('categories.index') }}">Categories</a>
                                @endif
                                <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:underline focus:bg-gray-100 focus:outline-none focus:shadow-outline" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                            </div>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="px-4 py-2 text-sm font-semibold @if(Route::currentRouteName() == "login") text-gray-900 bg-gray-100 @else bg-transparent @endif rounded-lg md:mt-0 md:ml-2 ml-0 hover:text-gray-900 transition duration-200 ease-in-out focus:text-gray-900 hover:underline focus:bg-gray-100 focus:outline-none focus:shadow-outline">Log in</a>

                    @if (\Illuminate\Support\Facades\Route::has('register'))
                        <a href="{{ route('register') }}" class="px-4 py-2 text-sm font-semibold @if(Route::currentRouteName() == "register") text-gray-900 bg-gray-100 @else bg-transparent @endif rounded-lg md:mt-0 md:ml-2 ml-0 hover:text-gray-900 transition duration-200 ease-in-out focus:text-gray-900 hover:underline focus:bg-gray-100 focus:outline-none focus:shadow-outline">Register</a>
                    @endif
                @endauth
            </nav>
        </div>
    </div>
    @auth
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
        </form>
    @endauth
</div>
