<div class="flex">
    <div class="flex-shrink-0 mr-3">
        <img class="mt-2 rounded-full w-8 h-8 sm:w-10 sm:h-10" src="{{ url('uploads/'.$this->comment->user->image) }}">
    </div>
    <div class="flex-1 custom-comment-detail border rounded-lg px-4 py-2 sm:px-6 sm:py-4 leading-relaxed">
        <strong>{{ $this->comment->user->name }}</strong> <span class="text-xs text-gray-400">{{ $this->comment->created_at_for_humans }}</span>
        <p class="text-sm break-words">
            {{ $this->comment->comment }}
        </p>
    </div>
</div>
