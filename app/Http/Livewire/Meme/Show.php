<?php

namespace App\Http\Livewire\Meme;

use App\Models\Like;
use Livewire\Component;

class Show extends Component
{
    public $meme;

    public function getLikedProperty()
    {
        return Like::where('user_id', auth()->user()->id)
            ->where('meme_id', $this->meme->id)->exists();
    }

    public function render()
    {
        return view('livewire.meme.show');
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
