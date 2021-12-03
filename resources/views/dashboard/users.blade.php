@extends('layouts.base')

@section('title')
    Users
@endsection

@section('content')
    <div class="flex flex-col justify-center mt-8 custom-align-center" id="table_data">
        <img src="{{ asset('img/decide.svg') }}" class="mb-4" alt="Decide in users" style="max-width: 250px">
        @include("dashboard.user_pagination_data")
    </div>
@endsection

@section('customJS')
    <script type="text/javascript">
        $(document).ready(function(){

            $(document).on('click', '.pagination a', function(event){
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                fetch_data(page);
            });

            function fetch_data(page)
            {
                $.ajax({
                    url:"users_index_ajax?page="+page,
                    success:function(data)
                    {
                        $('#table_data').html(data);
                    }
                });
            }
        });
    </script>
@endsection
