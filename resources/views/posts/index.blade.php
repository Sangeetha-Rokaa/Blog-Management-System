@extends('layouts.app')

@section('title', 'All Blogs')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">

    @foreach($blogs as $blog)
        <div class="bg-white shadow-md rounded-2xl overflow-hidden border border-gray-200">

            @if($blog->image)
                <a href="{{ asset('storage/' . $blog->image) }}" target="_blank">
                    <img src="{{ asset('storage/' . $blog->image) }}"
                         alt="Blog Image"
                         class="w-full object-cover max-h-[500px] cursor-pointer hover:opacity-90 transition duration-200">
                </a>
            @endif

            <div class="p-4">
                <h2 class="text-xl font-semibold mb-2">{{ $blog->title }}</h2>
                <p class="text-gray-700 mb-3">{{ $blog->content }}</p>

                <div class="flex items-center justify-between border-t pt-3 text-gray-600 text-sm">
                    <button class="flex items-center gap-1 hover:text-blue-600 transition">👍 Like</button>
                    <button class="flex items-center gap-1 hover:text-blue-600 transition">💬 Comment</button>
                    <button class="flex items-center gap-1 hover:text-blue-600 transition">🔗 Share</button>
                    @if($blog->image)
                        <a href="{{ asset('storage/' . $blog->image) }}" download
                           class="flex items-center gap-1 hover:text-blue-600 transition">⬇️ Download</a>
                    @endif
                </div>
            </div>
        </div>
    @endforeach

</div>
@endsection
