@extends('layouts.base')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="flex justify-center mt-8">
        Create new category
    </div>
    <livewire:category.index />
@endsection

@section("page_by_page_js")
    <script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>
@endsection
