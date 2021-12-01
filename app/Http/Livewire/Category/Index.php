<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Index extends Component
{
    use LivewireAlert;

    public String $name = '';

    public function render()
    {
        $categories = Category::orderBy('position')->get()->all();
        return view('livewire.category.index', ['categories' => $categories]);
    }

    public function resetFilters()
    {
        $this->reset('name');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required|max:15'
        ]);
        $position = Category::all()->max('position') + 1;
        Category::create([
            'name' => $validatedData['name'],
            'position' => $position
        ]);

        $this->resetFilters();
        $this->alert('success', 'Category created successfully.', [
            'position' => 'bottom-start',
            'timer' => '4000',
            'toast' => true,
            'timerProgressBar' => true,
        ]);
    }
}
