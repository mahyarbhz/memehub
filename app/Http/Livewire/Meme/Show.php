<?php

namespace App\Http\Livewire\Meme;

use App\Http\Controllers\CommentController;
use App\Models\Comment;
use App\Models\Like;
use Livewire\Component;
use PhpParser\Node\Expr\Cast\Object_;

class Show extends Component
{
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

    public function like()
    {
        if (auth()->check() && auth()->guest()) {
            $this->meme->addLike(auth()->user());
        }
    }

    public function disLike()
    {
        if (auth()->check() && auth()->guest()) {
            $this->meme->disLike(auth()->user());
        }
    }

    public function addComment(): object
    {
        if (auth()->user()) {
            $this->validate();

            $comment = Comment::create([
                'user_id' => auth()->user()->id,
                'meme_id' => $this->meme->id,
                'comment' => $this->comment,
            ]);

            $this->resetFilters();

            return $comment;
        }
    }
}
