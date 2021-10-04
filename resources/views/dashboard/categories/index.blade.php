@extends('layouts.base')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="flex justify-center mt-8">
        Create new category
    </div>
    <div class="flex justify-center mt-2">
        <form method="post" action="" class="w-full max-w-sm" name="category_store">
            @method("POST")
            @csrf
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/4">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-name">
                        Name
                    </label>
                </div>
                <div class="md:w-3/4">
                    <input class="appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-name" type="text" placeholder="Gaming" name="name" required>
                    <span id="name-error" class="text-red-500"></span>
                </div>
            </div>
            <div class="md:flex md:items-center">
                <div class="md:w-1/4"></div>
                <div class="md:w-3/4">
                    <button class="shadow transition duration-200 ease-in-out bg-blue-500 hover:bg-blue-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit" name="submit">
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
        <table class="border-collapse table-auto border border-green-800 w-full">
            <thead class="bg-blue-200">
            <tr>
                <th class="border border-blue-600 px-2 py-2">Id</th>
                <th class="border border-blue-600 px-2 py-2">Name</th>
                <th class="border border-blue-600 px-2 py-2">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td class="border border-blue-600 py-2 pl-2">{{ $category->id }}</td>
                    <td class="border border-blue-600 py-2 pl-2">{{ $category->name }}</td>
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
@endsection

@section("page_by_page_js")
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("form[name='category_store']").on("submit", function(e){

            e.preventDefault();

            var url = '{{ route('categories.store') }}';

            $.ajax({
                url:url,
                method:'POST',
                data: $(this).serialize(),
                beforeSend: function() {
                    $("button[name=submit]").css('pointer-events', 'none').addClass("bg-gray-900 text-white").val("Submitting...");
                },
                success:function(response){
                    if(response.success){
                        $("input[name=name]").val('');
                        $("button[name=submit]").css('pointer-events', 'none').addClass("bg-gray-900 text-white").val("Submitting...");
                        alert(response.message);
                        location.reload();
                    } else{
                        alert("Failed! something went wrong.")
                    }
                },
                error:function(response){
                    if (response.responseJSON.errors.name !== "") {
                        $('#inline-name').css('border-color', '#F87171')
                    }
                    $('#name-error').text(response.responseJSON.errors.name);
                }
            });
        });
    </script>
@endsection
