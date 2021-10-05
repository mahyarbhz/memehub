<div class="mb-8">
    <div class="flex justify-start custom-align-center mb-2">
        <img class="rounded-full mx-2" src="{{ url('uploads/'.$meme->user->image) }}" alt="" style="width: 40px">
        {{ $meme->user->name }}
    </div>
    <a href="{{ route('memes.show', $meme->id) }}">
        <img src="{{ url('uploads/'.$meme->photo) }}" alt="" style="width: 400px">
    </a>
    <div class="px-2 py-2">
        <div class="flex justify-between">
            <div></div>
            <div>
                @if($this->Liked)
                    <button class="mr-2" wire:click="disLike" wire:loading.attr="disabled"><i class="fas fa-heart"></i></button>
                @else
                    <button class="mr-2" wire:click="like" wire:loading.attr="disabled"><i class="far fa-heart"></i></button>
                @endif
                {{ count($meme->comments) }}<a href="{{ route('memes.show', $meme->id) }}"><i class="mx-1 far fa-comment"></i></a>
            </div>
        </div>
    </div>
</div>
