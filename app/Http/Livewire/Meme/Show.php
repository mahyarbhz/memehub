<?php

namespace App\Http\Livewire\Meme;

use App\Http\Controllers\CommentController;
use App\Models\Comment;
use App\Models\Like;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Show extends Component
{
    use LivewireAlert;

    public Object $meme;
    public String $comment = "";

    protected $rules = [
        'comment' => 'required|min:3',
    ];

    public function getLikesProperty(): int
    {
        return count(Like::where('meme_id', $this->meme->id)->get());
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
    public function getCommentsProperty(): object
    {
        return Comment::where('meme_id', $this->meme->id)->get();
    }

    public function render()
    {
        return view('livewire.meme.show');
    }

    public function resetFilters()
    {
        $this->reset('comment');
    }

    public function like(): void
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

    public function disLike(): void
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

    public function addComment()
    {
        if (!auth()->guest()) {
            if (!auth()->user()->hasVerifiedEmail()) {
                return $this->alert('warning', "You need to verify your email.", [
                    'position' => 'bottom-start',
                    'timer' => '2500',
                    'toast' => true,
                    'timerProgressBar' => true,
                ]);
            } else {
                $this->validate();

                $comment = Comment::create([
                    'user_id' => auth()->user()->id,
                    'meme_id' => $this->meme->id,
                    'comment' => $this->comment,
                ]);

                $this->resetFilters();

                $this->alert('success', 'Your comment was posted successfully.', [
                    'position' => 'bottom-start',
                    'timer' => '2500',
                    'toast' => true,
                    'timerProgressBar' => true,
                ]);

                return $comment;
            }
        } else {
            return $this->alert('warning', 'You need to login.', [
                'position' => 'bottom-start',
                'timer' => '2500',
                'toast' => true,
                'timerProgressBar' => true,
            ]);
        }
    }
}
