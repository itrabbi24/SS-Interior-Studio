@extends('admin-panel.shared.layout')

@section('title', 'Dashboard - SS Interior')

@section('content')


<h1 class="text-center">Welcome to Dashboard {{ Auth::user()->name ?? 'Guest' }}</h1>


@endsection
