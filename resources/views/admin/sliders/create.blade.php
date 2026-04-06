@extends('layouts.app')

@section('title', 'Create Slider - Admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto">
        <h1 class="text-2xl font-bold mb-6">Create Slider</h1>

        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.sliders.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium mb-2">Title *</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" required
                       class="w-full px-3 py-2 border rounded">
            </div>

            <div class="mb-4">
                <label for="line_1" class="block text-sm font-medium mb-2">Line 1 (Optional)</label>
                <input type="text" name="line_1" id="line_1" value="{{ old('line_1') }}"
                       class="w-full px-3 py-2 border rounded">
            </div>

            <div class="mb-4">
                <label for="line_2" class="block text-sm font-medium mb-2">Line 2 (Optional)</label>
                <input type="text" name="line_2" id="line_2" value="{{ old('line_2') }}"
                       class="w-full px-3 py-2 border rounded">
            </div>

            <div class="mb-4">
                <label for="image" class="block text-sm font-medium mb-2">Image *</label>
                <input type="file" name="image" id="image" accept="image/jpeg,image/png,image/jpg" required
                       class="w-full px-3 py-2 border rounded">
                <p class="text-xs text-gray-500 mt-1">Max size: 2MB. Accepted: jpg, jpeg, png</p>
            </div>

            <div class="flex gap-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Create Slider
                </button>
                <a href="{{ route('admin.sliders.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
