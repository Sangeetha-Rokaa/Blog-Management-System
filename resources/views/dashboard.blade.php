@extends('layouts.app')
@section('content')
  <h2 class="font-bold text-xl mb-4">Post a New Blog</h2>
  <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-4 rounded shadow mb-6">
    @csrf
    <input type="text" name="title" placeholder="Title" class="border p-2 w-full mb-2">
    <select name="category_id" class="border p-2 w-full mb-2">
      <option value="">Select category</option>
      <option value="Entertainment">Entertainment</options>
      <option value="Science">Science</options>
      <option value="Research">Research</options>
      <option value="Food">Food</options>
      <option value="Adventure">Adventure</options>
      <option value="Educational">Educational</options>
      @foreach($categories as $cat)
        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
      @endforeach
    </select>
    <textarea name="body" placeholder="Write something..." class="border p-2 w-full mb-2"></textarea>
    <input type="file" name="attachment" class="mb-2">
    <button class="bg-blue-600 text-white px-4 py-2 rounded">Publish</button>
  </form>

  <h3 class="font-semibold mb-2">All Posts</h3>
  <div class="grid md:grid-cols-3 gap-4">
    @foreach($posts as $post)
      <div class="bg-white p-4 rounded shadow">
        <h4 class="font-bold text-lg"><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></h4>
        <p class="text-sm text-gray-500">{{ $post->category?->name }}</p>
      </div>
    @endforeach
  </div>
@endsection
