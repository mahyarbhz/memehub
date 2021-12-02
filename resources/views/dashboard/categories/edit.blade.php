@extends('layouts.base')

@section('title')
    Category edit
@endsection

@section('content')
    <div class="flex justify-center mt-8">
        Edit category
    </div>
    <div class="flex justify-center mt-2">
        <form method="POST" action="" class="w-full max-w-sm" name="category_update">
            @csrf
            @method('PUT')
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/4">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-name">
                        Name
                    </label>
                </div>
                <div class="md:w-3/4">
                    <input id="inline-name" type="text" placeholder="Gaming" name="name" value="{{ $category->name }}" class="appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" required>
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
@endsection

@section("page_by_page_js")
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("form[name='category_update']").on("submit", function(e){

            e.preventDefault();

            var url = '{{ route('categories.update', $category->id) }}';

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
                        $("button[name=submit]").css('pointer-events', 'auto').removeClass("bg-gray-900 text-white").val("Submit");
                        alert(response.message);
                        location.href = '{{ route("categories.index") }}';
                    }else{
                        alert("Failed!")
                    }
                },
                error:function(response){
                    if (response.responseJSON.errors.name) ('#inline-name').css('border-color', '#F87171')
                    $('#name-error').text(response.responseJSON.errors.name);
                },
            });
        });
    </script>
@endsection
