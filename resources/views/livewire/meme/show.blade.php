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
                            <button class="mr-2" wire:click="disLike" wire:loading.attr="disabled"><i class="fas fa-heart"></i></button>
                        @else
                            <button class="mr-2" wire:click="like" wire:loading.attr="disabled"><i class="far fa-heart"></i></button>
                        @endif
                        {{ count($meme->comments) }}<a href="#comments-box"><i class="mx-2 far fa-comment"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex mx-auto items-center justify-center mx-8 mb-4 mt-8 max-w-lg" id="comments-box">
        <form method="post" class="w-full max-w-xl rounded-lg px-4 pt-2" name="comment_form">
            @csrf
            @method('POST')
            <div class="flex flex-wrap -mx-3 mb-6">
                <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">Add a new comment</h2>
                <div class="w-full md:w-full px-3 mb-2 mt-2">
                    <textarea class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" name="comment" placeholder="@if(\Illuminate\Support\Facades\Auth::guest()) You need to login! @else @if(!\Illuminate\Support\Facades\Auth::check()) You need to verify your email. @else Your comment... @endif @endif" required @if(!\Illuminate\Support\Facades\Auth::check() || \Illuminate\Support\Facades\Auth::guest()) disabled @endif></textarea>
                    <span id="comment-error" class="text-red-500"></span>
                </div>
                <div class="w-full md:w-full flex items-start md:w-full px-3">
                    <div class="flex items-start w-1/2 text-gray-700 px-2 mr-auto"></div>
                    <div class="-mr-1">
                        <input type="submit" name="submit" class="bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100" value="Post Comment" @if(!\Illuminate\Support\Facades\Auth::check() || \Illuminate\Support\Facades\Auth::guest()) disabled @endif>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="antialiased mx-auto max-w-screen-sm">
        <div class="space-y-4">
            @if(count($meme->comments) == 0)
                This meme has no comment
            @else
                @foreach($meme->comments as $comment)
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
