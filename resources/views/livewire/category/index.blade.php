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
    <div class="flex justify-center mt-8">
        Categories
    </div>
    <div class="flex justify-center mt-4">
        <table wire:sortable="updateCategoryOrder" class="border-collapse table-auto border border-green-800 w-full">
            <thead class="bg-blue-200">
            <tr>
                <th class="border border-blue-600 px-2 py-2">Id</th>
                <th class="border border-blue-600 px-2 py-2">Name</th>
                <th class="border border-blue-600 px-2 py-2">Position</th>
                <th class="border border-blue-600 px-2 py-2">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr wire:sortable.item="{{ $category->id }}" wire:key="task-{{ $category->id }}">
                    <td class="border border-blue-600 py-2 pl-2">{{ $category->id }}</td>
                    <td class="border border-blue-600 py-2 pl-2">{{ $category->name }}</td>
                    <td class="border border-blue-600 py-2 pl-2">{{ $category->position }}</td>
                    <td class="border border-blue-600 py-2 pl-2">
                        <form action="{{ route("categories.destroy", $category->id) }}" method="post">
                            <a href="{{ route('categories.edit', $category->id) }}" class="mx-1 px-1 py-1 rounded"><i class="text-yellow-500 fas fa-edit"></i></a>
                            @csrf
                            @method('DELETE')
                            <button class="mx-1 px-1 py-1 rounded outline-none" type="submit"><i class="text-red-500 fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
