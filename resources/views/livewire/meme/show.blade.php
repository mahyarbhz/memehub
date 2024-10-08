<div>
    <div class="flex flex-col justify-center custom-align-center mt-4">
        <div>
            <div class="flex justify-between px-4">
                <div class="flex justify-center mb-4 custom-align-center">
                    <img class="rounded-full mx-2" src="{{ url('uploads/'.$meme->user->image) }}" alt="{{ $meme->user->name }}" style="max-width: 40px">
                    {{ $meme->user->name }}
                </div>
                <div class="flex justify-center mb-4 custom-align-center">
                    <span class="text-gray-400">
                        Uploaded {{ $meme->created_at_for_humans }}
                    </span>
                </div>
            </div>
            <img src="{{ url('uploads/'.$meme->photo) }}" style="width: 500px">
            <div class="w-full px-2 py-2">
                <div class="flex justify-between">
                    <div class="">
                        Category: <b>{{ $meme->category->name }}</b>
                    </div>
                    <div class="">
                        @if($this->Liked)
                            {{ $this->Likes }}<button class="ml-1 mr-2" wire:click="disLike" wire:loading.attr="disabled"><i class="fas fa-heart"></i></button>
                        @else
                            {{ $this->Likes }}<button class="ml-1 mr-2" wire:click="like" wire:loading.attr="disabled"><i class="far fa-heart"></i></button>
                        @endif
                            {{ count($meme->comments) }}<a href="#comments-box"><i class="mx-1 far fa-comment"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex mx-auto items-center justify-center mx-8 mb-4 mt-8 max-w-lg" id="comments-box">
        <form wire:submit.prevent="addComment" class="w-full max-w-xl rounded-lg px-4 pt-2">
            @csrf
            @method('POST')
            <div class="flex flex-wrap -mx-3 mb-6">
                <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">Add a new comment</h2>
                <div class="w-full md:w-full px-3 mb-2 mt-2">
                    <textarea wire:model="comment" class="bg-white transition rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-500 focus:outline-none" placeholder="Great meme"></textarea>
                    @error('comment') <span id="comment-error" class="mt-2 text-red-500">{{ $message }}</span> @enderror

                </div>
                <div class="w-full md:w-full flex items-start md:w-full px-3">
                    <div class="flex items-start w-1/2 text-gray-700 px-2 mr-auto"></div>
                    <div class="-mr-1">
                        <input wire:loading.attr="disabled" type="submit" class="bg-white transition text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded tracking-wide mr-1 hover:bg-gray-200" value="Submit" @if(!\Illuminate\Support\Facades\Auth::check() || \Illuminate\Support\Facades\Auth::guest()) disabled @endif>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="antialiased mx-auto max-w-screen-sm">
        <div class="space-y-4">
            @if(count($this->comments) == 0)
                This meme has no comment
            @else
                @foreach($this->comments as $comment)
                    <div class="flex">
                        <div class="flex-shrink-0 mr-3">
                            <img class="mt-2 rounded-full w-8 h-8 sm:w-10 sm:h-10" src="{{ url('uploads/'.$comment->user->image) }}">
                        </div>
                        <div class="flex-1 custom-comment-detail border rounded-lg px-4 py-2 sm:px-6 sm:py-4 leading-relaxed">
                            <strong>{{ $comment->user->name }}</strong> <span class="text-xs text-gray-400">{{ $comment->created_at_for_humans }}</span>
                            <p class="text-sm break-words">
                                {{ $comment->comment }}
                            </p>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
