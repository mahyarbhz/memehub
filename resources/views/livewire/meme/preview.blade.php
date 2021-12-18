<div class="mb-8">
    <div class="flex justify-between custom-align-center mb-2">
        <div class="flex justify-start custom-align-center">
            <img class="rounded-full mx-2" src="{{ url('uploads/'.$meme->user->image) }}" alt="" style="width: 40px">
            {{ $meme->user->name }}
        </div>
        <div @click.away="open = false" class="relative" x-data="{ open: false }">
            <button @click="open = !open" class="flex justify-center custom-align-center w-full px-2 py-2 text-sm font-semibold text-left bg-transparent rounded-full ml-0 hover:text-gray-900 focus:text-gray-900 hover:underline focus:bg-gray-100 focus:outline-none focus:shadow-outline">
{{--                <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>--}}
                <svg xmlns="http://www.w3.org/2000/svg" :class="{'rotate-180': open, 'rotate-0': !open}" class="transition-transform duration-500 transform" height="18px" viewBox="0 0 24 24" width="18px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 8c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/></svg>
            </button>
            <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 mt-2 origin-top-right rounded-md shadow-lg w-40" style="z-index: 9">
                <div class="px-2 py-2 bg-white rounded-md shadow">
                    <button class="w-full block flex justify-start custom-align-center cursor-pointer pr-4 pl-2 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 text-dark transition duration-200 ease-in-out focus:bg-gray-200 hover:bg-gray-100 bg-white focus:outline-none focus:shadow-outline">
                        <svg class="mr-1" xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 0 24 24" width="20px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M18 16.08c-.76 0-1.44.3-1.96.77L8.91 12.7c.05-.23.09-.46.09-.7s-.04-.47-.09-.7l7.05-4.11c.54.5 1.25.81 2.04.81 1.66 0 3-1.34 3-3s-1.34-3-3-3-3 1.34-3 3c0 .24.04.47.09.7L8.04 9.81C7.5 9.31 6.79 9 6 9c-1.66 0-3 1.34-3 3s1.34 3 3 3c.79 0 1.5-.31 2.04-.81l7.12 4.16c-.05.21-.08.43-.08.65 0 1.61 1.31 2.92 2.92 2.92s2.92-1.31 2.92-2.92c0-1.61-1.31-2.92-2.92-2.92zM18 4c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zM6 13c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1zm12 7.02c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1z"/></svg>Share
                    </button>
                    <button class="w-full block flex justify-start custom-align-center cursor-pointer pr-4 pl-2 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 text-white transition duration-200 ease-in-out focus:bg-red-700 hover:bg-red-600 bg-red-500 focus:outline-none focus:shadow-outline">
                        <svg class="mr-1" xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 0 24 24" width="20px" fill="#ffffff"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M16 9v10H8V9h8m-1.5-6h-5l-1 1H5v2h14V4h-3.5l-1-1zM18 7H6v12c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7z"/></svg>Delete meme
                    </button>
                </div>
            </div>
        </div>
    </div>
    <a href="{{ route('memes.show', $meme->id) }}">
        <img src="{{ url('uploads/'.$meme->photo) }}" alt="" style="width: 400px">
    </a>
    <div class="px-2 py-2">
        <div class="flex justify-between">
            <div></div>
            <div>
                @if($this->Liked)
                    {{ $this->Likes }}<button class="ml-1 mr-2" wire:click="disLike" wire:loading.attr="disabled"><i class="fas fa-heart"></i></button>
                @else
                    {{ $this->Likes }}<button class="ml-1 mr-2" wire:click="like" wire:loading.attr="disabled"><i class="far fa-heart"></i></button>
                @endif
                {{ count($meme->comments) }}<a href="{{ route('memes.show', $meme->id) }}"><i class="mx-1 far fa-comment"></i></a>
            </div>
        </div>
    </div>
</div>
