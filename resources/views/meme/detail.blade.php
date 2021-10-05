@extends('layouts.base')

@section('title')
    Meme
@endsection

@section('content')
    <livewire:meme.show :meme=$meme />
@endsection

@section("page_by_page_js")
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("form[name=comment_form]").on("submit", function(e){

            e.preventDefault();

            var url = '{{ route('comments.store') }}';
            var formData = new FormData(this);
            formData.append('meme_id', {{ $meme->id }})

            $.ajax({
                url:url,
                method:'POST',
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $("input[name=submit]").css('pointer-events', 'none').addClass("bg-gray-400").val("Posting...");
                },
                success:function(response){
                    if(response.success){
                        alert(response.message);
                        $("textarea[name=comment]").val('');
                        $("input[name=submit]").css('pointer-events', 'auto').removeClass("bg-gray-400").val("Post Comment");
                        location.reload();
                    }else{
                        alert("huh?")
                    }
                },
                error:function(response){
                    $('#comment-error').text(response.responseJSON.errors.comment);
                },
                complete: function() {
                    $("input[name=submit]").css('pointer-events', 'auto').removeClass("bg-gray-400").val("Post Comment");
                },
            });
        });

        {{--$("form[name=like-form]").on("submit", function(e){--}}
        {{--    e.preventDefault();--}}

        {{--    var url = "{{ route('likes.store') }}";--}}
        {{--    var formData = new FormData(this);--}}
        {{--    formData.append('meme_id', {{ $meme->id }})--}}

        {{--    $.ajax({--}}
        {{--        url:url,--}}
        {{--        method:'POST',--}}
        {{--        data: formData,--}}
        {{--        processData: false,--}}
        {{--        contentType: false,--}}
        {{--        beforeSend: function() {--}}
        {{--            $("#like").css('pointer-events', 'none');--}}
        {{--        },--}}
        {{--        success:function(response){--}}
        {{--            if(response.success){--}}
        {{--                alert(response.message);--}}
        {{--                $("textarea[name=comment]").val('');--}}
        {{--                $("#like").css('pointer-events', 'auto');--}}
        {{--                location.reload();--}}
        {{--            }else{--}}
        {{--                alert("huh?")--}}
        {{--            }--}}
        {{--        },--}}
        {{--        error:function(){--}}
        {{--            alert("Error! contact with admins.")--}}
        {{--        },--}}
        {{--        complete: function() {--}}
        {{--            $("#like").css('pointer-events', 'auto');--}}
        {{--        },--}}
        {{--    });--}}
        {{--});--}}
    </script>
@endsection
