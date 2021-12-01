<?php

namespace App\Http\Livewire\Meme;

use App\Models\Meme;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    use LivewireAlert;

    public $categories;
    public $credit, $category_id, $photo;

    public function render()
    {
        return view('livewire.meme.create');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'photo' => 'required|mimes:jpeg,png|dimensions:max_width=2160,max_height=2160|max:1024',
            'credit' => 'max:190',
            'category_id' => 'required'
        ]);
//        $photo = $this->photo->storeAs('/memes', $disk = 'public_uploads');
        $filepath = Storage::disk('public_uploads')->put('memes', $validatedData['photo']);
        Meme::create([
            'user_id' => auth()->user()->id,
            'photo' => $filepath,
            'credit' => $validatedData['credit'],
            'category_id' => $validatedData['category_id']
        ]);
        $this->flash('success', 'Meme Created Successfully.', [
            'position' => 'bottom-start',
            'timer' => '2500',
            'toast' => true,
            'timerProgressBar' => true,
        ], '/dashboard');
    }
}
