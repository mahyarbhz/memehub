<div>
    <div class="flex justify-center mt-2">
        <form wire:submit.prevent="store" class="w-full max-w-sm">

            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/4">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-name">
                        Name
                    </label>
                </div>
                <div class="md:w-3/4">
                    <input type="text" wire:model="name" class="appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-name" placeholder="Gaming" required>
                    @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="md:flex md:items-center">
                <div class="md:w-1/4"></div>
                <div class="md:w-3/4">
                    <button type="submit" wire:loading.attr="disabled" class="shadow transition duration-200 ease-in-out bg-blue-500 hover:bg-blue-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">
                        Submit
                    </button>
                </div>
            </div>
        </form>
    </div>
    <style>
        ul {
            width: 400px;
            text-align: center;
            margin-top: 1rem;
        }

        ul .head {
            display: flex;
            justify-content: space-between;
            margin-bottom: .5rem;
        }

        ul .head p {
            font-weight: bold;
            width: 100%;
        }

        ul .item {
            display: flex;
            justify-content: space-between;
            border: 2px solid #32393d;
            padding: .5rem;
            text-align: center;
        }

        ul .item p,form {
            width: 100%;
        }

        ul .item p.item-handle:hover {
            cursor: row-resize;
        }
    </style>
    <div class="flex justify-center mt-8">
        Categories
    </div>
    <div class="flex justify-center mt-4">
        <ul wire:sortable="updateCategoryOrder">
            <li class="head">
                <p>Name</p>
                <p>Position</p>
                <p>Handle</p>
                <p>Action</p>
            </li>
            @foreach ($categories as $category)
                <li wire:sortable.item="{{ $category->id }}" wire:key="task-{{ $category->id }}" class="item">
                    <p>{{ $category->name }}</p>
                    <p>{{ $category->position }}</p>
                    <p wire:sortable.handle class="item-handle"><i class="fas fa-bars"></i></p>
                    <form action="{{ route("categories.destroy", $category->id) }}" method="post">
                        <a href="{{ route('categories.edit', $category->id) }}" class="mx-1 px-1 py-1 rounded"><i class="transition duration-200 ease-in-out text-blue-500 hover:text-blue-700 fas fa-edit"></i></a>
                        @csrf
                        @method('DELETE')
                        <button class="mx-1 px-1 py-1 rounded outline-none" type="submit"><i class="transition duration-200 ease-in-out text-red-500 hover:text-red-700 fas fa-trash"></i></button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
</div>
