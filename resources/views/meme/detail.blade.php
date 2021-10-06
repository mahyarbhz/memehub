@extends('layouts.base')

@section('title')
    Meme
@endsection

@section('content')
    <livewire:meme.show :meme=$meme />
@endsection
