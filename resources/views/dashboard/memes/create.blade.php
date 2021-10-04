@extends('layouts.base')

@section('title')
    Home
@endsection

@section('content')
    <div class="flex justify-center mt-8">
        <div>
            <p class="mb-4 text-lg"><b>Upload new meme</b></p>
        </div>
    </div>
    <div class="flex justify-center mt-8">
        <form method="post" action="{{ route('memes.store') }}" class="w-full max-w-sm" name="meme_creation">
            @method("POST")
            @csrf
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/4">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-credit">
                        Credit
                    </label>
                </div>
                <div class="md:w-3/4">
                    <input class="appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-credit" type="text" placeholder="instagram.com/mahyarnv/" name="credit">
                    <span id="credit-error" class="text-red-500"></span>
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/4">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-category">
                        Category
                    </label>
                </div>
                <div class="md:w-3/4">
                    <select class="border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="category_id" id="inline-category" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <span id="category-error" class="text-red-500"></span>
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
                        <input id="image_btn" accept="image/*" type="file" name="photo" required>
                        <i class="fas fa-cloud-upload-alt"></i> Meme image
                    </label>
                    <img id="image_preview" src="" alt="Image preview">
                    <span id="image-error" class="text-red-500"></span>
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/4">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-captcha">
                        <span id="captcha-image">{!! captcha_img('math') !!}</span>
                        <button type="button" class="rounded-md px-1 py-1 outline-none reload" id="reload">
                            <b>
                                ↻
                            </b>
                        </button>
                    </label>
                </div>
                <div class="md:w-3/4">
                    <input class="appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-captcha" type="text" placeholder="Captcha letters" name="captcha">
                    <span id="captcha-error" class="text-red-500"></span>
                </div>
            </div>
            <div class="md:flex md:items-center">
                <div class="md:w-1/4"></div>
                <div class="md:w-3/4">
                    <input type="submit" value="Submit" name="submit" class="shadow transition duration-200 ease-in-out bg-blue-500 hover:bg-blue-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">
                </div>
            </div>
        </form>
    </div>
@endsection

@section("page_by_page_js")
    <script type="text/javascript">
        image_btn.onchange = e => {
            const [file] = image_btn.files
            if (file) {
                image_preview.src = URL.createObjectURL(file)
            }
        }

        $('#reload').click(function () {
            $.ajax({
                type: 'GET',
                url: '/reloadcaptcha',
                success: function (data) {
                    $("#captcha-image").html(data.captcha);
                }
            });
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("form[name='meme_creation']").on("submit", function(e){

            e.preventDefault();

            let formData = new FormData(this);
            var url = '{{ route('memes.store') }}';

            $.ajax({
                url:url,
                method:'POST',
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $("input[name=submit]").css('pointer-events', 'none').removeClass("bg-blue-500").addClass("bg-gray-900").val("Submitting...");
                },
                success:function(response){
                    if(response.success){
                        alert(response.message);
                        $("input[name=credit]").val('');
                        $("input[name=photo]").val('');
                        $("textarea[name=description]").val('');
                        location.href = '{{ route("dashboard") }}';
                    } else{
                        alert("Error")
                    }
                },
                error:function(response){
                    if (response.responseJSON.errors.description) $('#inline-description').css('border-color', '#F87171')
                    if (response.responseJSON.errors.credit) $('#inline-credit').css('border-color', '#F87171')
                    if (response.responseJSON.errors.category) $('#inline-category').css('border-color', '#F87171')
                    if (response.responseJSON.errors.image) $('#inline-image').css('border-color', '#F87171')
                    if (response.responseJSON.errors.captcha) $('#inline-captcha').css('border-color', '#F87171')
                    $('#description-error').text(response.responseJSON.errors.description);
                    $('#credit-error').text(response.responseJSON.errors.credit);
                    $('#category-error').text(response.responseJSON.errors.category);
                    $('#image-error').text(response.responseJSON.errors.photo);
                    $('#captcha-error').text(response.responseJSON.errors.captcha);
                },
                complete: function() {
                    $("input[name=submit]").css('pointer-events', 'auto').addClass("bg-blue-500").removeClass("bg-gray-900").val("Submit");
                },
            });
        });
    </script>
@endsection
