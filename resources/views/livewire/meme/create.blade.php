<div>
    <div class="flex justify-center mt-8">
        <div>
            <p class="mb-4 text-lg"><b>Upload new meme</b></p>
        </div>
    </div>
    <div class="flex justify-center mt-8">
        <form wire:submit.prevent="store" class="w-full max-w-sm">
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/4">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-credit">
                        Credit
                    </label>
                </div>
                <div class="md:w-3/4">
                    <input wire:model="credit" class="appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-credit" type="text" placeholder="instagram.com/mahyarnv/" name="credit">
                    @error('credit') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/4">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-category">
                        Category
                    </label>
                </div>
                <div class="md:w-3/4">
                    <select wire:model="category_id" class="border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="category_id" id="inline-category" required>
                        <option value="">Please select</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/4">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="image_btn">
                        Upload
                    </label>
                </div>
                <style>
                    input[type="file"] {
                        display: none;
                    }
                    .custom-file-upload {
                        border: 1px solid #ccc;
                        display: inline-block;
                        padding: 6px 12px;
                        cursor: pointer;
                    }
                </style>
                <div class="md:w-3/4">
                    <label class="custom-file-upload">
                        <input wire:model="photo" accept="image/*" type="file" name="photo" required>
                        <i class="fas fa-cloud-upload-alt"></i> Meme image
                    </label>
                    <span wire:loading wire:target="photo">Loading...</span>
                    @if ($photo)
                        <img src="{{ $photo->temporaryUrl() }}">
                    @endif
                    @error('photo') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="md:flex md:items-center">
                <div class="md:w-1/4"></div>
                <div class="md:w-3/4">
                    <input type="submit" wire:loading.attr="disabled" value="Submit" name="submit" class="shadow transition duration-200 ease-in-out bg-blue-500 hover:bg-blue-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">
                </div>
            </div>
        </form>
    </div>
</div>
