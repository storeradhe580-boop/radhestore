@extends('layouts.app')

@section('title', 'Radhe Store - Heritage Jewelry')

@section('content')
    <!-- Mobile Hero Slider -->
    @if(isset($banners) && $banners->count() > 0)
    <div style="background: yellow; padding: 20px; margin: 20px;">
        <h2>DEBUG: Slider Test</h2>
        @foreach($banners as $banner)
            <div style="border: 2px solid red; margin: 10px; padding: 10px;">
                <p>Image Path: {{ $banner->image }}</p>
                <img 
                    src="{{ url('storage/' . $banner->image) }}" 
                    alt="slider"
                    style="width:300px; height:200px; border:2px solid blue; display:block; visibility:visible; opacity:1;"
                >
            </div>
        @endforeach
    </div>
    @else
        <div style="background: red; color: white; padding: 20px;">
            <h2>NO BANNERS FOUND</h2>
        </div>
    @endif
@endsection
