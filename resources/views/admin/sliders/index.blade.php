@extends('layouts.app')

@section('title', 'Sliders - Admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Sliders</h1>
        <a href="{{ route('admin.sliders.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            + Add Slider
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left">ID</th>
                    <th class="px-6 py-3 text-left">Image</th>
                    <th class="px-6 py-3 text-left">Title</th>
                    <th class="px-6 py-3 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($sliders as $slider)
                    <tr class="border-b">
                        <td class="px-6 py-4">{{ $slider->id }}</td>
                        <td class="px-6 py-4">
                            @if($slider->image)
                                <img src="{{ asset('storage/' . $slider->image) }}" alt="{{ $slider->title }}" class="w-16 h-16 object-cover rounded">
                            @else
                                <span class="text-gray-400">No Image</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">{{ $slider->title }}</td>
                        <td class="px-6 py-4">
                            <a href="{{ route('admin.sliders.edit', $slider) }}" class="text-blue-500 hover:underline mr-2">Edit</a>
                            <form action="{{ route('admin.sliders.destroy', $slider) }}" method="POST" class="inline" onsubmit="return confirm('Delete this slider?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-gray-500">No sliders found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
