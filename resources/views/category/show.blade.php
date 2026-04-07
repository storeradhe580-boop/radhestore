@extends('layouts.app')

@section('title', ($category->name ?? $category->category_name) . ' - Radhe Store')

@section('content')
<div class="max-w-5xl mx-auto px-4 py-10">
    <a href="{{ url()->previous() }}" class="text-sm text-blue-600 hover:underline">&larr; Back</a>
    <h1 class="text-3xl font-semibold mt-4">
        {{ $category->name ?? $category->category_name }}
    </h1>
    <p class="mt-2 text-sm text-gray-600">
        Category detail page placeholder. You can customize this layout later.
    </p>
</div>
@endsection
