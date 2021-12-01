@extends('layouts.base')

@section('title')
    Home
@endsection

@section('content')
    <livewire:meme.create :categories=$categories />
@endsection
