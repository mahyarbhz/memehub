<?php

namespace App\Http\Livewire\Comment;

use App\Models\Comment;
use Livewire\Component;

class Show extends Component
{
    public Comment $comment;

    public function render()
    {
        return view('livewire.comment.show');
    }
}
