<?php

namespace App\Http\Livewire\Meme;

use App\Models\Like;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Preview extends Component
{
    use LivewireAlert;

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
        if (!auth()->guest()) {
            $this->meme->addLike(auth()->user());
        } else {
            $this->alert('warning', 'You need to login.', [
                'position' => 'bottom-start',
                'timer' => '2500',
                'toast' => true,
                'timerProgressBar' => true,
            ]);
        }
    }

    public function disLike()
    {
        if (!auth()->guest()) {
            $this->meme->disLike(auth()->user());
        } else {
            $this->alert('warning', 'You need to login.', [
                'position' => 'bottom-start',
                'timer' => '2500',
                'toast' => true,
                'timerProgressBar' => true,
            ]);
        }
    }
}
