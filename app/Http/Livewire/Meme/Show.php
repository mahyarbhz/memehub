<?php

namespace App\Http\Livewire\Meme;

use App\Models\Like;
use Livewire\Component;

class Show extends Component
{
    public $meme;

    public function getLikesProperty(): int
    {
        return count($this->meme->likes);
    }

    public function getLikedProperty(): bool
    {
        if (auth()->user()) {
            return Like::where('user_id', auth()->user()->id)
                ->where('meme_id', $this->meme->id)->exists();
        } else {
            return false;
        }
    }

    public function render()
    {
        return view('livewire.meme.show');
    }

    public function like()
    {
        if (auth()->user()) {
            $this->meme->addLike(auth()->user());
        }
    }

    public function disLike()
    {
        if (auth()->user()) {
            $this->meme->disLike(auth()->user());
        }
    }
}
