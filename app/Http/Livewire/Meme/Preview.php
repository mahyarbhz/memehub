<?php

namespace App\Http\Livewire\Meme;

use App\Models\Like;
use Livewire\Component;

class Preview extends Component
{
    public $meme;

    public function getLikesProperty(): int
    {
        return count(Like::where('meme_id', $this->meme->id)->get());
    }

    public function getLikedProperty()
    {
        if (auth()->user()) {
            return Like::where('user_id', auth()->user()->id)
                ->where('meme_id', $this->meme->id)->exists();
        }
    }

    public function render()
    {
        return view('livewire.meme.preview');
    }

    public function like()
    {
        $this->meme->addLike(auth()->user());
    }

    public function disLike()
    {
        $this->meme->disLike(auth()->user());
    }
}
